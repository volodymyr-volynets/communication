<?php

namespace Numbers\Communication\Mail\Model\MailBox\Internal;
class Organizations extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'ML';
	public $title = 'M/L Internal Mailbox Organizations';
	public $name = 'ml_internal_mailbox_organizations';
	public $pk = ['ml_internalmboxorg_tenant_id', 'ml_internalmboxorg_internalmailbox_id', 'ml_internalmboxorg_organization_id'];
	public $tenant = true;
	public $orderby = [
		'ml_internalmboxorg_timestamp' => SORT_ASC
	];
	public $limit;
	public $column_prefix = 'ml_internalmboxorg_';
	public $columns = [
		'ml_internalmboxorg_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'ml_internalmboxorg_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
		'ml_internalmboxorg_internalmailbox_id' => ['name' => 'Mailbox #', 'domain' => 'mailbox_id'],
		'ml_internalmboxorg_organization_id' => ['name' => 'Organization #', 'domain' => 'organization_id'],
		'ml_internalmboxorg_all_users' => ['name' => 'All Users', 'type' => 'boolean'],
		'ml_internalmboxorg_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'ml_internal_mailbox_organizations_pk' => ['type' => 'pk', 'columns' => ['ml_internalmboxorg_tenant_id', 'ml_internalmboxorg_internalmailbox_id', 'ml_internalmboxorg_organization_id']],
		'ml_internalmboxorg_internalmailbox_id_fk' => [
			'type' => 'fk',
			'columns' => ['ml_internalmboxorg_tenant_id', 'ml_internalmboxorg_internalmailbox_id'],
			'foreign_model' => '\Numbers\Communication\Mail\Model\MailBox\Internals',
			'foreign_columns' => ['ml_internalmailbox_tenant_id', 'ml_internalmailbox_id']
		],
		'ml_internalmboxorg_organization_id_fk' => [
			'type' => 'fk',
			'columns' => ['ml_internalmboxorg_tenant_id', 'ml_internalmboxorg_organization_id'],
			'foreign_model' => '\Numbers\Users\Organizations\Model\Organizations',
			'foreign_columns' => ['on_organization_tenant_id', 'on_organization_id']
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