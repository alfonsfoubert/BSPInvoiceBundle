<?php

namespace BSP\InvoiceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class InvoiceController extends Controller
{
	public function getPDFAction( $id )
	{
		$invoice = $this->get('bsp_invoice.invoice_manager')->findInvoiceById($id);

		if ( ! $invoice )
		{
			throw $this->createNotFoundException( 'Invoice ' . $id . ' not found' );
		}
		
		$html = $this->renderView( 'BSPInvoiceBundle:Invoice:invoice.html.twig', 
							array( 'invoice' => $invoice) );
		return new Response(
			$this->get('knp_snappy.pdf')->getOutputFromHtml($html),
			200,
			array(
				'Content-Type'          => 'application/pdf',
				'Content-Disposition'   => str_replace(' ', '_', sprintf('attachment;filename="Invoice_%s_%s_%s.pdf"', $invoice->getNumber(), $invoice->getDate()->format('Y'), $invoice->getCustomer()->getName()) )
			)
		);
	}
	
	public function viewAction( $id )
	{
		$invoice = $this->get('bsp_invoice.invoice_manager')->findInvoiceById($id);
		if ( ! $invoice )
		{
			throw $this->createNotFoundException( 'Invoice ' . $id . ' not found' );
		}
		/*
		$manipulator = $this->get( 'bsp_invoice.manipulator' );
		$securityContext = $this->get('security.context');
		
		$customer = $securityContext->getToken()->getUser();
		$provider = $customer->getStore();
		
		$invoice = $manipulator->createInvoice( $provider, $customer, 'BSPMOLA002', '€' );
		
		$invoice = $manipulator->addLine( $invoice, \BSP\InvoiceBundle\Model\InvoiceLineInterface::TYPE_PRODUCT, 'BOLD001', 'Peineta para calvos', 3, 19.95, 0.18 );
		$invoice = $manipulator->addLine( $invoice, \BSP\InvoiceBundle\Model\InvoiceLineInterface::TYPE_PRODUCT, 'BOLD002', 'Laca para calvos', 2, 4.95, 0.18 );
		*/
		
		return $this->render( 'BSPInvoiceBundle:Invoice:invoice.html.twig', array('invoice' => $invoice) );
	}
}
