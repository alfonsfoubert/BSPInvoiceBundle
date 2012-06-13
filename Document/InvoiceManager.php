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
	
	public function __construct( $dm, $invoiceClass, $lineClass )
	{	
		$this->dm = $dm;
		$this->repository = $dm->getRepository($invoiceClass);
		$metadata = $dm->getClassMetadata($invoiceClass);
		$this->class = $metadata->name;
		$this->lineClass = $lineClass;
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