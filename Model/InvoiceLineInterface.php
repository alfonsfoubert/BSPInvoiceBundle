<?php

namespace BSP\InvoiceBundle\Model;

interface InvoiceLineInterface
{
    const TYPE_PRODUCT = 1;
    const TYPE_SERVICE = 2;

    public function getType();
    public function setType($type);
    public function getReference();
    public function setReference($reference);
    public function getDescription();
    public function setDescription($description);
    public function getQuantity();
    public function setQuantity($quantity);
    public function getAmount();
    public function setAmount($amount);
    public function getTax();
    public function setTax($tax);
    public function getTotalTax();
    public function setTotalTax($totalTax);
    public function getTotal();
    public function setTotal($total);
    public function getSubtotal();
    public function setSubtotal($subtotal);
    public function getDiscount();
    public function setDiscount( $discount );
    public function getTotalDiscount();
    public function determineTotals();

}
