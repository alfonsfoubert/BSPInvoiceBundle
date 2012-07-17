<?php

namespace BSP\InvoiceBundle\Model;

use BSP\InvoiceBundle\Model\InvoiceInterface;
use Doctrine\Common\Collections\ArrayCollection;

class Invoice implements InvoiceInterface
{
    protected $status;
    protected $lines;
    protected $updatedAt;
    protected $createdAt;
    protected $number;
    protected $customer;
    protected $provider;
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

    public function getProvider()
    {
        return $this->provider;
    }

    public function setProvider( $provider )
    {
        $this->provider = $provider;
    }

    public function getCustomer()
    {
        return $this->customer;
    }

    public function setCustomer( $customer )
    {
        $this->customer = $customer;
    }

    public function getNotes()
    {
        return $this->notes;
    }

    public function setNotes( $notes )
    {
        $this->notes = $notes;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate( $date )
    {
        $this->date = $date;
    }

    public function getSentAt()
    {
        return $this->sentAt;
    }

    public function setSentAt( $date )
    {
        $this->sentAt = $date;
    }

    public function getPayedAt()
    {
        return $this->payedAt;
    }

    public function setPayedAt( $date )
    {
        $this->payedAt = $date;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function setCurrency( $currency )
    {
        $this->currency = $currency;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function getSubTotal()
    {
        return $this->subtotal;
    }

    public function getTaxTotal()
    {
        return $this->totalTax;
    }

    public function setTotal( $total )
    {
        $this->total = $total;
    }

    public function setSubTotal( $subtotal )
    {
        $this->subtotal = $subtotal;
    }

    public function setTotalTax( $totalTax )
    {
        $this->totalTax = $totalTax;
    }

    public function setLines( $lines )
    {
        $this->lines = $lines;
    }

    public function getLines()
    {
        return $this->lines;
    }

    public function addLine( $line )
    {
        $this->lines[] = $line;
    }

    public function determineTotals()
    {
        $subtotal = 0;
        $total    = 0;
        $totalTax = 0;

        foreach ($this->getLines() as $line) {
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
