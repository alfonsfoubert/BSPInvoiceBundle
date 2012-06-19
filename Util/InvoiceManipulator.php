<?php

namespace BSP\InvoiceBundle\Util;

class InvoiceManipulator
{
	protected $invoiceManager;
	
	public function __construct( $im )
	{
		$this->invoiceManager = $im;
	}
	
	public function createInvoice( $ref, $currency, $customer )
	{
		$invoice = $this->invoiceManager->createInvoice();
		$invoice->setNumber( $ref );
		$invoice->setCurrency( $currency );
		$invoice->setCustomer( $customer );
		$this->invoiceManager->updateInvoice( $invoice );
		return $invoice;
	}
	
	public function addLine( $invoice, $type, $reference, $description, $quantity, $amount, $tax )
	{
		$invoice = $this->_getInvoice($invoice);
		$class   = $this->invoiceManager->getLineClass();
		$line    = new $class();
		$line->setType( $type );
		$line->setReference( $reference );
		$line->setDescription( $description );
		$line->setQuantity( $quantity );
		$line->setAmount( $amount );
		$line->setTax( $tax );
		$invoice->addLine( $line );
		$invoice->determineTotals();
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