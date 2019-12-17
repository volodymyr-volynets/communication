<?php

namespace Numbers\Communication\Campaigns\Model\Advertising;
class Locations extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'CA';
	public $title = 'C/A Advertising Code Locations';
	public $name = 'ca_advertising_locations';
	public $pk = ['ca_adcdloc_tenant_id', 'ca_adcdloc_adcode_id', 'ca_adcdloc_location_id'];
	public $tenant = true;
	public $orderby = [
		'ca_adcdloc_timestamp' => SORT_ASC
	];
	public $limit;
	public $column_prefix = 'ca_adcdloc_';
	public $columns = [
		'ca_adcdloc_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'ca_adcdloc_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
		'ca_adcdloc_adcode_id' => ['name' => 'Adcode #', 'domain' => 'adcode_id'],
		'ca_adcdloc_location_id' => ['name' => 'Location #', 'domain' => 'location_id'],
		'ca_adcdloc_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'ca_advertising_locations_pk' => ['type' => 'pk', 'columns' => ['ca_adcdloc_tenant_id', 'ca_adcdloc_adcode_id', 'ca_adcdloc_location_id']],
		'ca_adcdloc_adcode_id_fk' => [
			'type' => 'fk',
			'columns' => ['ca_adcdloc_tenant_id', 'ca_adcdloc_adcode_id'],
			'foreign_model' => '\Numbers\Communication\Campaigns\Model\Advertising\Codes',
			'foreign_columns' => ['ca_adcode_tenant_id', 'ca_adcode_id']
		],
		'ca_adcdloc_location_id_fk' => [
			'type' => 'fk',
			'columns' => ['ca_adcdloc_tenant_id', 'ca_adcdloc_location_id'],
			'foreign_model' => '\Numbers\Users\Organizations\Model\Locations',
			'foreign_columns' => ['on_location_tenant_id', 'on_location_id']
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