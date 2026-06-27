<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Communication\News\Form\Collection\News;

use Object\Form\Parent2;

class Collection extends \Object\Form\Wrapper\Collection
{
    public $collection_link = 'ns_news_collection';
    public const BYPASS = ['ns_new_id'];
    public $data = [
        self::MAIN_SCREEN => [
            'order' => 1000,
            self::ROWS => [
                self::MAIN_ROW => [
                    'order' => 100,
                    self::FORMS => [
                        'ns_news' => [
                            'model' => '\Numbers\Communication\News\Form\News',
                            'bypass_values' => [
                                'ns_new_id',
                            ],
                            'flag_main_form' => true,
                            'options' => [
                                'segment' => Parent2::SEGMENT_FORM,
                                'percent' => 100,
                            ],
                            'order' => 1
                        ]
                    ]
                ],
                self::WIDGETS_ROW => [
                    'options' => [
                        'type' => 'tabs',
                        'segment' => Parent2::SEGMENT_ADDITIONAL_INFORMATION,
                        'its_own_segment' => true
                    ],
                    'order' => PHP_INT_MAX - 1000,
                    self::FORMS => [
                        'wg_comments' => [
                            'model' => '\Numbers\Users\Widgets\Comments\Form\List2\Comments',
                            'submodule' => 'Numbers.Users.Widgets.Comments',
                            'bypass_input' => self::BYPASS,
                            'options' => [
                                'label_name' => 'Comments',
                                'bypass_hidden_from_input' => self::BYPASS,
                                'model_table' => '\Numbers\Communication\News\Model\News',
                            ],
                            'order' => 1
                        ],
                        'wg_documents' => [
                            'model' => '\Numbers\Users\Widgets\Documents\Form\List2\Documents',
                            'submodule' => 'Numbers.Users.Widgets.Documents',
                            'bypass_input' => self::BYPASS,
                            'options' => [
                                'label_name' => 'Documents',
                                'bypass_hidden_from_input' => self::BYPASS,
                                'model_table' => '\Numbers\Communication\News\Model\News',
                            ],
                            'order' => 2
                        ],
                    ]
                ]
            ]
        ]
    ];

    public function distribute()
    {
        if (empty($this->values['ns_new_id'])) {
            unset($this->data[self::MAIN_SCREEN][self::ROWS][self::WIDGETS_ROW]);
        }
    }
}
