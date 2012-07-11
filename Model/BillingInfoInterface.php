<?php

namespace BSP\InvoiceBundle\Model;

interface BillingInfoInterface
{
	function getName();
	function getLines();
	function setName( $name );
	function setLines( $lines );
	function addLine( $key, $value );
}