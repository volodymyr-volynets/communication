<?php

namespace Numbers\Communication\SMS\Model;
class Templates extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'S3';
	public $title = 'S/3 SMS Templates';
	public $schema;
	public $name = 's3_sms_templates';
	public $pk = ['s3_smstemplate_tenant_id', 's3_smstemplate_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 's3_smstemplate_';
	public $columns = [
		's3_smstemplate_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		's3_smstemplate_id' => ['name' => 'Template #', 'domain' => 'template_id_sequence'],
		's3_smstemplate_code' => ['name' => 'Code', 'domain' => 'group_code'],
		's3_smstemplate_name' => ['name' => 'Name', 'domain' => 'name'],
		's3_smstemplate_language_code' => ['name' => 'Language Code', 'domain' => 'language_code', 'null' => true],
		's3_smstemplate_organization_id' => ['name' => 'Organization #', 'domain' => 'organization_id', 'null' => true],
		's3_smstemplate_parent_smstemplate_id' => ['name' => 'Parent Template #', 'domain' => 'template_id', 'null' => true],
		's3_smstemplate_body' => ['name' => 'Body', 'type' => 'text', 'null' => true],
		's3_smstemplate_optout_reply' => ['name' => 'Optout Reply', 'type' => 'text', 'null' => true],
		's3_smstemplate_file_id_1' => ['name' => 'File 1', 'domain' => 'file_id', 'null' => true],
		's3_smstemplate_file_id_2' => ['name' => 'File 2', 'domain' => 'file_id', 'null' => true],
		's3_smstemplate_file_id_3' => ['name' => 'File 3', 'domain' => 'file_id', 'null' => true],
		's3_smstemplate_file_id_4' => ['name' => 'File 4', 'domain' => 'file_id', 'null' => true],
		's3_smstemplate_file_id_5' => ['name' => 'File 5', 'domain' => 'file_id', 'null' => true],
		's3_smstemplate_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		's3_sms_templates_pk' => ['type' => 'pk', 'columns' => ['s3_smstemplate_tenant_id', 's3_smstemplate_id']],
		's3_smstemplate_code_un' => ['type' => 'unique', 'columns' => ['s3_smstemplate_tenant_id', 's3_smstemplate_code']],
		's3_smstemplate_language_code_fk' => [
			'type' => 'fk',
			'columns' => ['s3_smstemplate_tenant_id', 's3_smstemplate_language_code'],
			'foreign_model' => '\Numbers\Internalization\Internalization\Model\Language\Codes',
			'foreign_columns' => ['in_language_tenant_id', 'in_language_code']
		],
		's3_smstemplate_organization_id_fk' => [
			'type' => 'fk',
			'columns' => ['s3_smstemplate_tenant_id', 's3_smstemplate_organization_id'],
			'foreign_model' => '\Numbers\Users\Organizations\Model\Organizations',
			'foreign_columns' => ['on_organization_tenant_id', 'on_organization_id']
		],
		's3_smstemplate_parent_smstemplate_id_fk' => [
			'type' => 'fk',
			'columns' => ['s3_smstemplate_tenant_id', 's3_smstemplate_parent_smstemplate_id'],
			'foreign_model' => '\Numbers\Communication\SMS\Model\Templates',
			'foreign_columns' => ['s3_smstemplate_tenant_id', 's3_smstemplate_id']
		]
	];
	public $indexes = [];
	public $history = false;
	public $audit = [
		'map' => [
			's3_smstemplate_tenant_id' => 'wg_audit_tenant_id',
			's3_smstemplate_id' => 'wg_audit_smstemplate_id'
		]
	];
	public $optimistic_lock = true;
	public $options_map = [
		's3_smstemplate_name' => 'name',
		's3_smstemplate_inactive' => 'inactive'
	];
	public $options_active = [
		's3_smstemplate_inactive' => 0
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