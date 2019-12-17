<?php

namespace Numbers\Communication\Campaigns\Model\Advertising;
class Codes extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'CA';
	public $title = 'C/A Advertising Codes';
	public $schema;
	public $name = 'ca_advertising_codes';
	public $pk = ['ca_adcode_tenant_id', 'ca_adcode_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'ca_adcode_';
	public $columns = [
		'ca_adcode_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'ca_adcode_id' => ['name' => 'Adcode #', 'domain' => 'adcode_id_sequence'],
		'ca_adcode_code' => ['name' => 'Code', 'domain' => 'group_code', 'null' => true],
		'ca_adcode_name' => ['name' => 'Name', 'domain' => 'name'],
		'ca_adcode_icon' => ['name' => 'Icon', 'domain' => 'icon', 'null' => true],
		'ca_adcode_start_date' => ['name' => 'Start Date', 'type' => 'date', 'null' => true],
		'ca_adcode_end_date' => ['name' => 'End Date', 'type' => 'date', 'null' => true],
		'ca_adcode_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'ca_advertising_codes_pk' => ['type' => 'pk', 'columns' => ['ca_adcode_tenant_id', 'ca_adcode_id']],
	];
	public $indexes = [
		'ca_advertising_codes_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['ca_adcode_code', 'ca_adcode_name']],
	];
	public $history = false;
	public $audit = [
		'map' => [
			'ca_adcode_tenant_id' => 'wg_audit_tenant_id',
			'ca_adcode_id' => 'wg_audit_adcode_id'
		]
	];
	public $optimistic_lock = true;
	public $options_map = [
		'ca_adcode_title' => 'name',
		'ca_adcode_inactive' => 'inactive'
	];
	public $options_active = [
		'ca_adcode_inactive' => 0
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