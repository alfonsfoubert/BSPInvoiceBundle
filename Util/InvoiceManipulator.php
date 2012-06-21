<?php

namespace BSP\InvoiceBundle\Util;

use BSP\InvoiceBundle\Model\Invoiceable;

class InvoiceManipulator
{
	protected $invoiceManager;
	
	public function __construct( $im )
	{
		$this->invoiceManager = $im;
	}
	
	public function createInvoice( Invoiceable $provider, Invoiceable $customer, $ref, $currency )
	{
		$invoice = $this->invoiceManager->createInvoice();
		$invoice->setNumber( $ref );
		$invoice->setCurrency( $currency );
		$invoice->setProvider( $this->_getBillingInfo($provider) );
		$invoice->setCustomer( $this->_getBillingInfo($customer) );
		$this->invoiceManager->updateInvoice( $invoice );
		return $invoice;
	}
	
	public function addLine( $invoice, $type, $reference, $description, $quantity, $amount, $tax = 0, $discount = 0 )
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
		$line->setDiscount( $discount );
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
	
	protected function _getBillingInfo( Invoiceable $info )
	{
		$class = $this->invoiceManager->getBillingInfoClass();
		$billingInfo = new $class();
		$billingInfo->setName( $info->getInvoiceName() );
		$billingInfo->setLines( $info->getInvoiceLines() );
		return $billingInfo;
	}
}