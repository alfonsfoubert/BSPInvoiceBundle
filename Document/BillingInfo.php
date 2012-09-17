<?php

namespace BSP\InvoiceBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use BSP\InvoiceBundle\Model\BillingInfo as BaseBillingInfo;

/**
 * @MongoDB\EmbeddedDocument
 */
class BillingInfo extends BaseBillingInfo
{
    /**
     * @MongoDB\String
     */
    protected $name;

    /**
     * @MongoDB\Hash
     */
    protected $lines;
}
