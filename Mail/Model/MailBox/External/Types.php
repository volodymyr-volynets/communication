<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Communication\Mail\Model\MailBox\External;

use Object\Data;

class Types extends Data
{
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
