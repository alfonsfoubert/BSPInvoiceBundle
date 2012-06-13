<?php

namespace BSP\InvoiceBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use BSP\InvoiceBundle\Model\Customer as BaseCustomer;

/**
 * @MongoDB\Document(collection="customers")
 */
class Customer extends BaseCustomer
{
	/**
	 * @MongoDB\Id
	 */
	protected $id;
	
	/**
	 * @MongoDB\String
	 */
	protected $name;
	
	public function getId()
	{
		return $this->id;
	}
}
