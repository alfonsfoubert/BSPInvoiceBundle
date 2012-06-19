<?php

namespace BSP\InvoiceBundle\Document;

use BSP\InvoiceBundle\Model\InvoiceManager as BaseInvoiceManager;
use BSP\InvoiceBundle\Model\InvoiceInterface;

class InvoiceManager extends BaseInvoiceManager
{
	protected $dm;
	protected $repository;
	protected $class;
	protected $lineClass;
	protected $billingInfoClass;
	
	public function __construct( $dm, $invoiceClass, $lineClass, $billingInfoClass )
	{	
		$this->dm = $dm;
		$this->repository = $dm->getRepository($invoiceClass);
		$metadata = $dm->getClassMetadata($invoiceClass);
		$this->class = $metadata->name;
		$this->lineClass = $lineClass;
		$this->billingInfoClass = $billingInfoClass;
	}
	
	public function findInvoiceBy( array $criteria  )
	{
		return $this->repository->findOneBy($criteria);
	}
	
	public function getClass()
	{
		return $this->class;
	}
	
	public function getLineClass()
	{
		return $this->lineClass;
	}
	
	public function getBillingInfoClass()
	{
		return $this->billingInfoClass;
	}
	
	function findInvoices()
	{
		return $this->repository->findAll();
	}
	
	public function updateInvoice( InvoiceInterface $invoice, $andFlush = true )
	{
		$this->dm->persist($invoice);
		if ($andFlush) {
			$this->dm->flush();
		}
	}
	
}