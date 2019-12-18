<?php

namespace Numbers\Communication\Mail\Model\MailBox\External;
class Types extends \Object\Data {
	public $module_code = 'ML';
	public $title = 'M/L External Mailbox Types';
	public $column_key = 'ml_externalmboxtype_code';
	public $column_prefix = 'ml_externalmboxtype_';
	public $orderby = [
		'ml_externalmboxtype_name' => SORT_ASC
	];
	public $columns = [
		'ml_externalmboxtype_code' => ['name' => 'Code', 'domain' => 'type_code'],
		'ml_externalmboxtype_name' => ['name' => 'Name', 'type' => 'text']
	];
	public $data = [
		'IMAP' => ['ml_externalmboxtype_name' => 'IMAP'],
	];
}