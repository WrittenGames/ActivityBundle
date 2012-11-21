<?php

namespace CiscoSystems\ActivityBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;

/**
 * Abstract base controller class
 */
abstract class AbstractController extends ContainerAware
{
    public function setFlash( $key, $value )
    {
        $this->container->get( 'session' )->setFlash( $key, $value );
    }
}
