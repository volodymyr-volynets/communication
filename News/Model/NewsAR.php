<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Communication\News\Model;

use Object\ActiveRecord;

class NewsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = News::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['ns_new_tenant_id','ns_new_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $ns_new_tenant_id = null {
        get => $this->ns_new_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('ns_new_tenant_id', $value);
            $this->ns_new_tenant_id = $value;
        }
    }

    /**
     * News #
     *
     *
     *
     * {domain{group_id_sequence}}
     *
     * @var int|null Domain: group_id_sequence Type: serial
     */
    public int|null $ns_new_id = null {
        get => $this->ns_new_id;
        set {
            $this->setFullPkAndFilledColumn('ns_new_id', $value);
            $this->ns_new_id = $value;
        }
    }

    /**
     * Title
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $ns_new_title = null {
        get => $this->ns_new_title;
        set {
            $this->setFullPkAndFilledColumn('ns_new_title', $value);
            $this->ns_new_title = $value;
        }
    }

    /**
     * Content
     *
     *
     *
     *
     *
     * @var string|null Type: text
     */
    public string|null $ns_new_content = null {
        get => $this->ns_new_content;
        set {
            $this->setFullPkAndFilledColumn('ns_new_content', $value);
            $this->ns_new_content = $value;
        }
    }

    /**
     * Start Date
     *
     *
     *
     *
     *
     * @var string|null Type: date
     */
    public string|null $ns_new_start_date = null {
        get => $this->ns_new_start_date;
        set {
            $this->setFullPkAndFilledColumn('ns_new_start_date', $value);
            $this->ns_new_start_date = $value;
        }
    }

    /**
     * End Date
     *
     *
     *
     *
     *
     * @var string|null Type: date
     */
    public string|null $ns_new_end_date = null {
        get => $this->ns_new_end_date;
        set {
            $this->setFullPkAndFilledColumn('ns_new_end_date', $value);
            $this->ns_new_end_date = $value;
        }
    }

    /**
     * Category #
     *
     *
     *
     * {domain{group_id}}
     *
     * @var int|null Domain: group_id Type: integer
     */
    public int|null $ns_new_category_id = null {
        get => $this->ns_new_category_id;
        set {
            $this->setFullPkAndFilledColumn('ns_new_category_id', $value);
            $this->ns_new_category_id = $value;
        }
    }

    /**
     * All Roles
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $ns_new_show_to_all_roles = 0 {
        get => $this->ns_new_show_to_all_roles;
        set {
            $this->setFullPkAndFilledColumn('ns_new_show_to_all_roles', $value);
            $this->ns_new_show_to_all_roles = $value;
        }
    }

    /**
     * All Organizations
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $ns_new_all_organizations = 0 {
        get => $this->ns_new_all_organizations;
        set {
            $this->setFullPkAndFilledColumn('ns_new_all_organizations', $value);
            $this->ns_new_all_organizations = $value;
        }
    }

    /**
     * Public News
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $ns_new_public = 0 {
        get => $this->ns_new_public;
        set {
            $this->setFullPkAndFilledColumn('ns_new_public', $value);
            $this->ns_new_public = $value;
        }
    }

    /**
     * Hot
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $ns_new_hot = 0 {
        get => $this->ns_new_hot;
        set {
            $this->setFullPkAndFilledColumn('ns_new_hot', $value);
            $this->ns_new_hot = $value;
        }
    }

    /**
     * Inactive
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $ns_new_inactive = 0 {
        get => $this->ns_new_inactive;
        set {
            $this->setFullPkAndFilledColumn('ns_new_inactive', $value);
            $this->ns_new_inactive = $value;
        }
    }

    /**
     * Optimistic Lock
     *
     *
     *
     * {domain{optimistic_lock}}
     *
     * @var string|null Domain: optimistic_lock Type: timestamp
     */
    public string|null $ns_new_optimistic_lock = 'now()' {
        get => $this->ns_new_optimistic_lock;
        set {
            $this->setFullPkAndFilledColumn('ns_new_optimistic_lock', $value);
            $this->ns_new_optimistic_lock = $value;
        }
    }

    /**
     * Inserted Datetime
     *
     *
     *
     *
     *
     * @var string|null Type: timestamp
     */
    public string|null $ns_new_inserted_timestamp = null {
        get => $this->ns_new_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('ns_new_inserted_timestamp', $value);
            $this->ns_new_inserted_timestamp = $value;
        }
    }

    /**
     * Inserted User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $ns_new_inserted_user_id = null {
        get => $this->ns_new_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('ns_new_inserted_user_id', $value);
            $this->ns_new_inserted_user_id = $value;
        }
    }

    /**
     * Updated Datetime
     *
     *
     *
     *
     *
     * @var string|null Type: timestamp
     */
    public string|null $ns_new_updated_timestamp = null {
        get => $this->ns_new_updated_timestamp;
        set {
            $this->setFullPkAndFilledColumn('ns_new_updated_timestamp', $value);
            $this->ns_new_updated_timestamp = $value;
        }
    }

    /**
     * Updated User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $ns_new_updated_user_id = null {
        get => $this->ns_new_updated_user_id;
        set {
            $this->setFullPkAndFilledColumn('ns_new_updated_user_id', $value);
            $this->ns_new_updated_user_id = $value;
        }
    }
}
