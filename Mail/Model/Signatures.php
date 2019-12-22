<?php

namespace Numbers\Communication\Mail\Model;
class Signatures extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'ML';
	public $title = 'M/L Email Signatures';
	public $schema;
	public $name = 'ml_email_signatures';
	public $pk = ['ml_emailsignature_tenant_id', 'ml_emailsignature_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'ml_emailsignature_';
	public $columns = [
		'ml_emailsignature_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'ml_emailsignature_id' => ['name' => 'Signature #', 'domain' => 'signature_id_sequence'],
		'ml_emailsignature_name' => ['name' => 'Name', 'domain' => 'name'],
		'ml_emailsignature_language_code' => ['name' => 'Language Code', 'domain' => 'language_code', 'null' => true],
		'ml_emailsignature_organization_id' => ['name' => 'Organization #', 'domain' => 'organization_id', 'null' => true],
		'ml_emailsignature_body' => ['name' => 'Body', 'type' => 'text', 'null' => true],
		'ml_emailsignature_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'ml_email_signatures_pk' => ['type' => 'pk', 'columns' => ['ml_emailsignature_tenant_id', 'ml_emailsignature_id']],
		'ml_emailsignature_language_code_fk' => [
			'type' => 'fk',
			'columns' => ['ml_emailsignature_tenant_id', 'ml_emailsignature_language_code'],
			'foreign_model' => '\Numbers\Internalization\Internalization\Model\Language\Codes',
			'foreign_columns' => ['in_language_tenant_id', 'in_language_code']
		],
		'ml_emailsignature_organization_id_fk' => [
			'type' => 'fk',
			'columns' => ['ml_emailsignature_tenant_id', 'ml_emailsignature_organization_id'],
			'foreign_model' => '\Numbers\Users\Organizations\Model\Organizations',
			'foreign_columns' => ['on_organization_tenant_id', 'on_organization_id']
		],
	];
	public $indexes = [
		'ml_email_signatures_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['ml_emailsignature_name']],
	];
	public $history = false;
	public $audit = [
		'map' => [
			'ml_emailsignature_tenant_id' => 'wg_audit_tenant_id',
			'ml_emailsignature_id' => 'wg_audit_emailsignature_id'
		]
	];
	public $optimistic_lock = true;
	public $options_map = [
		'ml_emailsignature_name' => 'name',
		'ml_emailsignature_inactive' => 'inactive'
	];
	public $options_active = [
		'ml_emailsignature_inactive' => 0
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