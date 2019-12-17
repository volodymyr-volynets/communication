<?php

namespace Numbers\Communication\Campaigns\Model\Advertising;
class Organizations extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'CA';
	public $title = 'C/A Advertising Code Organizations';
	public $name = 'ca_advertising_organizations';
	public $pk = ['ca_adcdorg_tenant_id', 'ca_adcdorg_adcode_id', 'ca_adcdorg_organization_id'];
	public $tenant = true;
	public $orderby = [
		'ca_adcdorg_timestamp' => SORT_ASC
	];
	public $limit;
	public $column_prefix = 'ca_adcdorg_';
	public $columns = [
		'ca_adcdorg_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'ca_adcdorg_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
		'ca_adcdorg_adcode_id' => ['name' => 'Adcode #', 'domain' => 'adcode_id'],
		'ca_adcdorg_organization_id' => ['name' => 'Organization #', 'domain' => 'organization_id'],
		'ca_adcdorg_all_locations' => ['name' => 'All Locations', 'type' => 'boolean'],
		'ca_adcdorg_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'ca_advertising_organizations_pk' => ['type' => 'pk', 'columns' => ['ca_adcdorg_tenant_id', 'ca_adcdorg_adcode_id', 'ca_adcdorg_organization_id']],
		'ca_adcdorg_adcode_id_fk' => [
			'type' => 'fk',
			'columns' => ['ca_adcdorg_tenant_id', 'ca_adcdorg_adcode_id'],
			'foreign_model' => '\Numbers\Communication\Campaigns\Model\Advertising\Codes',
			'foreign_columns' => ['ca_adcode_tenant_id', 'ca_adcode_id']
		],
		'ca_adcdorg_organization_id_fk' => [
			'type' => 'fk',
			'columns' => ['ca_adcdorg_tenant_id', 'ca_adcdorg_organization_id'],
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