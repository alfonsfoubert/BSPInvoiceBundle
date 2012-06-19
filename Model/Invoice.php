<?php

namespace BSP\InvoiceBundle\Model;

use BSP\InvoiceBundle\Model\InvoiceInterface;
use BSP\InvoiceBundle\Model\BillableInterface;
use Doctrine\Common\Collections\ArrayCollection;

class Invoice implements InvoiceInterface
{
	protected $status;
	protected $lines;
	protected $updatedAt;
	protected $createdAt;
	protected $number;
	protected $customer;
	protected $notes;
	protected $date;
	protected $sentAt;
	protected $payedAt;
	protected $currency;
	
	protected $subtotal;
	protected $total;
	protected $totalTax;
	
	public function __construct()
	{
		$this->lines     = new ArrayCollection();
		$this->status    = self::INVOICE_STATUS_DRAFT;
		$this->createdAt = new \DateTime();
	}
	
	public function getStatus()
	{
		return $this->status;
	}
	
	public function setStatus( $status )
	{
		$thiss->status = $status;
	}
	
	public function getCreatedAt()
	{
		return $this->createdAt;
	}
	
	public function setCreatedAt( $createdAt )
	{
		$this->createdAt = $createdAt;
	}
	
	public function incrementUpdatedAt()
	{
		$this->updatedAt = new \DateTime();
	}
	
	public function getNumber()
	{
		return $this->number;
	}
	
	public function setNumber( $number )
	{
		$this->number = $number;
	}
	
	function getCustomer()
	{
		return $this->billingInfo;
	}
	
	function setCustomer( $billingInfo )
	{
		$this->billingInfo = $billingInfo;
	}	
	
	function getNotes()
	{
		return $this->notes;
	}
	
	function setNotes( $notes )
	{
		$this->notes = $notes;
	}
	
	function getDate()
	{
		return $this->date;
	}
	
	function setDate( $date )
	{
		$this->date = $date;
	}
	
	function getSentAt()
	{
		return $this->sentAt;
	}
	
	function setSentAt( $date )
	{
		$this->sentAt = $date;
	}
	
	function getPayedAt()
	{
		return $this->payedAt;
	}
	
	function setPayedAt( $date )
	{
		$this->payedAt = $date;
	}
	
	function getCurrency()
	{
		return $this->currency;
	}
	
	function setCurrency( $currency )
	{
		$this->currency = $currency;
	}
	
	function getTotal()
	{
		return $this->total;
	}
	
	function getSubTotal()
	{
		return $this->subtotal;
	}
	
	function getTaxTotal()
	{
		return $this->totalTax;
	}
	
	function setTotal( $total )
	{
		$this->total = $total;
	}
	
	function setSubTotal( $subtotal )
	{
		$this->subtotal = $subtotal;
	}
	
	function setTotalTax( $totalTax )
	{
		$this->totalTax = $totalTax;
	}
	
	function setLines( $lines )
	{
		$this->lines = $lines;
	}
	
	function getLines()
	{
		return $this->lines;
	}
	
	function addLine( $line )
	{
		$this->lines[] = $line;
	}
	
	function determineTotals()
	{
		$subtotal = 0;
		$total    = 0;
		$totalTax = 0;
		
		foreach ($this->getLines() as $line)
		{
			$line->determineTotals();
			$subtotal += $line->getSubtotal();
			$total    += $line->getTotal();
			$totalTax += $line->getTotalTax();
		}
		
		$this->setSubTotal( $subtotal );
		$this->setTotalTax( $totalTax );
		$this->setTotal( $total );
	}
}