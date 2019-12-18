<?php

namespace Numbers\Communication\Mail\Form\Mailbox;
class Internals extends \Object\Form\Wrapper\Base {
	public $form_link = 'ml_internal_mailboxes';
	public $module_code = 'ML';
	public $title = 'M/L Internal Mailboxes Form';
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
		'tabs' => ['default_row_type' => 'grid', 'order' => 500, 'type' => 'tabs'],
		'buttons' => ['default_row_type' => 'grid', 'order' => 900],
		'general_container' => ['default_row_type' => 'grid', 'order' => 32000],
		'organizations_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Communication\Mail\Model\MailBox\Internal\Organizations',
			'details_pk' => ['ml_internalmboxorg_organization_id'],
			'required' => true,
			'order' => 35001,
		],
		'users_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Communication\Mail\Model\MailBox\Internal\Users',
			'details_pk' => ['ml_internalmboxorg_user_id'],
			'order' => 35002,
		],
	];
	public $rows = [
		'tabs' => [
			'general' => ['order' => 100, 'label_name' => 'General'],
			'organizations' => ['order' => 150, 'label_name' => 'Organizations'],
			'users' => ['order' => 200, 'label_name' => 'Users'],
		],
	];
	public $elements = [
		'top' => [
			'ml_internalmailbox_id' => [
				'ml_internalmailbox_id' => ['order' => 1, 'row_order' => 100, 'label_name' => ' Mailbox #', 'domain' => 'mailbox_id_sequence', 'percent' => 50, 'navigation' => true],
				'ml_internalmailbox_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 45, 'navigation' => true],
				'ml_internalmailbox_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'ml_internalmailbox_name' => [
				'ml_internalmailbox_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
			],
		],
		'tabs' => [
			'general' => [
				'general' => ['container' => 'general_container', 'order' => 100],
			],
			'organizations' => [
				'organizations' => ['container' => 'organizations_container', 'order' => 100],
			],
			'users' => [
				'user' => ['container' => 'users_container', 'order' => 100],
			]
		],
		'general_container' => [
			'ml_internalmailbox_icon' => [
				'ml_internalmailbox_icon' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Icon', 'domain' => 'icon', 'null' => true, 'percent' => 100, 'method' => 'select', 'options_model' => '\Numbers\Frontend\HTML\FontAwesome\Model\Icons::options', 'searchable' => true],
			],
		],
		'organizations_container' => [
			'row1' => [
				'ml_internalmboxorg_organization_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Organization', 'domain' => 'organization_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 80, 'method' => 'select', 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsGroupedActive', 'onchange' => 'this.form.submit();'],
				'ml_internalmboxorg_all_users' => ['order' => 2, 'label_name' => 'All Users', 'type' => 'boolean', 'percent' => 15],
				'ml_internalmboxorg_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'users_container' => [
			'row1' => [
				'ml_internalmboxorg_user_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'User', 'domain' => 'user_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'tree' => true, 'options_model' => '\Numbers\Users\Users\DataSource\Users::optionsActive', 'onchange' => 'this.form.submit();'],
				'ml_internalmboxorg_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'Internal Mailboxes',
		'model' => '\Numbers\Communication\Mail\Model\MailBox\Internals',
		'details' => [
			'\Numbers\Communication\Mail\Model\MailBox\Internal\Organizations' => [
				'name' => 'Internal Mailbox Organizations',
				'pk' => ['ml_internalmboxorg_tenant_id', 'ml_internalmboxorg_internalmailbox_id', 'ml_internalmboxorg_organization_id'],
				'type' => '1M',
				'map' => ['ml_internalmailbox_tenant_id' => 'ml_internalmboxorg_tenant_id', 'ml_internalmailbox_id' => 'ml_internalmboxorg_internalmailbox_id']
			],
			'\Numbers\Communication\Mail\Model\MailBox\Internal\Users' => [
				'name' => 'Internal Mailbox Users',
				'pk' => ['ml_internalmboxorg_tenant_id', 'ml_internalmboxorg_internalmailbox_id', 'ml_internalmboxorg_user_id'],
				'type' => '1M',
				'map' => ['ml_internalmailbox_tenant_id' => 'ml_internalmboxorg_tenant_id', 'ml_internalmailbox_id' => 'ml_internalmboxorg_internalmailbox_id']
			]
		]
	];

	public function processOptionsModels(& $form, $field_name, $details_key, $details_parent_key, & $where, $neighbouring_values, $details_value) {
		if ($field_name == 'ml_internalmboxorg_user_id') {
			$where['selected_organizations'] = array_extract_values_by_key($form->values['\Numbers\Communication\Mail\Model\MailBox\Internal\Organizations'], 'ml_internalmboxorg_organization_id', ['unique' => true]);
		}
	}
}