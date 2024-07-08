<?php

namespace Numbers\Communication\News\Model\News;
class LanguagesAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Communication\News\Model\News\Languages::class;

	/**
	 * Constructing object
	 *
	 * @param array $options
	 *		skip_db_object
	 *		skip_table_object
	 */
	public function __construct($options = []) {
		if (empty($options['skip_table_object'])) {
			$this->object_table_object = new $this->object_table_class($options);
		}
	}
	/**
	 * Tenant #
	 *
	 *
	 *
	 * {domain{tenant_id}}
	 *
	 * @var int Domain: tenant_id Type: integer
	 */
	public ?int $ns_nwslang_tenant_id = NULL;

	/**
	 * Timestamp
	 *
	 *
	 *
	 * {domain{timestamp_now}}
	 *
	 * @var string Domain: timestamp_now Type: timestamp
	 */
	public ?string $ns_nwslang_timestamp = 'now()';

	/**
	 * News #
	 *
	 *
	 *
	 * {domain{group_id}}
	 *
	 * @var int Domain: group_id Type: integer
	 */
	public ?int $ns_nwslang_news_id = NULL;

	/**
	 * Language Code
	 *
	 *
	 *
	 * {domain{language_code}}
	 *
	 * @var string Domain: language_code Type: char
	 */
	public ?string $ns_nwslang_language_code = null;

	/**
	 * Title
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $ns_nwslang_title = null;

	/**
	 * Primary
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $ns_nwslang_primary = 0;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $ns_nwslang_inactive = 0;
}