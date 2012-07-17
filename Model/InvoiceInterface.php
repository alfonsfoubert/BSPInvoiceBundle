<?php

namespace BSP\InvoiceBundle\Model;

interface InvoiceInterface
{
    const INVOICE_STATUS_DRAFT = 1;
    const INVOICE_STATUS_SENT  = 2;
    const INVOICE_STATUS_PAID  = 3;

    public function getNumber();
    public function setNumber( $number );
    public function getStatus();
    public function setStatus( $status );
    public function incrementUpdatedAt();
    public function getCreatedAt();
    public function setCreatedAt( $createdAt );
    public function getNotes();
    public function setNotes( $notes );
    public function getDate();
    public function setDate( $date );
    public function getSentAt();
    public function setSentAt( $date );
    public function getPayedAt();
    public function setPayedAt( $date );
    public function getCurrency();
    public function setCurrency( $currency );
    public function determineTotals();
    public function getTotal();
    public function getSubTotal();
    public function getTaxTotal();
    public function setTotal( $total );
    public function setSubTotal( $subtotal );
    public function setTotalTax( $totalTax );
    public function getLines();
    public function addLine( $line );
    public function setLines( $lines );
    public function getProvider();
    public function setProvider( $provider );
    public function getCustomer();
    public function setCustomer( $customer );
}
