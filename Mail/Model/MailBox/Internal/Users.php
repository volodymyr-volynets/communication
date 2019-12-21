<?php

namespace Numbers\Communication\Mail\Model\MailBox\Internal;
class Users extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'ML';
	public $title = 'M/L Internal Mailbox Users';
	public $name = 'ml_internal_mailbox_users';
	public $pk = ['ml_internalmboxusr_tenant_id', 'ml_internalmboxusr_internalmailbox_id', 'ml_internalmboxusr_user_id'];
	public $tenant = true;
	public $orderby = [
		'ml_internalmboxusr_timestamp' => SORT_ASC
	];
	public $limit;
	public $column_prefix = 'ml_internalmboxusr_';
	public $columns = [
		'ml_internalmboxusr_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'ml_internalmboxusr_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
		'ml_internalmboxusr_internalmailbox_id' => ['name' => 'Mailbox #', 'domain' => 'mailbox_id'],
		'ml_internalmboxusr_user_id' => ['name' => 'User #', 'domain' => 'user_id'],
		'ml_internalmboxusr_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'ml_internal_mailbox_users_pk' => ['type' => 'pk', 'columns' => ['ml_internalmboxusr_tenant_id', 'ml_internalmboxusr_internalmailbox_id', 'ml_internalmboxusr_user_id']],
		'ml_internalmboxusr_internalmailbox_id_fk' => [
			'type' => 'fk',
			'columns' => ['ml_internalmboxusr_tenant_id', 'ml_internalmboxusr_internalmailbox_id'],
			'foreign_model' => '\Numbers\Communication\Mail\Model\MailBox\Internals',
			'foreign_columns' => ['ml_internalmailbox_tenant_id', 'ml_internalmailbox_id']
		],
		'ml_internalmboxusr_user_id_fk' => [
			'type' => 'fk',
			'columns' => ['ml_internalmboxusr_tenant_id', 'ml_internalmboxusr_user_id'],
			'foreign_model' => '\Numbers\Users\Users\Model\Users',
			'foreign_columns' => ['um_user_tenant_id', 'um_user_id']
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