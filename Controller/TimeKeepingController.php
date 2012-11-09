<?php

namespace WG\ActivityBundle\Controller;

use WG\ActivityBundle\Controller\AbstractController;

/**
 * 
 */
class TimeKeepingController extends AbstractController
{
    public function punchAction()
    {
        return $this->container->get( 'templating' )->renderResponse(
            'WGActivityBundle:TimeKeeping:punch.html.twig', array(
            'foo' => 'foo',
        ));
    }
}
