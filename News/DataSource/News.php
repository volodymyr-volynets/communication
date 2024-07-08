<?php

namespace Numbers\Communication\News\DataSource;
class News extends \Object\DataSource {
	public $db_link;
	public $db_link_flag;
	public $pk = ['ns_new_id'];
	public $columns;
	public $orderby;
	public $limit;
	public $single_row;
	public $single_value;
	public $options_map =[
		'ns_new_title' => 'name'
	];
	public $options_active =[];
	public $column_prefix = 'ns_new_';

	public $cache = false;
	public $cache_tags = [];
	public $cache_memory = false;

	public $primary_model = '\Numbers\Communication\News\Model\News';
	public $parameters = [
		'include_content' => ['name' => 'Include Content', 'type' => 'boolean'],
		'skip_counting_users' => ['name' => 'Public', 'type' => 'boolean'],
		'public' => ['name' => 'Public', 'type' => 'boolean'],
	];

	public function query($parameters, $options = []) {
		$this->query->columns([
			'ns_new_id' => 'a.ns_new_id',
			'ns_new_title' => 'a.ns_new_title',
			'ns_new_hot' => 'a.ns_new_hot',
			'ns_new_category_id' => 'a.ns_new_category_id',
			'ns_category_name' => 'b.ns_category_name',
			'ns_new_inserted_timestamp' => 'a.ns_new_inserted_timestamp'
		]);
		if (!empty($parameters['include_content'])) {
			$this->query->columns([
				'ns_nwslang_language_code' => 'd.ns_nwslang_language_code',
				'ns_nwslang_title' => 'd.ns_nwslang_title',
				'ns_nwslngcon_content' => 'd.ns_nwslngcon_content',
				'wg_document_file_ids' => 'e.wg_document_file_ids'
			]);
		}
		// joins
		$this->query->join('INNER', new \Numbers\Communication\News\Model\Categories(), 'b', 'ON', [
			['AND', ['a.ns_new_category_id', '=', 'b.ns_category_id', true], false]
		]);
		if (empty($parameters['skip_counting_users'])) {
			$this->query->join('LEFT', new \Numbers\Communication\News\Model\News\Users(), 'c', 'ON', [
				['AND', ['a.ns_new_id', '=', 'c.ns_nwsusr_news_id', true], false],
				['AND', ['c.ns_nwsusr_user_id', '=', \User::id()], false]
			]);
			$this->query->columns([
				'ns_new_read_user' => 'c.ns_nwsusr_user_id',
			]);
		}
		if (!empty($parameters['include_content'])) {
			$this->query->join('LEFT', function (& $query) {
				$query = \Numbers\Communication\News\Model\News\Languages::queryBuilderStatic(['alias' => 'inner_d2'])->select();
				$query->columns([
					'ns_nwslang_news_id' => 'inner_d2.ns_nwslang_news_id',
					'ns_nwslang_language_code' => 'COALESCE(inner_d1.ns_nwslang_language_code, inner_d2.ns_nwslang_language_code)',
					'ns_nwslang_title' => 'COALESCE(inner_d1.ns_nwslang_title, inner_d2.ns_nwslang_title)',
					'ns_nwslngcon_content' => 'inner_d3.ns_nwslngcon_content'
				]);
				$query->join('LEFT', new \Numbers\Communication\News\Model\News\Languages(), 'inner_d1', 'ON', [
					['AND', ['inner_d1.ns_nwslang_news_id', '=', 'inner_d2.ns_nwslang_news_id', true], false],
					['AND', ['inner_d1.ns_nwslang_language_code', '=', \I18n::$options['language_code'], false], false]
				]);
				$query->join('INNER', new \Numbers\Communication\News\Model\News\Language\Contents(), 'inner_d3', 'ON', [
					['AND', ['inner_d2.ns_nwslang_news_id', '=', 'inner_d3.ns_nwslngcon_news_id', true], false],
					['AND', ['inner_d3.ns_nwslngcon_language_code', '=', 'COALESCE(inner_d1.ns_nwslang_language_code, inner_d2.ns_nwslang_language_code)', true], false]
				]);
				$query->where('AND', ['inner_d2.ns_nwslang_primary', '=', 1, false]);
				$query->where('AND', ['inner_d2.ns_nwslang_inactive', '=', 0, false]);
			}, 'd', 'ON', [
				['AND', ['a.ns_new_id', '=', 'd.ns_nwslang_news_id', true], false]
			]);
			$this->query->join('LEFT', function (& $query) {
				$file_model = new \Numbers\Communication\News\Model\News();
				$document_model = \Factory::model($file_model->{'documents_model'}, false);
				$query = $document_model->queryBuilder(['alias' => 'inner_e1'])->select();
				$columns = [];
				for ($i = 1; $i <= 30; $i++) {
					$columns[] = 'wg_document_file_id_' . $i;
				}
				$columns = implode(', ', $columns);
				$query->columns([
					'wg_document_new_id' => 'inner_e1.wg_document_new_id',
					'wg_document_file_ids' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws(';;', {$columns})", 'delimiter' => ';;'])
				]);
				$query->groupby(['wg_document_new_id']);
			}, 'e', 'ON', [
				['AND', ['a.ns_new_id', '=', 'e.wg_document_new_id', true], false]
			]);
		}
		// where
		if (isset($parameters['public'])) {
			$this->query->where('AND', ['a.ns_new_public', '=', $parameters['public'], false]);
		}
		$this->query->where('AND', ['a.ns_new_inactive', '=', 0, false]);
		$organizations = \User::get('organizations');
		if (!empty($organizations) && !\User::get('super_admin')) {
			$this->query->where('AND', function (& $query) use ($organizations) {
				$query = \Numbers\Communication\News\Model\News\Organizations::queryBuilderStatic(['alias' => 'inner_d'])->select();
				$query->columns(1);
				$query->where('AND', ['inner_d.ns_nwsorg_news_id', '=', 'a.ns_new_id', true]);
				$query->where('AND', ['inner_d.ns_nwsorg_organization_id', 'IN', $organizations, false]);
			}, true);
		}
		$this->query->where('AND', function (& $query) {
			$query->where('OR', ['a.ns_new_show_to_all_roles', '=', 1]);
			$query->where('OR', function (& $query) {
				$query = \Numbers\Communication\News\Model\News\Roles::queryBuilderStatic(['alias' => 'inner_r'])->select();
				$query->columns(1);
				$query->where('AND', ['inner_r.ns_nwsrol_news_id', '=', 'a.ns_new_id', true]);
				$query->where('AND', ['inner_r.ns_nwsrol_role_id', '=', \User::get('role_ids')]);
			}, true);
		});
		$this->query->where('AND', function (& $query) {
			$query->where('OR', ['a.ns_new_start_date', 'IS', null]);
			$query->where('OR', ['a.ns_new_start_date', '<=', \Format::now('date')]);
		});
		$this->query->where('AND', function (& $query) {
			$query->where('OR', ['a.ns_new_end_date', 'IS', null]);
			$query->where('OR', ['a.ns_new_end_date', '>=', \Format::now('date')]);
		});
		// order
		$this->query->orderby(['a.ns_new_id' => SORT_DESC]);
	}

	public function process($data, $options = []) {
		foreach ($data as $k => $v) {
			if (!empty($v['wg_document_file_ids'])) {
				$data[$k]['wg_document_file_ids'] = explode(';;', $v['wg_document_file_ids']);
			} else {
				$data[$k]['wg_document_file_ids'] = [];
			}
		}
		return $data;
	}

	/**
	 * Prepare summary
	 *
	 * @param array $data
	 * @return array
	 */
	public function prepareSummary(array $data) {
		$result = [
			'summary' => [
				'Unread' => 0,
				'Hot' => 0
			],
			'categories' => []
		];
		foreach ($data as $k => $v) {
			if (!empty($v['ns_new_hot'])) {
				$result['summary']['Hot']+= 1;
			}
			if (empty($v['ns_new_read_user'])) {
				$result['summary']['Unread']+= 1;
			}
			if (!isset($result['categories'][$v['ns_new_category_id']]['name'])) {
				$result['categories'][$v['ns_new_category_id']]['name'] = i18n(null, $v['ns_category_name']);
			}
			$result['categories'][$v['ns_new_category_id']]['count'] = ($result['categories'][$v['ns_new_category_id']]['count'] ?? 0) + 1;
		}
		// sort is a must
		array_key_sort($result['categories'], ['name' => SORT_ASC]);
		return $result;
	}
}