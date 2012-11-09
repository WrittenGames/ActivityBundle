<?php

namespace WG\ActivityBundle\Controller;

use WG\ActivityBundle\Controller\AbstractController;

/**
 * 
 */
class ActivityController extends AbstractController
{
    public function indexAction( Request $request )
    {
        $em = $this->container->get( 'doctrine' )->getEntityManager();
        $activityRepo = $em->getRepository( 'WGActivityBundle:Activity' );
        return $this->container->get( 'templating' )->renderResponse(
            'WGActivityBundle:Activity:index.html.twig', array(
            'foo' => 'foo',
        ));
    }
}
