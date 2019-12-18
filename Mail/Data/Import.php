<?php

namespace Numbers\Communication\Mail\Data;
class Import extends \Object\Import {
	public $data = [
		'modules' => [
			'options' => [
				'pk' => ['sm_module_code'],
				'model' => '\Numbers\Backend\System\Modules\Model\Collection\Modules',
				'method' => 'save'
			],
			'data' => [
				[
					'sm_module_code' => 'ML',
					'sm_module_type' => 20,
					'sm_module_name' => 'M/L Mail Management',
					'sm_module_abbreviation' => 'M/L',
					'sm_module_icon' => 'fas fa-mail-bulk',
					'sm_module_transactions' => 0,
					'sm_module_multiple' => 0,
					'sm_module_activation_model' => null,
					'sm_module_custom_activation' => false,
					'sm_module_inactive' => 0,
					'\Numbers\Backend\System\Modules\Model\Module\Dependencies' => [
						[
							'sm_mdldep_child_module_code' => 'ON',
							'sm_mdldep_child_feature_code' => 'ON::ORGANIZATIONS'
						],
						[
							'sm_mdldep_child_module_code' => 'UM',
							'sm_mdldep_child_feature_code' => 'UM::USERS'
						],
					]
				]
			]
		],
		'features' => [
			'options' => [
				'pk' => ['sm_feature_code'],
				'model' => '\Numbers\Backend\System\Modules\Model\Collection\Module\Features',
				'method' => 'save'
			],
			'data' => [
				[
					'sm_feature_module_code' => 'ML',
					'sm_feature_code' => 'ML::MAILBOXES',
					'sm_feature_type' => 10,
					'sm_feature_name' => 'M/L Mails',
					'sm_feature_icon' => 'fas fa-mail-bulk',
					'sm_feature_activated_by_default' => 1,
					'sm_feature_activation_model' => null,
					'sm_feature_inactive' => 0,
					'\Numbers\Backend\System\Modules\Model\Module\Dependencies' => [
						[
							'sm_mdldep_child_module_code' => 'ON',
							'sm_mdldep_child_feature_code' => 'ON::ORGANIZATIONS'
						],
						[
							'sm_mdldep_child_module_code' => 'UM',
							'sm_mdldep_child_feature_code' => 'UM::USERS'
						],
					]
				]
			]
		]
	];
}