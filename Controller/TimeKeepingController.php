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
        $currentUser = $this->container->get( 'wg.activity.context.user' );
        $currentUnit = $this->container->get( 'wg.activity.workunit_manager' )
                                        ->getCurrentlyTrackingUnit( $currentUser );
        return $this->container->get( 'templating' )->renderResponse(
            'WGActivityBundle:TimeKeeping:punch.html.twig', array(
            'currentUnit' => $currentUnit,
        ));
    }
}
