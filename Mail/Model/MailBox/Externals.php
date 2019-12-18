<?php

namespace Numbers\Communication\Mail\Model\MailBox;
class Externals extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'ML';
	public $title = 'M/L External Mailboxes';
	public $schema;
	public $name = 'ml_external_mailboxes';
	public $pk = ['ml_externalmailbox_tenant_id', 'ml_externalmailbox_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'ml_externalmailbox_';
	public $columns = [
		'ml_externalmailbox_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'ml_externalmailbox_id' => ['name' => 'Mailbox #', 'domain' => 'mailbox_id_sequence'],
		'ml_externalmailbox_code' => ['name' => 'Code', 'domain' => 'group_code'],
		'ml_externalmailbox_name' => ['name' => 'Name', 'domain' => 'name'],
		'ml_externalmailbox_externalmboxtype_code' => ['name' => 'Type Code', 'domain' => 'type_code', 'options_model' => '\Numbers\Communication\Mail\Model\MailBox\External\Types'],
		'ml_externalmailbox_internalmailbox_id' => ['name' => 'Internal Mailbox #', 'domain' => 'mailbox_id'],
		'ml_externalmailbox_password_code' => ['name' => 'Password Code', 'domain' => 'group_code'],
		'ml_externalmailbox_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'ml_external_mailboxes_pk' => ['type' => 'pk', 'columns' => ['ml_externalmailbox_tenant_id', 'ml_externalmailbox_id']],
		'ml_externalmailbox_code_un' => ['type' => 'unique', 'columns' => ['ml_externalmailbox_tenant_id', 'ml_externalmailbox_code']],
		'ml_externalmailbox_internalmailbox_id_fk' => [
			'type' => 'fk',
			'columns' => ['ml_externalmailbox_tenant_id', 'ml_externalmailbox_internalmailbox_id'],
			'foreign_model' => '\Numbers\Communication\Mail\Model\MailBox\Internals',
			'foreign_columns' => ['ml_internalmailbox_tenant_id', 'ml_internalmailbox_id']
		],
		'ml_externalmailbox_password_code_fk' => [
			'type' => 'fk',
			'columns' => ['ml_externalmailbox_tenant_id', 'ml_externalmailbox_password_code'],
			'foreign_model' => '\Numbers\Users\Users\Model\Credential\Passwords',
			'foreign_columns' => ['um_password_tenant_id', 'um_password_code']
		]
	];
	public $indexes = [
		'ml_external_mailboxes_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['ml_externalmailbox_code', 'ml_externalmailbox_name']],
	];
	public $history = false;
	public $audit = [
		'map' => [
			'ml_externalmailbox_tenant_id' => 'wg_audit_tenant_id',
			'ml_externalmailbox_id' => 'wg_audit_externalmailbox_id'
		]
	];
	public $optimistic_lock = true;
	public $options_map = [
		'ml_externalmailbox_title' => 'name',
		'ml_externalmailbox_inactive' => 'inactive'
	];
	public $options_active = [
		'ml_externalmailbox_inactive' => 0
	];
	public $engine = [
		'MySQLi' => 'InnoDB'
	];

	public $cache = true;
	public $cache_tags = [];
	public $cache_memory = false;

	public $who = [
		'inserted' => true,
		'updated' => true
	];

	public $data_asset = [
		'classification' => 'client_confidential',
		'protection' => 2,
		'scope' => 'enterprise'
	];
}