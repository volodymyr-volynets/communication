<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Communication\Mail\Model\MailBox\Internal;

use Object\Table;

class Roles extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'ML';
    public $title = 'M/L Internal Mailbox Roles';
    public $name = 'ml_internal_mailbox_roles';
    public $pk = ['ml_internalmboxrol_tenant_id', 'ml_internalmboxrol_internalmailbox_id', 'ml_internalmboxrol_role_id'];
    public $tenant = true;
    public $orderby = [
        'ml_internalmboxrol_timestamp' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'ml_internalmboxrol_';
    public $columns = [
        'ml_internalmboxrol_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'ml_internalmboxrol_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
        'ml_internalmboxrol_internalmailbox_id' => ['name' => 'Mailbox #', 'domain' => 'mailbox_id'],
        'ml_internalmboxrol_role_id' => ['name' => 'Role #', 'domain' => 'role_id'],
        'ml_internalmboxrol_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'ml_internal_mailbox_roles_pk' => ['type' => 'pk', 'columns' => ['ml_internalmboxrol_tenant_id', 'ml_internalmboxrol_internalmailbox_id', 'ml_internalmboxrol_role_id']],
        'ml_internalmboxrol_internalmailbox_id_fk' => [
            'type' => 'fk',
            'columns' => ['ml_internalmboxrol_tenant_id', 'ml_internalmboxrol_internalmailbox_id'],
            'foreign_model' => '\Numbers\Communication\Mail\Model\MailBox\Internals',
            'foreign_columns' => ['ml_internalmailbox_tenant_id', 'ml_internalmailbox_id']
        ],
        'ml_internalmboxrol_role_id_fk' => [
            'type' => 'fk',
            'columns' => ['ml_internalmboxrol_tenant_id', 'ml_internalmboxrol_role_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Roles',
            'foreign_columns' => ['um_role_tenant_id', 'um_role_id']
        ]
    ];
    public $indexes = [];
    public $history = false;
    public $audit = false;
    public $options_map = [];
    public $options_active = [];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = false;
    public $cache_tags = [];
    public $cache_memory = false;

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
