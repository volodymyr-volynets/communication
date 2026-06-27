<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Communication\News\Controller\OpenAccess;

use Numbers\Communication\News\DataSource\News;
use Numbers\Users\Documents\Base\Base;
use Numbers\Users\Documents\Base\Model\Files;
use Object\Content\Messages;
use Object\Controller;

class Preview extends Controller
{
    public function actionIndex()
    {
        \Layout::$title_override = 'News';
        \Layout::$icon_override = 'fas fa-newspaper';
        $input = \Request::input();
        $model = new News();
        $model->cache = true;
        $data = $model->get([
            'where' => [
                'public' => true,
                'skip_counting_users' => true,
                'include_content' => true
            ]
        ]);
        $summary = $model->prepareSummary($data ?? []);
        // open specific tab
        if (!empty($input['unread'])) {
            $_GET['tab_news_id_active_hidden'] = 'unread';
        }
        if (!empty($input['hot'])) {
            $_GET['tab_news_id_active_hidden'] = 'hot';
        }
        if (!empty($input['ns_new_category_id'])) {
            $_GET['tab_news_id_active_hidden'] = 'category_id_' . $input['ns_new_category_id'];
        }
        // render
        $tab_header = [];
        if (!empty($summary['summary']['Hot'])) {
            $tab_header['hot'] = i18n(null, 'Hot') . \HTML::label2(['type' => 'success', 'value' => \Format::id($summary['summary']['Hot'])]);
            $tab_options['hot'] = '';
            foreach ($data as $k => $v) {
                if (!empty($v['ns_new_hot'])) {
                    if (!empty($tab_options['hot'])) {
                        $tab_options['hot'] .= '<hr/>';
                    }
                    $tab_options['hot'] .= $this->helperRenderOneNews($v);
                }
            }
        }
        foreach ($summary['categories'] as $k0 => $v0) {
            $tab_header['category_id_' . $k0] = $v0['name'] . \HTML::label2(['type' => 'success', 'value' => \Format::id($v0['count'])]);
            $tab_options['category_id_' . $k0] = '';
            foreach ($data as $k => $v) {
                if ($v['ns_new_category_id'] == $k0) {
                    if (!empty($tab_options['category_id_' . $k0])) {
                        $tab_options['category_id_' . $k0] .= '<hr/>';
                    }
                    $tab_options['category_id_' . $k0] .= $this->helperRenderOneNews($v);
                }
            }
        }
        if (!empty($data)) {
            echo \HTML::tabs([
                'id' => 'tab_news_id',
                'header' => $tab_header,
                'options' => $tab_options,
                'tab_options' => [],
                'vertical' => true
            ]);
        } else {
            echo \HTML::message(['type' => WARNING, 'options' => i18n(null, Messages::NO_ROWS_FOUND)]);
        }
    }
    public function actionJsonMenuName()
    {
        // fetch number of news
        $model = new News();
        $model->cache = true;
        $data = $model->get();
        $unred = 0;
        foreach ($data as $k => $v) {
            if (empty($v['ns_new_read_user'])) {
                $unred++;
            }
        }
        // generate message
        $label = '<table width="100%"><tr><td width="99%">' . \HTML::icon(['type' => 'fas fa-newspaper']) . ' ' . i18n(null, 'News') . '</td><td width="1%">' . \HTML::label2(['type' => 'primary', 'value' => \Format::id($unred)]) . '</td></tr></table>';
        \Layout::renderAs([
            'success' => true,
            'error' => [],
            'data' => $label,
            'item' => \Request::input('item')
        ], 'application/json');
    }

    public function helperRenderOneNews($one_news)
    {
        $files_container = '';
        if (!empty($one_news['wg_document_file_ids'])) {
            $files_container .= '<hr/>';
            $files = Files::getStatic([
                'where' => [
                    'dt_file_id' => $one_news['wg_document_file_ids']
                ],
                'pk' => ['dt_file_id']
            ]);
            foreach ($files as $k => $v) {
                $files_container .= \HTML::a(['href' => Base::generateURL($k, false, $v['dt_file_name']), 'value' => \HTML::icon(['type' => 'fas fa-link']) . ' ' . $v['dt_file_name']]);
                $files_container .= '<br/>';
            }
        }
        return \HTML::segment([
            'type' => 'secondary',
            'value' => $one_news['ns_nwslngcon_content'] . $files_container,
            'header' => [
                'title' => $one_news['ns_nwslang_title'] . ' (' . \Format::niceTimestamp($one_news['ns_new_inserted_timestamp'])  . ')'
            ]
        ]);
    }
}
