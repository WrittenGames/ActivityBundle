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
        return $this->render( 'WGActivityBundle:Activity:index.html.twig', array(
            'foo' => 'foo',
        ));
    }
}
