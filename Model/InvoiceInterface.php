<?php

namespace BSP\InvoiceBundle\Model;

use BSP\InvoiceBundle\Model\BillableInterface;

interface InvoiceInterface
{
	const INVOICE_STATUS_DRAFT = 1;
	const INVOICE_STATUS_SENT  = 2;
	const INVOICE_STATUS_PAID  = 3;
	
	function getNumber();
	function setNumber( $number );
	function getStatus();
	function setStatus( $status );
	function incrementUpdatedAt();
	function getCreatedAt();
	function setCreatedAt( $createdAt );
	function getNotes();
	function setNotes( $notes );
	function getDate();
	function setDate( $date );
	function getSentAt();
	function setSentAt( $date );
	function getPayedAt();
	function setPayedAt( $date );
	function getCurrency();
	function setCurrency( $currency );
	function determineTotals();
	function getTotal();
	function getSubTotal();
	function getTaxTotal();
	function setTotal( $total );
	function setSubTotal( $subtotal );
	function setTotalTax( $totalTax );
	function getLines();
	function addLine( $line );
	function setLines( $lines );
	function getProvider();	
	function setProvider( $provider );
	function getCustomer();
	function setCustomer( $customer );
}