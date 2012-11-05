<?php

namespace WG\ActivityBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class WGActivityExtension extends Extension
{
    public function load( array $configs, ContainerBuilder $container )
    {
        // Configuration
        $configuration = new Configuration();
        $config = $this->processConfiguration( $configuration, $configs );
        // Services
        $loader = new YamlFileLoader( $container, new FileLocator( __DIR__ . '/../Resources/config' ) );
        $loader->load( 'milestone.yml' );
        $loader->load( sprintf('%s.yml', $config['db_driver'] ));
        // Set parameters
        $container->setParameter( 'wg_activity.db_driver', $config['db_driver'] );
    }
}
