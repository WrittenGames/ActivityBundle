<?php

namespace WG\ActivityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * 
 */
class ActivityController extends Controller
{
    public function indexAction( Request $request )
    {
        $em = $this->get( 'doctrine' )->getEntityManager();
        $activityRepo = $em->getRepository( 'WGActivityBundle:Activity' );
        return $this->render( 'WGActivityBundle:Activity:index.html.twig', array(
            'foo' => 'foo',
        ));
    }
}
