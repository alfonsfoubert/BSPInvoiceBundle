<?php

namespace BSP\InvoiceBundle\Model;

use BSP\InvoiceBundle\Model\BillingInfoInterface;

class BillingInfo implements BillingInfoInterface
{
    protected $name;
    protected $lines = array();

    public function getName()
    {
        return $this->name;
    }

    public function getLines()
    {
        return $this->lines;
    }

    public function setName( $name )
    {
        $this->name = $name;
    }

    public function setLines( $lines )
    {
        $this->lines = $lines;
    }

    public function addLine( $key, $value )
    {
        $this->lines[$key] = $value;
    }

    public function getLine( $key )
    {
        return $this->lines[$key];
    }
}
