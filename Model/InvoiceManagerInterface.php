<?php

namespace BSP\InvoiceBundle\Model;

use BSP\InvoiceBundle\Model\InvoiceInterface;

interface InvoiceManagerInterface
{
    public function getClass();
    public function createInvoice();
    public function findInvoiceBy(array $criteria);
    public function findInvoiceById( $id );
    public function findInvoices();
    public function updateInvoice( InvoiceInterface $invoice, $andFlush = true );
}
