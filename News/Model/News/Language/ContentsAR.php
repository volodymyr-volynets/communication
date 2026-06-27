<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Communication\News\Model\News\Language;

use Object\ActiveRecord;

class ContentsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Contents::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['ns_nwslngcon_tenant_id','ns_nwslngcon_news_id','ns_nwslngcon_language_code'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $ns_nwslngcon_tenant_id = null {
        get => $this->ns_nwslngcon_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('ns_nwslngcon_tenant_id', $value);
            $this->ns_nwslngcon_tenant_id = $value;
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
    public int|null $ns_nwslngcon_news_id = null {
        get => $this->ns_nwslngcon_news_id;
        set {
            $this->setFullPkAndFilledColumn('ns_nwslngcon_news_id', $value);
            $this->ns_nwslngcon_news_id = $value;
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
    public string|null $ns_nwslngcon_language_code = null {
        get => $this->ns_nwslngcon_language_code;
        set {
            $this->setFullPkAndFilledColumn('ns_nwslngcon_language_code', $value);
            $this->ns_nwslngcon_language_code = $value;
        }
    }

    /**
     * Content
     *
     *
     *
     * {domain{comment}}
     *
     * @var string|null Domain: comment Type: text
     */
    public string|null $ns_nwslngcon_content = null {
        get => $this->ns_nwslngcon_content;
        set {
            $this->setFullPkAndFilledColumn('ns_nwslngcon_content', $value);
            $this->ns_nwslngcon_content = $value;
        }
    }
}
