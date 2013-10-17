# BSPInvoiceBundle

This bundle provides an invoice base system for Symfony2. 

## Installation

Installation is a 3 step process:

1. Download BSPInvoiceBundle using composer
2. Enable the Bundle
3. Configure the bundle

### Step 1: Download BSPInvoiceBundle using composer

``` js
{
	"repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/D3r3ck/BSPInvoiceBundle"
        }
    ],
    "require": {
        "d3r3ck/bsp-invoice-bundle": "v1.0.*"
    }
}
```

Now tell composer to download the bundle by running the command:

``` bash
$ php composer.phar update d3r3ck/bsp-invoice-bundle
```

Composer will install the bundle to your project's `vendor/d3r3ck/bsp-invoice-bundle` directory.

### Step 2: Enable the bundle

Enable the bundle in the kernel:

``` php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new BSP\InvoiceBundle\BSPInvoiceBundle(),
    );
}
```
### Step 3: Configure the bundle

Add the following lines to your config.yml

``` yaml
# app/config/config.yml

bsp_invoice:
	db_driver: mongodb # Currently only works with mongodb, we are working on orm
```

And you are done!

## Basic Usage

This bundle works basically by an invoice manipulator:

``` php
$manipulator = $this->get('bsp_invoice.manipulator');
```

### Creating an invoice

In order to create an invoice you only have to do:

``` php
$myInvoice = $manipulator->createInvoice( $provider, $customer, 'I0001', 'EUR' );
```

An now you want to add some lines

``` php
use BSP\InvoiceBundle\Model\InvoiceLineInterface;

$manipulator->addLine( $myInvoice, InvoiceLineInterface::TYPE_PRODUCT, 'reference', 'My description', 1, 12.34 );
```

Supported invoice line types are:

* TYPE_PRODUCT
* TYPE_SERVICE
