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

class CategoriesAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Categories::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['ns_category_tenant_id','ns_category_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $ns_category_tenant_id = null {
        get => $this->ns_category_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('ns_category_tenant_id', $value);
            $this->ns_category_tenant_id = $value;
        }
    }

    /**
     * Category #
     *
     *
     *
     * {domain{group_id_sequence}}
     *
     * @var int|null Domain: group_id_sequence Type: serial
     */
    public int|null $ns_category_id = null {
        get => $this->ns_category_id;
        set {
            $this->setFullPkAndFilledColumn('ns_category_id', $value);
            $this->ns_category_id = $value;
        }
    }

    /**
     * Name
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $ns_category_name = null {
        get => $this->ns_category_name;
        set {
            $this->setFullPkAndFilledColumn('ns_category_name', $value);
            $this->ns_category_name = $value;
        }
    }

    /**
     * Order
     *
     *
     *
     * {domain{order}}
     *
     * @var int|null Domain: order Type: integer
     */
    public int|null $ns_category_order = 0 {
        get => $this->ns_category_order;
        set {
            $this->setFullPkAndFilledColumn('ns_category_order', $value);
            $this->ns_category_order = $value;
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
    public int|null $ns_category_inactive = 0 {
        get => $this->ns_category_inactive;
        set {
            $this->setFullPkAndFilledColumn('ns_category_inactive', $value);
            $this->ns_category_inactive = $value;
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
    public string|null $ns_category_optimistic_lock = 'now()' {
        get => $this->ns_category_optimistic_lock;
        set {
            $this->setFullPkAndFilledColumn('ns_category_optimistic_lock', $value);
            $this->ns_category_optimistic_lock = $value;
        }
    }
}
