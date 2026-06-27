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

class OrganizationsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Organizations::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['ns_nwsorg_tenant_id','ns_nwsorg_news_id','ns_nwsorg_organization_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $ns_nwsorg_tenant_id = null {
        get => $this->ns_nwsorg_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('ns_nwsorg_tenant_id', $value);
            $this->ns_nwsorg_tenant_id = $value;
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
    public string|null $ns_nwsorg_timestamp = 'now()' {
        get => $this->ns_nwsorg_timestamp;
        set {
            $this->setFullPkAndFilledColumn('ns_nwsorg_timestamp', $value);
            $this->ns_nwsorg_timestamp = $value;
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
    public int|null $ns_nwsorg_news_id = null {
        get => $this->ns_nwsorg_news_id;
        set {
            $this->setFullPkAndFilledColumn('ns_nwsorg_news_id', $value);
            $this->ns_nwsorg_news_id = $value;
        }
    }

    /**
     * Organization #
     *
     *
     *
     * {domain{organization_id}}
     *
     * @var int|null Domain: organization_id Type: integer
     */
    public int|null $ns_nwsorg_organization_id = null {
        get => $this->ns_nwsorg_organization_id;
        set {
            $this->setFullPkAndFilledColumn('ns_nwsorg_organization_id', $value);
            $this->ns_nwsorg_organization_id = $value;
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
    public int|null $ns_nwsorg_inactive = 0 {
        get => $this->ns_nwsorg_inactive;
        set {
            $this->setFullPkAndFilledColumn('ns_nwsorg_inactive', $value);
            $this->ns_nwsorg_inactive = $value;
        }
    }
}
