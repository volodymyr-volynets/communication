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

class UsersAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Users::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['ns_nwsusr_tenant_id','ns_nwsusr_news_id','ns_nwsusr_user_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $ns_nwsusr_tenant_id = null {
        get => $this->ns_nwsusr_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('ns_nwsusr_tenant_id', $value);
            $this->ns_nwsusr_tenant_id = $value;
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
    public int|null $ns_nwsusr_news_id = null {
        get => $this->ns_nwsusr_news_id;
        set {
            $this->setFullPkAndFilledColumn('ns_nwsusr_news_id', $value);
            $this->ns_nwsusr_news_id = $value;
        }
    }

    /**
     * User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $ns_nwsusr_user_id = null {
        get => $this->ns_nwsusr_user_id;
        set {
            $this->setFullPkAndFilledColumn('ns_nwsusr_user_id', $value);
            $this->ns_nwsusr_user_id = $value;
        }
    }
}
