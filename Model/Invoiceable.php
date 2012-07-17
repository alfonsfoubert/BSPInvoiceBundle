<?php

namespace BSP\InvoiceBundle\Model;

interface Invoiceable
{
    public function getInvoiceName();
    public function getInvoiceLines();
}
