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
				'Content-Disposition'   => str_replace(' ', '_', 'My_Invoice')
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
		
		return $this->render( 'BSPInvoiceBundle:Invoice:invoice.html.twig', array('invoice' => $invoice) );
	}
}
