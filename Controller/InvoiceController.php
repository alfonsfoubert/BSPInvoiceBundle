<?php

namespace BSP\InvoiceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InvoiceController extends Controller
{
	public function getPDFAction( $id )
	{
		$invoice = $this->get('bsp_invoice.invoice_manager')->findInvoiceById($id);
		$html = $this->renderView( 'BSPInvoiceBundle::invoice.html.twig', 
							array( 'invoice' => $invoice) );
		return new Response(
			$this->get('knp_snappy.pdf')->getOutputFromHtml($html),
			200,
			array(
				'Content-Type'          => 'application/pdf',
				'Content-Disposition'   => str_replace(' ', '_', sprintf('attachment;filename="Invoice_%s_%s_%s.pdf"', $invoice->getNumber(), $invoice->getDate()->format('Y'), $invoice->getCustomer()->getName()))
			)
		);
	}
	
	public function viewAction( $id )
	{
		$invoice = $this->get('bsp_invoice.invoice_manager')->findInvoiceById($id);
		return $this->render( 'BSPInvoiceBundle::invoice.html.twig', array('invoice' => $invoice) );
	}
}
