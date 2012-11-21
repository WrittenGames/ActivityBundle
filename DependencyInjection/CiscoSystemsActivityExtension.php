<?php

namespace CiscoSystems\ActivityBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class CiscoSystemsActivityExtension extends Extension
{
    public function load( array $configs, ContainerBuilder $container )
    {
        // Configuration
        $configuration = new Configuration();
        $config = $this->processConfiguration( $configuration, $configs );
        // Services
        $loader = new YamlFileLoader( $container, new FileLocator( __DIR__ . '/../Resources/config' ));
        $loader->load( sprintf( 'storage/%s.yml', $config['db_driver'] ));
        $loader->load( 'form/milestone.yml' );
        $loader->load( 'form/project.yml' );
        $loader->load( 'services.yml' );
        // Set parameters
        $container->setParameter( 'cisco_activity.db_driver', $config['db_driver'] );
    }
}
