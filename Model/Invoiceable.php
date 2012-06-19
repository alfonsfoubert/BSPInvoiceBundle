<?php

namespace BSP\InvoiceBundle\Model;

interface Invoiceable
{
	function getInvoiceName();
	function getInvoiceLines();
}