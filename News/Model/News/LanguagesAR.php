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

class LanguagesAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Languages::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['ns_nwslang_tenant_id','ns_nwslang_news_id','ns_nwslang_language_code'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $ns_nwslang_tenant_id = null {
        get => $this->ns_nwslang_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('ns_nwslang_tenant_id', $value);
            $this->ns_nwslang_tenant_id = $value;
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
    public string|null $ns_nwslang_timestamp = 'now()' {
        get => $this->ns_nwslang_timestamp;
        set {
            $this->setFullPkAndFilledColumn('ns_nwslang_timestamp', $value);
            $this->ns_nwslang_timestamp = $value;
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
    public int|null $ns_nwslang_news_id = null {
        get => $this->ns_nwslang_news_id;
        set {
            $this->setFullPkAndFilledColumn('ns_nwslang_news_id', $value);
            $this->ns_nwslang_news_id = $value;
        }
    }

    /**
     * Language Code
     *
     *
     *
     * {domain{language_code}}
     *
     * @var string|null Domain: language_code Type: char
     */
    public string|null $ns_nwslang_language_code = null {
        get => $this->ns_nwslang_language_code;
        set {
            $this->setFullPkAndFilledColumn('ns_nwslang_language_code', $value);
            $this->ns_nwslang_language_code = $value;
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
    public string|null $ns_nwslang_title = null {
        get => $this->ns_nwslang_title;
        set {
            $this->setFullPkAndFilledColumn('ns_nwslang_title', $value);
            $this->ns_nwslang_title = $value;
        }
    }

    /**
     * Primary
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $ns_nwslang_primary = 0 {
        get => $this->ns_nwslang_primary;
        set {
            $this->setFullPkAndFilledColumn('ns_nwslang_primary', $value);
            $this->ns_nwslang_primary = $value;
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
    public int|null $ns_nwslang_inactive = 0 {
        get => $this->ns_nwslang_inactive;
        set {
            $this->setFullPkAndFilledColumn('ns_nwslang_inactive', $value);
            $this->ns_nwslang_inactive = $value;
        }
    }
}
