<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Communication\News\Controller;

use Numbers\Communication\News\Form\Collection\News\Collection;
use Object\Controller\Permission;
use Object\Form\Wrapper\Import;

class News extends Permission
{
    public function actionIndex()
    {
        $form = new \Numbers\Communication\News\Form\List2\News([
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
    public function actionEdit()
    {
        $form = new Collection([
            'input' => \Request::input(null, true, false, [
                'skip_xss_on_keys' => ['ns_nwslngcon_content'],
                'trim_empty_html_input' => true,
                'remove_script_tag' => true
            ])
        ]);
        echo $form->render();
    }
    public function actionImport()
    {
        $form = new Import([
            'model' => '\Numbers\Communication\News\Form\News',
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
}
