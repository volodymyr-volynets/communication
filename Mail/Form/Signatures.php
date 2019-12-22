<?php

namespace Numbers\Communication\Mail\Form;
class Signatures extends \Object\Form\Wrapper\Base {
	public $form_link = 'ml_email_signatures';
	public $module_code = 'ML';
	public $title = 'M/L Email Signatures Form';
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
			'ml_emailsignature_id' => [
				'ml_emailsignature_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Signature #', 'domain' => 'signature_id_sequence', 'percent' => 95, 'navigation' => true],
				'ml_emailsignature_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'ml_emailsignature_name' => [
				'ml_emailsignature_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
			],
			'ml_emailsignature_language_code' => [
				'ml_emailsignature_language_code' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Language', 'domain' => 'language_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Internalization\Internalization\Model\Language\Codes::optionsActive'],
				'ml_emailsignature_organization_id' => ['order' => 2, 'label_name' => 'Organization', 'domain' => 'organization_id', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsActive'],
			],
			'ml_emailsignature_body' => [
				'ml_emailsignature_body' => ['order' => 1, 'row_order' => 500, 'label_name' => 'Body', 'type' => 'text', 'null' => true, 'required' => true, 'method' => 'wysiwyg', 'wysiwyg_height' => 200],
			],
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'Email Signatures',
		'model' => '\Numbers\Communication\Mail\Model\Signatures',
	];
}