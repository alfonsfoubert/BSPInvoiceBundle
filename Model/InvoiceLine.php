<?php

namespace BSP\InvoiceBundle\Model;

use BSP\InvoiceBundle\Model\InvoiceLineInterface;

class InvoiceLine implements InvoiceLineInterface 
{
	protected $type;
	protected $reference;
	protected $description;
	protected $quantity;
	protected $amount;
	protected $tax;
	protected $discount;

	protected $totalTax;
	protected $total;
	protected $subtotal;
	protected $totalDiscount;

	public function getType() {
		return $this->type;
	}

	public function setType($type) {
		$this->type = $type;
	}

	public function getReference() {
		return $this->reference;
	}

	public function setReference($reference) {
		$this->reference = $reference;
	}

	public function getDescription() {
		return $this->description;
	}

	public function setDescription($description) {
		$this->description = $description;
	}

	public function getQuantity() {
		return $this->quantity;
	}

	public function setQuantity($quantity) {
		$this->quantity = $quantity;
	}

	public function getAmount() {
		return $this->amount;
	}

	public function setAmount($amount) {
		$this->amount = $amount;
	}

	public function getTax() {
		return $this->tax;
	}

	public function setTax($tax) {
		$this->tax = $tax;
	}

	public function getTotalTax() {
		return $this->totalTax;
	}

	public function setTotalTax($totalTax) {
		$this->totalTax = $totalTax;
	}

	public function getTotal() {
		return $this->total;
	}

	public function setTotal($total) {
		$this->total = $total;
	}

	public function getSubtotal() {
		return $this->subtotal;
	}

	public function setSubtotal($subtotal) {
		$this->subtotal = $subtotal;
	}

	public function getDiscount()
	{
		return $this->discount;
	}
	
	public function setDiscount( $discount )
	{
		$this->discount = $discount;
	}
	
	public function setTotalDiscount( $totalDiscount )
	{
		$this->totalDiscount = $totalDiscount;
	}
	
	public function getTotalDiscount()
	{
		return $this->totalDiscount;
	}
	
	public function determineTotals()
	{
		$this->setTotalDiscount( $this->getAmount() * $this->getDiscount() );
		$this->setSubtotal( ($this->getAmount() - $this->getTotalDiscount()) * $this->getQuantity() );
		$this->setTotalTax( $this->getSubtotal() * $this->getTax() );
		$this->setTotal( $this->getSubtotal() + $this->getTotalTax() );
	}
	
}
