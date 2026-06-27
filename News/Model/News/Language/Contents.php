<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Communication\News\Model\News\Language;

use Object\Table;

class Contents extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'NS';
    public $title = 'N/S News Language Contents';
    public $name = 'ns_news_language_contents';
    public $pk = ['ns_nwslngcon_tenant_id', 'ns_nwslngcon_news_id', 'ns_nwslngcon_language_code'];
    public $tenant = true;
    public $orderby = [];
    public $limit;
    public $column_prefix = 'ns_nwslngcon_';
    public $columns = [
        'ns_nwslngcon_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'ns_nwslngcon_news_id' => ['name' => 'News #', 'domain' => 'group_id'],
        'ns_nwslngcon_language_code' => ['name' => 'Language Code', 'domain' => 'language_code'],
        'ns_nwslngcon_content' => ['name' => 'Content', 'domain' => 'comment'],
    ];
    public $constraints = [
        'ns_news_language_contents_pk' => ['type' => 'pk', 'columns' => ['ns_nwslngcon_tenant_id', 'ns_nwslngcon_news_id', 'ns_nwslngcon_language_code']],
        'ns_nwslngcon_language_code_fk' => [
            'type' => 'fk',
            'columns' => ['ns_nwslngcon_tenant_id', 'ns_nwslngcon_news_id', 'ns_nwslngcon_language_code'],
            'foreign_model' => '\Numbers\Communication\News\Model\News\Languages',
            'foreign_columns' => ['ns_nwslang_tenant_id', 'ns_nwslang_news_id', 'ns_nwslang_language_code']
        ]
    ];
    public $indexes = [];
    public $history = false;
    public $audit = false;
    public $options_map = [];
    public $options_active = [];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = false;
    public $cache_tags = [];
    public $cache_memory = false;

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
