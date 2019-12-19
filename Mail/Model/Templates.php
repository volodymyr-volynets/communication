<?php

namespace Numbers\Communication\Mail\Model;
class Templates extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'ML';
	public $title = 'M/L Email Templates';
	public $schema;
	public $name = 'ml_email_templates';
	public $pk = ['ml_emailtemplate_tenant_id', 'ml_emailtemplate_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'ml_emailtemplate_';
	public $columns = [
		'ml_emailtemplate_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'ml_emailtemplate_id' => ['name' => 'Template #', 'domain' => 'template_id_sequence'],
		'ml_emailtemplate_code' => ['name' => 'Code', 'domain' => 'group_code'],
		'ml_emailtemplate_name' => ['name' => 'Name', 'domain' => 'name'],
		'ml_emailtemplate_language_code' => ['name' => 'Language Code', 'domain' => 'language_code', 'null' => true],
		'ml_emailtemplate_organization_id' => ['name' => 'Organization #', 'domain' => 'organization_id', 'null' => true],
		'ml_emailtemplate_parent_emailtemplate_id' => ['name' => 'Parent Template #', 'domain' => 'template_id', 'null' => true],
		'ml_emailtemplate_subject' => ['name' => 'Subject', 'domain' => 'description', 'null' => true],
		'ml_emailtemplate_body' => ['name' => 'Body', 'type' => 'text', 'null' => true],
		'ml_emailtemplate_file_id_1' => ['name' => 'File 1', 'domain' => 'file_id', 'null' => true],
		'ml_emailtemplate_file_id_2' => ['name' => 'File 2', 'domain' => 'file_id', 'null' => true],
		'ml_emailtemplate_file_id_3' => ['name' => 'File 3', 'domain' => 'file_id', 'null' => true],
		'ml_emailtemplate_file_id_4' => ['name' => 'File 4', 'domain' => 'file_id', 'null' => true],
		'ml_emailtemplate_file_id_5' => ['name' => 'File 5', 'domain' => 'file_id', 'null' => true],
		'ml_emailtemplate_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'ml_email_templates_pk' => ['type' => 'pk', 'columns' => ['ml_emailtemplate_tenant_id', 'ml_emailtemplate_id']],
		'ml_emailtemplate_code_un' => ['type' => 'unique', 'columns' => ['ml_emailtemplate_tenant_id', 'ml_emailtemplate_code']],
		'ml_emailtemplate_language_code_fk' => [
			'type' => 'fk',
			'columns' => ['ml_emailtemplate_tenant_id', 'ml_emailtemplate_language_code'],
			'foreign_model' => '\Numbers\Internalization\Internalization\Model\Language\Codes',
			'foreign_columns' => ['in_language_tenant_id', 'in_language_code']
		],
		'ml_emailtemplate_organization_id_fk' => [
			'type' => 'fk',
			'columns' => ['ml_emailtemplate_tenant_id', 'ml_emailtemplate_organization_id'],
			'foreign_model' => '\Numbers\Users\Organizations\Model\Organizations',
			'foreign_columns' => ['on_organization_tenant_id', 'on_organization_id']
		],
		'ml_emailtemplate_parent_emailtemplate_id_fk' => [
			'type' => 'fk',
			'columns' => ['ml_emailtemplate_tenant_id', 'ml_emailtemplate_parent_emailtemplate_id'],
			'foreign_model' => '\Numbers\Communication\Mail\Model\Templates',
			'foreign_columns' => ['ml_emailtemplate_tenant_id', 'ml_emailtemplate_id']
		]
	];
	public $indexes = [];
	public $history = false;
	public $audit = [
		'map' => [
			'ml_emailtemplate_tenant_id' => 'wg_audit_tenant_id',
			'ml_emailtemplate_id' => 'wg_audit_emailtemplate_id'
		]
	];
	public $optimistic_lock = true;
	public $options_map = [
		'ml_emailtemplate_name' => 'name',
		'ml_emailtemplate_inactive' => 'inactive'
	];
	public $options_active = [
		'ml_emailtemplate_inactive' => 0
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