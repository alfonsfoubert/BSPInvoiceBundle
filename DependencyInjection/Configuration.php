<?php

namespace BSP\InvoiceBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('bsp_invoice');
        
        $rootNode
	        ->children()
		        ->scalarNode('db_driver')
		        ->validate()
			        ->ifNotInArray(array('mongodb'))
			        ->thenInvalid('The %s driver is not supported')
		        ->end()
	        ->end()
        ->end();
        
        return $treeBuilder;
    }
}
