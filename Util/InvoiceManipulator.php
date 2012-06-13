<?php

namespace BSP\InvoiceBundle\Util;

class InvoiceManipulator
{
	protected $invoiceManager;
	
	public function __construct( $im )
	{
		$this->invoiceManager = $im;
	}
	
	public function createInvoice()
	{
		$invoice = $this->invoiceManager->createInvoice();
		$this->invoiceManager->updateInvoice( $invoice );
		return $invoice;
	}
	
	public function addLine( $invoice, $type, $reference, $description, $quantity, $amount, $total )
	{
		$invoice = $this->_getInvoice($invoice);
		$class   = $this->invoiceManager->getLineClass();
		$line    = new $class();
		$line->setType( $type );
		$line->setReference( $reference );
		$line->setDescription( $description );
		$line->setQuantity( $quantity );
		$line->setAmount( $amount );
		$line->setTotal( $total );
		$invoice->addLine( $line );
		$this->invoiceManager->updateInvoice( $invoice );
		return $invoice;
	}
	
	protected function _getInvoice( $invoice )
	{
		if ( is_string($invoice) )
		{
			$ninvoice = $this->invoiceManager->findInvoicetById( $invoice );
			if ( ! $ninvoice)
			{
				throw new \Exception( 'Invoice ' . $invoice . ' not found' );
			}
			return $ninvoice;
		}
		return $invoice;
	}
}