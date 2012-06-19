<?php

namespace BSP\InvoiceBundle\Model;

use BSP\InvoiceBundle\Model\BillingInfoInterface;
use Doctrine\Common\Collections\ArrayCollection;

class BillingInfo implements BillingInfoInterface
{
	protected $name;
	protected $lines;
	
	public function __construct()
	{
		$this->lines = new ArrayCollection();
	}
	
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
	
	function addLine( $line )
	{
		$this->lines[] = $line;
	}
}