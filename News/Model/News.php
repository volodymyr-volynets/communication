<?php

namespace Numbers\Communication\News\Model;
class News extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'NS';
	public $title = 'N/S News';
	public $schema;
	public $name = 'ns_news';
	public $pk = ['ns_new_tenant_id', 'ns_new_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'ns_new_';
	public $columns = [
		'ns_new_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'ns_new_id' => ['name' => 'News #', 'domain' => 'group_id_sequence'],
		'ns_new_title' => ['name' => 'Title', 'domain' => 'name'],
		'ns_new_content' => ['name' => 'Content', 'type' => 'text', 'null' => true],
		'ns_new_start_date' => ['name' => 'Start Date', 'type' => 'date', 'null' => true],
		'ns_new_end_date' => ['name' => 'End Date', 'type' => 'date', 'null' => true],
		'ns_new_category_id' => ['name' => 'Category #', 'domain' => 'group_id'],
		'ns_new_show_to_all_roles' => ['name' => 'All Roles', 'type' => 'boolean'],
		'ns_new_all_organizations' => ['name' => 'All Organizations', 'type' => 'boolean'],
		'ns_new_public' => ['name' => 'Public News', 'type' => 'boolean'],
		'ns_new_hot' => ['name' => 'Hot', 'type' => 'boolean'],
		'ns_new_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'ns_news_pk' => ['type' => 'pk', 'columns' => ['ns_new_tenant_id', 'ns_new_id']],
		'ns_new_category_id_fk' => [
			'type' => 'fk',
			'columns' => ['ns_new_tenant_id', 'ns_new_category_id'],
			'foreign_model' => '\Numbers\Communication\News\Model\Categories',
			'foreign_columns' => ['ns_category_tenant_id', 'ns_category_id']
		],
	];
	public $indexes = [
		'ns_news_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['ns_new_title', 'ns_new_content']],
	];
	public $history = false;
	public $audit = [
		'map' => [
			'ns_new_tenant_id' => 'wg_audit_tenant_id',
			'ns_new_id' => 'wg_audit_new_id'
		]
	];
	public $optimistic_lock = true;
	public $options_map = [
		'ns_new_title' => 'name'
	];
	public $options_active = [
		'ns_new_inactive' => 0
	];
	public $engine = [
		'MySQLi' => 'InnoDB'
	];

	public $cache = false;
	public $cache_tags = [];
	public $cache_memory = false;

	public $who = [
		'inserted' => true,
		'updated' => true
	];

	public $comments = [
		'map' => [
			'ns_new_tenant_id' => 'wg_comment_tenant_id',
			'ns_new_id' => 'wg_comment_new_id'
		]
	];

	public $documents = [
		'map' => [
			'ns_new_tenant_id' => 'wg_document_tenant_id',
			'ns_new_id' => 'wg_document_new_id'
		]
	];

	public $data_asset = [
		'classification' => 'client_confidential',
		'protection' => 2,
		'scope' => 'enterprise'
	];
}