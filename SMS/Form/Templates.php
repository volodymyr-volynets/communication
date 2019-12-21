<?php

namespace Numbers\Communication\SMS\Form;
class Templates extends \Object\Form\Wrapper\Base {
	public $form_link = 's3_sms_templates';
	public $module_code = 'S3';
	public $title = 'S/3 SMS Templates Form';
	public $options = [
		'segment' => self::SEGMENT_FORM,
		'actions' => [
			'refresh' => true,
			'back' => true,
			'new' => true,
			'import' => true
		],
	];
	public $containers = [
		'top' => ['default_row_type' => 'grid', 'order' => 100],
		'buttons' => ['default_row_type' => 'grid', 'order' => 900],
	];
	public $rows = [];
	public $elements = [
		'top' => [
			's3_smstemplate_id' => [
				's3_smstemplate_id' => ['order' => 1, 'row_order' => 100, 'label_name' => ' Mailbox #', 'domain' => 'mailbox_id_sequence', 'percent' => 50, 'navigation' => true],
				's3_smstemplate_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 45, 'navigation' => true],
				's3_smstemplate_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			's3_smstemplate_name' => [
				's3_smstemplate_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
			],
			's3_smstemplate_language_code' => [
				's3_smstemplate_language_code' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Language', 'domain' => 'language_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Internalization\Internalization\Model\Language\Codes::optionsActive'],
				's3_smstemplate_organization_id' => ['order' => 2, 'label_name' => 'Organization', 'domain' => 'organization_id', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsActive'],
			],
			's3_smstemplate_parent_smstemplate_id' => [
				's3_smstemplate_parent_smstemplate_id' => ['order' => 1, 'row_order' => 350, 'label_name' => 'Parent Template', 'domain' => 'template_id', 'null' => true, 'method' => 'select', 'options_model' => '\Numbers\Communication\SMS\Model\Templates::optionsActive', 'options_depends' => ['s3_smstemplate_id;<>' => 'parent::s3_smstemplate_id']],
			],
			's3_smstemplate_body' => [
				's3_smstemplate_body' => ['order' => 1, 'row_order' => 500, 'label_name' => 'Body', 'type' => 'text', 'null' => true, 'required' => true, 'method' => 'textarea', 'rows' => 2],
			],
			's3_smstemplate_optout_reply' => [
				's3_smstemplate_optout_reply' => ['order' => 1, 'row_order' => 550, 'label_name' => 'Opt-out Reply', 'type' => 'text', 'null' => true, 'required' => true, 'method' => 'textarea', 'rows' => 2],
			],
			's3_smstemplate_file_id_1' => [
				's3_smstemplate_file_new' => ['order' => 1, 'row_order' => 600, 'label_name' => 'New Attachment(s)', 'type' => 'mixed', 'percent' => 50, 'method' => 'file', 'null' => true, 'multiple' => false, 'documents_save' => ['prefix' => 's3_smstemplate_file_id_', 'max_files' => 5], 'validator_method' => '\Numbers\Users\Documents\Base\Validator\Files::validate', 'validator_params' => ['types' => ['images', 'audio', 'documents', 'archives']]],
				's3_smstemplate_file_list' => ['order' => 3, 'label_name' => 'Existing Attachment(s)', 'type' => 'mixed', 'percent' => 50, 'method' => 'span', 'documents_render_links' => ['prefix' => 's3_smstemplate_file_id_', 'max_files' => 5]],
			],
			self::HIDDEN => [
				's3_smstemplate_file_id_1' => ['label_name' => 'File 1', 'domain' => 'file_id', 'null' => true, 'method' => 'hidden'],
				's3_smstemplate_file_id_2' => ['label_name' => 'File 2', 'domain' => 'file_id', 'null' => true, 'method' => 'hidden'],
				's3_smstemplate_file_id_3' => ['label_name' => 'File 3', 'domain' => 'file_id', 'null' => true, 'method' => 'hidden'],
				's3_smstemplate_file_id_4' => ['label_name' => 'File 4', 'domain' => 'file_id', 'null' => true, 'method' => 'hidden'],
				's3_smstemplate_file_id_5' => ['label_name' => 'File 5', 'domain' => 'file_id', 'null' => true, 'method' => 'hidden'],
			]
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'SMS Templates',
		'model' => '\Numbers\Communication\SMS\Model\Templates',
	];
}