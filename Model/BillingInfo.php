<?php

namespace BSP\InvoiceBundle\Model;

use BSP\InvoiceBundle\Model\BillingInfoInterface;

class BillingInfo implements BillingInfoInterface
{
	protected $name;
	protected $lines = array();
	
	function getName()
	{
		return $this->name;
	}
	
	function getLines()
	{
		return $this->lines;
	}
	
	function setName( $name )
	{
		$this->name = $name;
	}
	
	function setLines( $lines )
	{
		$this->lines = $lines;
	}
	
	function addLine( $key, $value )
	{
		$this->lines[$key] = $value;
	}
	
	function getLine( $key )
	{
	    return $this->lines[$key];
	}
}