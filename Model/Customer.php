<?php

namespace BSP\InvoiceBundle\Model;

use BSP\InvoiceBundle\Model\Customer;

class Customer implements CustomerInterface
{
	protected $name;
	
	function getName()
	{
		return $this->name;
	}
	
	function setName( $name )
	{
		$this->name = $name;
	}
}