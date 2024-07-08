<?php

namespace Numbers\Communication\News\Model;
class NewsAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Communication\News\Model\News::class;

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
	public ?int $ns_new_tenant_id = NULL;

	/**
	 * News #
	 *
	 *
	 *
	 * {domain{group_id_sequence}}
	 *
	 * @var int Domain: group_id_sequence Type: serial
	 */
	public ?int $ns_new_id = null;

	/**
	 * Title
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $ns_new_title = null;

	/**
	 * Content
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: text
	 */
	public ?string $ns_new_content = null;

	/**
	 * Start Date
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: date
	 */
	public ?string $ns_new_start_date = null;

	/**
	 * End Date
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: date
	 */
	public ?string $ns_new_end_date = null;

	/**
	 * Category #
	 *
	 *
	 *
	 * {domain{group_id}}
	 *
	 * @var int Domain: group_id Type: integer
	 */
	public ?int $ns_new_category_id = NULL;

	/**
	 * All Roles
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $ns_new_show_to_all_roles = 0;

	/**
	 * Hot
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $ns_new_hot = 0;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $ns_new_inactive = 0;

	/**
	 * Optimistic Lock
	 *
	 *
	 *
	 * {domain{optimistic_lock}}
	 *
	 * @var string Domain: optimistic_lock Type: timestamp
	 */
	public ?string $ns_new_optimistic_lock = 'now()';

	/**
	 * Inserted Datetime
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: timestamp
	 */
	public ?string $ns_new_inserted_timestamp = null;

	/**
	 * Inserted User #
	 *
	 *
	 *
	 * {domain{user_id}}
	 *
	 * @var int Domain: user_id Type: bigint
	 */
	public ?int $ns_new_inserted_user_id = NULL;

	/**
	 * Updated Datetime
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: timestamp
	 */
	public ?string $ns_new_updated_timestamp = null;

	/**
	 * Updated User #
	 *
	 *
	 *
	 * {domain{user_id}}
	 *
	 * @var int Domain: user_id Type: bigint
	 */
	public ?int $ns_new_updated_user_id = NULL;
}