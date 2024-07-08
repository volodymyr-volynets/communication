<?php

namespace Numbers\Communication\News\Model\News\Language;
class ContentsAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Communication\News\Model\News\Language\Contents::class;

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
	public ?int $ns_nwslngcon_tenant_id = NULL;

	/**
	 * News #
	 *
	 *
	 *
	 * {domain{group_id}}
	 *
	 * @var int Domain: group_id Type: integer
	 */
	public ?int $ns_nwslngcon_news_id = NULL;

	/**
	 * Language Code
	 *
	 *
	 *
	 * {domain{language_code}}
	 *
	 * @var string Domain: language_code Type: char
	 */
	public ?string $ns_nwslngcon_language_code = null;

	/**
	 * Content
	 *
	 *
	 *
	 * {domain{comment}}
	 *
	 * @var string Domain: comment Type: text
	 */
	public ?string $ns_nwslngcon_content = null;
}