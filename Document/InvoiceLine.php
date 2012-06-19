<?php

namespace BSP\InvoiceBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use BSP\InvoiceBundle\Model\InvoiceLine as BaseInvoiceLine;

/**
 * @MongoDB\EmbeddedDocument
 */
class InvoiceLine extends BaseInvoiceLine
{
	/**
	 * @MongoDB\Int
	 */
	protected $type;
	
	/**
	 * @MongoDB\String
	 */
	protected $reference;
	
	/**
	 * @MongoDB\String
	 */
	protected $description;
	
	/**
	 * @MongoDB\Int
	 */
	protected $quantity;
	
	/**
	 * @MongoDB\Float
	 */
	protected $amount;
	
	/**
	 * @MongoDB\Float
	 */
	protected $tax;
	
	/**
	 * @MongoDB\Float
	 */
	protected $totalTax;
	
	/**
	 * @MongoDB\Float
	 */
	protected $total;
	
	/**
	 * @MongoDB\Float
	 */
	protected $subtotal;
	
}