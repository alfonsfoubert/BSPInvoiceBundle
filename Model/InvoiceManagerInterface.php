<?php

namespace BSP\InvoiceBundle\Model;

use BSP\InvoiceBundle\Model\InvoiceInterface;

interface InvoiceManagerInterface
{
	function getClass();
	function createInvoice();
	function findInvoiceBy(array $criteria);
	function findInvoiceById( $id );
	function findInvoices();
	function updateInvoice( InvoiceInterface $invoice, $andFlush = true );
}