<?php

namespace Numbers\Communication\Mail\Form;
class Templates extends \Object\Form\Wrapper\Base {
	public $form_link = 'ml_email_templates';
	public $module_code = 'ML';
	public $title = 'M/L Email Templates Form';
	public $options = [
		'segment' => self::SEGMENT_FORM,
		'actions' => [
			'refresh' => true,
			'back' => true,
			'new' => true,
			'import' => true
		]
	];
	public $containers = [
		'top' => ['default_row_type' => 'grid', 'order' => 100],
		'buttons' => ['default_row_type' => 'grid', 'order' => 900],
	];
	public $rows = [];
	public $elements = [
		'top' => [
			'ml_emailtemplate_id' => [
				'ml_emailtemplate_id' => ['order' => 1, 'row_order' => 100, 'label_name' => ' Mailbox #', 'domain' => 'mailbox_id_sequence', 'percent' => 50, 'navigation' => true],
				'ml_emailtemplate_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 45, 'navigation' => true],
				'ml_emailtemplate_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'ml_emailtemplate_name' => [
				'ml_emailtemplate_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
			],
			'ml_emailtemplate_language_code' => [
				'ml_emailtemplate_language_code' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Language', 'domain' => 'language_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Internalization\Internalization\Model\Language\Codes::optionsActive'],
				'ml_emailtemplate_organization_id' => ['order' => 2, 'label_name' => 'Organization', 'domain' => 'organization_id', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsActive'],
			],
			'ml_emailtemplate_parent_emailtemplate_id' => [
				'ml_emailtemplate_parent_emailtemplate_id' => ['order' => 1, 'row_order' => 350, 'label_name' => 'Parent Template', 'domain' => 'template_id', 'null' => true, 'method' => 'select', 'options_model' => '\Numbers\Communication\Mail\Model\Templates::optionsActive', 'options_depends' => ['ml_emailtemplate_id;<>' => 'parent::ml_emailtemplate_id']],
			],
			'ml_emailtemplate_subject' => [
				'ml_emailtemplate_subject' => ['order' => 1, 'row_order' => 400, 'label_name' => 'Subject', 'domain' => 'description', 'null' => true, 'required' => true, 'method' => 'textarea', 'rows' => 2],
			],
			'ml_emailtemplate_body' => [
				'ml_emailtemplate_body' => ['order' => 1, 'row_order' => 500, 'label_name' => 'Body', 'type' => 'text', 'null' => true, 'required' => true, 'method' => 'wysiwyg', 'wysiwyg_height' => 500],
			],
			'ml_emailtemplate_file_id_1' => [
				'ml_emailtemplate_file_new' => ['order' => 1, 'row_order' => 600, 'label_name' => 'New Attachment(s)', 'type' => 'mixed', 'percent' => 50, 'method' => 'file', 'null' => true, 'multiple' => true, 'documents_save' => ['prefix' => 'ml_emailtemplate_file_id_', 'max_files' => 5], 'validator_method' => '\Numbers\Users\Documents\Base\Validator\Files::validate', 'validator_params' => ['types' => ['images', 'audio', 'documents', 'archives']]],
				'ml_emailtemplate_file_list' => ['order' => 3, 'label_name' => 'Existing Attachment(s)', 'type' => 'mixed', 'percent' => 50, 'method' => 'span', 'documents_render_links' => ['prefix' => 'ml_emailtemplate_file_id_', 'max_files' => 5]],
			],
			self::HIDDEN => [
				'ml_emailtemplate_file_id_1' => ['label_name' => 'File 1', 'domain' => 'file_id', 'null' => true, 'method' => 'hidden'],
				'ml_emailtemplate_file_id_2' => ['label_name' => 'File 2', 'domain' => 'file_id', 'null' => true, 'method' => 'hidden'],
				'ml_emailtemplate_file_id_3' => ['label_name' => 'File 3', 'domain' => 'file_id', 'null' => true, 'method' => 'hidden'],
				'ml_emailtemplate_file_id_4' => ['label_name' => 'File 4', 'domain' => 'file_id', 'null' => true, 'method' => 'hidden'],
				'ml_emailtemplate_file_id_5' => ['label_name' => 'File 5', 'domain' => 'file_id', 'null' => true, 'method' => 'hidden'],
			]
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'Email Templates',
		'model' => '\Numbers\Communication\Mail\Model\Templates',
	];
}