<?php

namespace CiscoSystems\ActivityBundle\Controller;

use CiscoSystems\ActivityBundle\Controller\AbstractController;

/**
 * 
 */
class ActivityController extends AbstractController
{
    public function indexAction( Request $request )
    {
        $em = $this->container->get( 'doctrine' )->getEntityManager();
        $activityRepo = $em->getRepository( 'CiscoSystemsActivityBundle:Activity' );
        return $this->container->get( 'templating' )->renderResponse(
            'CiscoSystemsActivityBundle:Activity:index.html.twig', array(
            'foo' => 'foo',
        ));
    }
}
