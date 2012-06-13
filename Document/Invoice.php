<?php

namespace BSP\InvoiceBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use BSP\InvoiceBundle\Model\Invoice as BaseInvoice;

class Invoice extends BaseInvoice
{
	/**
	 * @MongoDB\Id
	 */
	protected $id;
	
	/**
	 * @MongoDB\Int
	 */
	protected $status;
	
	/**
	 * @MongoDB\EmbedMany(targetDocument="BSP\InvoiceBundle\Document\InvoiceLine")
	 */
	protected $lines;
	
	/**
	 * @MongoDB\Date
	 */
	protected $updatedAt;
	
	/**
	 * @MongoDB\Date
	 */
	protected $createdAt;
	
	/**
	 * @MongoDB\String
	 */
	protected $number;
	
	/**
	 * @MongoDB\String
	 */
	protected $customer;
	
	/**
	 * @MongoDB\String
	 */
	protected $notes;
	
	/**
	 * @MongoDB\Date
	 */
	protected $date;
	
	/**
	 * @MongoDB\Date
	 */
	protected $sentAt;
	
	/**
	 * @MongoDB\Date
	 */
	protected $payedAt;
	
	public function getId()
	{
		return $this->id;
	}
}