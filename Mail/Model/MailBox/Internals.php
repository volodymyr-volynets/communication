<?php

namespace Numbers\Communication\Mail\Model\MailBox;
class Internals extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'ML';
	public $title = 'M/L Internal Mailboxes';
	public $schema;
	public $name = 'ml_internal_mailboxes';
	public $pk = ['ml_internalmailbox_tenant_id', 'ml_internalmailbox_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'ml_internalmailbox_';
	public $columns = [
		'ml_internalmailbox_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'ml_internalmailbox_id' => ['name' => 'Mailbox #', 'domain' => 'mailbox_id_sequence'],
		'ml_internalmailbox_code' => ['name' => 'Code', 'domain' => 'group_code'],
		'ml_internalmailbox_name' => ['name' => 'Name', 'domain' => 'name'],
		'ml_internalmailbox_icon' => ['name' => 'Icon', 'domain' => 'icon', 'null' => true],
		'ml_internalmailbox_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'ml_internal_mailboxes_pk' => ['type' => 'pk', 'columns' => ['ml_internalmailbox_tenant_id', 'ml_internalmailbox_id']],
		'ml_internalmailbox_code_un' => ['type' => 'unique', 'columns' => ['ml_internalmailbox_tenant_id', 'ml_internalmailbox_code']],
	];
	public $indexes = [
		'ml_internal_mailboxes_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['ml_internalmailbox_code', 'ml_internalmailbox_name']],
	];
	public $history = false;
	public $audit = [
		'map' => [
			'ml_internalmailbox_tenant_id' => 'wg_audit_tenant_id',
			'ml_internalmailbox_id' => 'wg_audit_internalmailbox_id'
		]
	];
	public $optimistic_lock = true;
	public $options_map = [
		'ml_internalmailbox_title' => 'name',
		'ml_internalmailbox_inactive' => 'inactive'
	];
	public $options_active = [
		'ml_internalmailbox_inactive' => 0
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