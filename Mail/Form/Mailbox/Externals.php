<?php

namespace Numbers\Communication\Mail\Form\Mailbox;
class Externals extends \Object\Form\Wrapper\Base {
	public $form_link = 'ml_external_mailboxes';
	public $module_code = 'ML';
	public $title = 'M/L External Mailboxes Form';
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
			'ml_externalmailbox_id' => [
				'ml_externalmailbox_id' => ['order' => 1, 'row_order' => 100, 'label_name' => ' Mailbox #', 'domain' => 'mailbox_id_sequence', 'percent' => 50, 'navigation' => true],
				'ml_externalmailbox_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 45, 'navigation' => true],
				'ml_externalmailbox_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'ml_externalmailbox_name' => [
				'ml_externalmailbox_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
			],
			'ml_externalmailbox_externalmboxtype_code' => [
				'ml_externalmailbox_externalmboxtype_code' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Type', 'domain' => 'type_code', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Communication\Mail\Model\MailBox\External\Types'],
				'ml_externalmailbox_internalmailbox_id' => ['order' => 2, 'label_name' => 'Internal Mailbox', 'domain' => 'mailbox_id', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Communication\Mail\Model\MailBox\Internals::optionsActive'],
			],
			'ml_externalmailbox_password_code' => [
				'ml_externalmailbox_password_code' => ['order' => 1, 'row_order' => 400, 'label_name' => 'Credentials', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 100, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Credential\Passwords::optionsActive'],
			]
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'External Mailboxes',
		'model' => '\Numbers\Communication\Mail\Model\MailBox\Externals',
	];
}