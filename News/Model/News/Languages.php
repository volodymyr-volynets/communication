<?php

namespace Numbers\Communication\News\Model\News;
class Languages extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'NS';
	public $title = 'N/S News Languages';
	public $name = 'ns_news_languages';
	public $pk = ['ns_nwslang_tenant_id', 'ns_nwslang_news_id', 'ns_nwslang_language_code'];
	public $tenant = true;
	public $orderby = [
		'ns_nwslang_timestamp' => SORT_ASC
	];
	public $limit;
	public $column_prefix = 'ns_nwslang_';
	public $columns = [
		'ns_nwslang_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'ns_nwslang_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
		'ns_nwslang_news_id' => ['name' => 'News #', 'domain' => 'group_id'],
		'ns_nwslang_language_code' => ['name' => 'Language Code', 'domain' => 'language_code'],
		'ns_nwslang_title' => ['name' => 'Title', 'domain' => 'name'],
		'ns_nwslang_primary' => ['name' => 'Primary', 'type' => 'boolean'],
		'ns_nwslang_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'ns_news_languages_pk' => ['type' => 'pk', 'columns' => ['ns_nwslang_tenant_id', 'ns_nwslang_news_id', 'ns_nwslang_language_code']],
		'ns_nwslang_news_id_fk' => [
			'type' => 'fk',
			'columns' => ['ns_nwslang_tenant_id', 'ns_nwslang_news_id'],
			'foreign_model' => '\Numbers\Communication\News\Model\News',
			'foreign_columns' => ['ns_new_tenant_id', 'ns_new_id']
		],
		'ns_nwslang_language_code_fk' => [
			'type' => 'fk',
			'columns' => ['ns_nwslang_tenant_id', 'ns_nwslang_language_code'],
			'foreign_model' => '\Numbers\Internalization\Internalization\Model\Language\Codes',
			'foreign_columns' => ['in_language_tenant_id', 'in_language_code']
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