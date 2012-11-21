<?php

namespace CiscoSystems\ActivityBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree.
     *
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root( 'cisco_systems_activity' );

        $supportedDrivers = array( 'orm', 'mongodb' );

        $rootNode
            ->children()
                ->scalarNode( 'db_driver' )
                    ->validate()
                        ->ifNotInArray( $supportedDrivers )
                        ->thenInvalid( 'The driver %s is not supported. Please choose one of ' . json_encode( $supportedDrivers ))
                    ->end()
                    ->cannotBeOverwritten()
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
