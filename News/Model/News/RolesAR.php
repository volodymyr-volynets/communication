<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Communication\News\Model\News;

use Object\ActiveRecord;

class RolesAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Roles::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['ns_nwsrol_tenant_id','ns_nwsrol_news_id','ns_nwsrol_role_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $ns_nwsrol_tenant_id = null {
        get => $this->ns_nwsrol_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('ns_nwsrol_tenant_id', $value);
            $this->ns_nwsrol_tenant_id = $value;
        }
    }

    /**
     * Timestamp
     *
     *
     *
     * {domain{timestamp_now}}
     *
     * @var string|null Domain: timestamp_now Type: timestamp
     */
    public string|null $ns_nwsrol_timestamp = 'now()' {
        get => $this->ns_nwsrol_timestamp;
        set {
            $this->setFullPkAndFilledColumn('ns_nwsrol_timestamp', $value);
            $this->ns_nwsrol_timestamp = $value;
        }
    }

    /**
     * News #
     *
     *
     *
     * {domain{group_id}}
     *
     * @var int|null Domain: group_id Type: integer
     */
    public int|null $ns_nwsrol_news_id = null {
        get => $this->ns_nwsrol_news_id;
        set {
            $this->setFullPkAndFilledColumn('ns_nwsrol_news_id', $value);
            $this->ns_nwsrol_news_id = $value;
        }
    }

    /**
     * Role #
     *
     *
     *
     * {domain{role_id}}
     *
     * @var int|null Domain: role_id Type: integer
     */
    public int|null $ns_nwsrol_role_id = null {
        get => $this->ns_nwsrol_role_id;
        set {
            $this->setFullPkAndFilledColumn('ns_nwsrol_role_id', $value);
            $this->ns_nwsrol_role_id = $value;
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
    public int|null $ns_nwsrol_inactive = 0 {
        get => $this->ns_nwsrol_inactive;
        set {
            $this->setFullPkAndFilledColumn('ns_nwsrol_inactive', $value);
            $this->ns_nwsrol_inactive = $value;
        }
    }
}
