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
        $em = $this->getDoctrine()->getEntityManager();
        $metadata = $em->getClassMetadata( 'WGActivityBundle:Activity' );
        $mapping = $metadata->getAssociationMapping( 'user' );
        // change class name in $mapping
        // ...
        $metadata->setAssociationOverride( 'user', $mapping );
    }
}
