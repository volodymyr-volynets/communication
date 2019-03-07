<?php

namespace Numbers\Communication\News\Form;
class News extends \Object\Form\Wrapper\Base {
	public $form_link = 'ns_news';
	public $module_code = 'NS';
	public $title = 'N/S News Form';
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
		'roles_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Communication\News\Model\News\Roles',
			'details_pk' => ['ns_nwsrol_role_id'],
			'order' => 35000
		],
		'organizations_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Communication\News\Model\News\Organizations',
			'details_pk' => ['ns_nwsorg_organization_id'],
			'required' => true,
			'order' => 35001
		],
		'languages_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Communication\News\Model\News\Languages',
			'details_pk' => ['ns_nwslang_language_code'],
			'required' => true,
			'order' => 35002
		],
		'content_container' => [
			'type' => 'subdetails',
			'label_name' => 'Content',
			'details_11' => true,
			'details_rendering_type' => 'grid_with_label',
			'details_parent_key' => '\Numbers\Communication\News\Model\News\Languages',
			'details_key' => '\Numbers\Communication\News\Model\News\Language\Contents',
			'details_pk' => ['ns_nwslngcon_language_code'],
			'order' => 35003,
			'required' => true,
		],
	];
	public $rows = [
		'tabs' => [
			'general' => ['order' => 100, 'label_name' => 'General'],
			'content' => ['order' => 150, 'label_name' => 'Content'],
			'organizations' => ['order' => 200, 'label_name' => 'Organizations'],
			'roles' => ['order' => 300, 'label_name' => 'Roles'],
		]
	];
	public $elements = [
		'top' => [
			'ns_new_id' => [
				'ns_new_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'News #', 'domain' => 'group_id_sequence', 'percent' => 100, 'navigation' => true],
				'ns_new_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'ns_new_title' => [
				'ns_new_title' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Title', 'domain' => 'name', 'percent' => 100, 'required' => true],
			],
		],
		'tabs' => [
			'general' => [
				'general' => ['container' => 'general_container', 'order' => 100],
			],
			'content' => [
				'content' => ['container' => 'languages_container', 'order' => 100],
			],
			'organizations' => [
				'organizations' => ['container' => 'organizations_container', 'order' => 100],
			],
			'roles' => [
				'all' => ['container' => 'all_roles_container', 'order' => -100],
				'roles' => ['container' => 'roles_container', 'order' => 100],
			],
		],
		'general_container' => [
			'ns_new_start_date' => [
				'ns_new_start_date' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Start Date', 'type' => 'date', 'percent' => 25, 'method' => 'calendar', 'calendar_icon' => 'right'],
				'ns_new_end_date' => ['order' => 2, 'label_name' => 'End Date', 'type' => 'date', 'percent' => 25, 'method' => 'calendar', 'calendar_icon' => 'right'],
				'ns_new_category_id' => ['order' => 3, 'label_name' => 'Category', 'domain' => 'group_id', 'null' => true, 'required' => true, 'percent' => 45, 'method' => 'select', 'options_model' => '\Numbers\Communication\News\Model\Categories::optionsActive'],
				'ns_new_hot' => ['order' => 4, 'label_name' => 'Hot', 'type' => 'boolean', 'percent' => 5],
			],
		],
		'all_roles_container' => [
			'row1' => [
				'ns_new_show_to_all_roles' => ['order' => 1, 'row_order' => 100, 'label_name' => 'All Roles', 'type' => 'boolean'],
			]
		],
		'languages_container' => [
			'row1' => [
				'ns_nwslang_language_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Language', 'domain' => 'language_code', 'null' => true, 'required' => true, 'percent' => 80, 'method' => 'select', 'options_model' => '\Numbers\Internalization\Internalization\Model\Language\Codes::optionsActive', 'options_params' => ['in_language_code;<>' => 'sm0'], 'onchange' => 'this.form.submit();'],
				'ns_nwslang_primary' => ['order' => 2, 'label_name' => 'Primary', 'type' => 'boolean', 'percent' => 15, 'required' => 'c'],
				'ns_nwslang_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'row2' => [
				'ns_nwslang_title' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Title', 'domain' => 'name', 'null' => true, 'required' => true, 'percent' => 100],
			]
		],
		'content_container' => [
			'row1' => [
				'ns_nwslngcon_content' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Content', 'domain' => 'comment', 'null' => true, 'required' => true, 'percent' => 100, 'method' => 'wysiwyg', 'placeholder' => 'Content'],
			]
		],
		'roles_container' => [
			'row1' => [
				'ns_nwsrol_role_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Role', 'domain' => 'role_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\Roles', 'onchange' => 'this.form.submit();'],
				'ns_nwsrol_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'organizations_container' => [
			'row1' => [
				'ns_nwsorg_organization_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Organization', 'domain' => 'organization_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsGroupedActive', 'onchange' => 'this.form.submit();'],
				'ns_nwsorg_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'News',
		'model' => '\Numbers\Communication\News\Model\News',
		'details' => [
			'\Numbers\Communication\News\Model\News\Organizations' => [
				'name' => 'Organizations',
				'pk' => ['ns_nwsorg_tenant_id', 'ns_nwsorg_news_id', 'ns_nwsorg_organization_id'],
				'type' => '1M',
				'map' => ['ns_new_tenant_id' => 'ns_nwsorg_tenant_id', 'ns_new_id' => 'ns_nwsorg_news_id']
			],
			'\Numbers\Communication\News\Model\News\Roles' => [
				'name' => 'Roles',
				'pk' => ['ns_nwsrol_tenant_id', 'ns_nwsrol_news_id', 'ns_nwsrol_role_id'],
				'type' => '1M',
				'map' => ['ns_new_tenant_id' => 'ns_nwsrol_tenant_id', 'ns_new_id' => 'ns_nwsrol_news_id']
			],
			'\Numbers\Communication\News\Model\News\Languages' => [
				'name' => 'Languages',
				'pk' => ['ns_nwslang_tenant_id', 'ns_nwslang_news_id', 'ns_nwslang_language_code'],
				'type' => '1M',
				'map' => ['ns_new_tenant_id' => 'ns_nwslang_tenant_id', 'ns_new_id' => 'ns_nwslang_news_id'],
				'details' => [
					'\Numbers\Communication\News\Model\News\Language\Contents' => [
						'name' => 'Language Content',
						'pk' => ['ns_nwslngcon_tenant_id', 'ns_nwslngcon_news_id', 'ns_nwslngcon_language_code'],
						'type' => '11',
						'map' => ['ns_nwslang_tenant_id' => 'ns_nwslngcon_tenant_id', 'ns_nwslang_news_id' => 'ns_nwslngcon_news_id', 'ns_nwslang_language_code' => 'ns_nwslngcon_language_code']
					],
				]
			],
		]
	];

	public function validate(& $form) {
		// you must set roles or select all
		if (empty($form->values['\Numbers\Communication\News\Model\News\Roles']) && empty($form->values['ns_new_show_to_all_roles'])) {
			$form->error(DANGER, \Object\Content\Messages::REQUIRED_FIELD, "\Numbers\Communication\News\Model\News\Roles[1][ns_nwsrol_role_id]");
		}
		// must have primary language
		$primary_language_code = $form->validateDetailsPrimaryColumn(
			'\Numbers\Communication\News\Model\News\Languages',
			'ns_nwslang_primary',
			'ns_nwslang_inactive',
			'ns_nwslang_language_code'
		);
	}

	public function processOptionsModels(& $form, $field_name, $details_key, $details_parent_key, & $where) {
		if ($field_name == 'ns_nwsrol_role_id') {
			$where['selected_organizations'] = array_extract_values_by_key($form->values['\Numbers\Communication\News\Model\News\Organizations'], 'ns_nwsorg_organization_id', ['unique' => true]);
		}
	}
}