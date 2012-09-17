<?php

namespace BSP\InvoiceBundle\Model;

interface BillingInfoInterface
{
    public function getName();
    public function getLines();
    public function setName( $name );
    public function setLines( $lines );
    public function addLine( $key, $value );
}
