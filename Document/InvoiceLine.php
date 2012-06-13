<?php

namespace BSP\InvoiceBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use BSP\InvoiceBundle\Model\InvoiceLine as BaseInvoiceLine;

/**
 * @MongoDB\EmbeddedDocument
 */
class InvoiceLine extends BaseInvoiceLine
{
	
}