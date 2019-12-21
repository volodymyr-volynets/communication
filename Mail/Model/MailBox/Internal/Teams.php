<?php

namespace Numbers\Communication\Mail\Model\MailBox\Internal;
class Teams extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'ML';
	public $title = 'M/L Internal Mailbox Teams';
	public $name = 'ml_internal_mailbox_teams';
	public $pk = ['ml_internalmboxtem_tenant_id', 'ml_internalmboxtem_internalmailbox_id', 'ml_internalmboxtem_team_id'];
	public $tenant = true;
	public $orderby = [
		'ml_internalmboxtem_timestamp' => SORT_ASC
	];
	public $limit;
	public $column_prefix = 'ml_internalmboxtem_';
	public $columns = [
		'ml_internalmboxtem_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'ml_internalmboxtem_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
		'ml_internalmboxtem_internalmailbox_id' => ['name' => 'Mailbox #', 'domain' => 'mailbox_id'],
		'ml_internalmboxtem_team_id' => ['name' => 'Team #', 'domain' => 'team_id'],
		'ml_internalmboxtem_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'ml_internal_mailbox_teams_pk' => ['type' => 'pk', 'columns' => ['ml_internalmboxtem_tenant_id', 'ml_internalmboxtem_internalmailbox_id', 'ml_internalmboxtem_team_id']],
		'ml_internalmboxtem_internalmailbox_id_fk' => [
			'type' => 'fk',
			'columns' => ['ml_internalmboxtem_tenant_id', 'ml_internalmboxtem_internalmailbox_id'],
			'foreign_model' => '\Numbers\Communication\Mail\Model\MailBox\Internals',
			'foreign_columns' => ['ml_internalmailbox_tenant_id', 'ml_internalmailbox_id']
		],
		'ml_internalmboxtem_team_id_fk' => [
			'type' => 'fk',
			'columns' => ['ml_internalmboxtem_tenant_id', 'ml_internalmboxtem_team_id'],
			'foreign_model' => '\Numbers\Users\Users\Model\Teams',
			'foreign_columns' => ['um_team_tenant_id', 'um_team_id']
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