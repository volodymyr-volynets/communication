<?php

namespace Numbers\Communication\Campaigns\Form\Advertising;
class Codes extends \Object\Form\Wrapper\Base {
	public $form_link = 'ca_advertising_codes';
	public $module_code = 'CA';
	public $title = 'C/A Advertising Codes Form';
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
			'details_key' => '\Numbers\Communication\Campaigns\Model\Advertising\Organizations',
			'details_pk' => ['ca_adcdorg_organization_id'],
			'required' => true,
			'order' => 35001,
		],
		'locations_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Communication\Campaigns\Model\Advertising\Locations',
			'details_pk' => ['ca_adcdloc_location_id'],
			'order' => 35002,
		],
	];
	public $rows = [
		'tabs' => [
			'general' => ['order' => 100, 'label_name' => 'General'],
			'organizations' => ['order' => 150, 'label_name' => 'Organizations'],
			'locations' => ['order' => 200, 'label_name' => 'Locations'],
		],
	];
	public $elements = [
		'top' => [
			'ca_adcode_id' => [
				'ca_adcode_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Adcode #', 'domain' => 'adcode_id_sequence', 'percent' => 50, 'navigation' => true],
				'ca_adcode_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'required' => 'c', 'percent' => 45, 'navigation' => true],
				'ca_adcode_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'ca_adcode_name' => [
				'ca_adcode_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
			],
		],
		'tabs' => [
			'general' => [
				'general' => ['container' => 'general_container', 'order' => 100],
			],
			'organizations' => [
				'organizations' => ['container' => 'organizations_container', 'order' => 100],
			],
			'locations' => [
				'locations' => ['container' => 'locations_container', 'order' => 100],
			]
		],
		'general_container' => [
			'ca_adcode_icon' => [
				'ca_adcode_icon' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Icon', 'domain' => 'icon', 'null' => true, 'percent' => 100, 'method' => 'select', 'options_model' => '\Numbers\Frontend\HTML\FontAwesome\Model\Icons::options', 'searchable' => true],
			],
			'ca_adcode_start_date' => [
				'ca_adcode_start_date' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Start Date', 'type' => 'date', 'null' => true, 'percent' => 50, 'method' => 'calendar', 'calendar_icon' => 'right'],
				'ca_adcode_end_date' => ['order' => 2, 'label_name' => 'End Date', 'type' => 'date', 'null' => true, 'percent' => 50, 'method' => 'calendar', 'calendar_icon' => 'right'],
			]
		],
		'organizations_container' => [
			'row1' => [
				'ca_adcdorg_organization_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Organization', 'domain' => 'organization_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 80, 'method' => 'select', 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsGroupedActive', 'onchange' => 'this.form.submit();'],
				'ca_adcdorg_all_locations' => ['order' => 2, 'label_name' => 'All Locaitons', 'type' => 'boolean', 'percent' => 15],
				'ca_adcdorg_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'locations_container' => [
			'row1' => [
				'ca_adcdloc_location_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Location', 'domain' => 'location_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Locations::optionsActive', 'onchange' => 'this.form.submit();'],
				'ca_adcdloc_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'Advertising Codes',
		'model' => '\Numbers\Communication\Campaigns\Model\Advertising\Codes',
		'details' => [
			'\Numbers\Communication\Campaigns\Model\Advertising\Organizations' => [
				'name' => 'Advertising Organizations',
				'pk' => ['ca_adcdorg_tenant_id', 'ca_adcdorg_adcode_id', 'ca_adcdorg_organization_id'],
				'type' => '1M',
				'map' => ['ca_adcode_tenant_id' => 'ca_adcdorg_tenant_id', 'ca_adcode_id' => 'ca_adcdorg_adcode_id']
			],
			'\Numbers\Communication\Campaigns\Model\Advertising\Locations' => [
				'name' => 'Advertising Locations',
				'pk' => ['ca_adcdloc_tenant_id', 'ca_adcdloc_adcode_id', 'ca_adcdloc_location_id'],
				'type' => '1M',
				'map' => ['ca_adcode_tenant_id' => 'ca_adcdloc_tenant_id', 'ca_adcode_id' => 'ca_adcdloc_adcode_id']
			]
		]
	];

	public function processOptionsModels(& $form, $field_name, $details_key, $details_parent_key, & $where, $neighbouring_values, $details_value) {
		if ($field_name == 'ca_adcdloc_location_id') {
			$where['on_location_organization_id'] = array_extract_values_by_key($form->values['\Numbers\Communication\Campaigns\Model\Advertising\Organizations'], 'ca_adcdorg_organization_id', ['unique' => true]);
		}
	}
}