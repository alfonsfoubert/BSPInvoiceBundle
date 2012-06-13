<?php

namespace BSP\InvoiceBundle\Model;

use BSP\InvoiceBundle\Model\InvoiceManagerInterface;

abstract class InvoiceManager implements InvoiceManagerInterface
{
	public function createInvoice( )
	{
		$class = $this->getClass();
		$account = new $class();
		return $account;
	}
	
	public function findInvoiceById( $id )
	{
		return $this->findInvoiceBy( array( 'id' => $id ) );
	}
}