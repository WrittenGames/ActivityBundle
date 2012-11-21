<?php

namespace CiscoSystems\ActivityBundle\Controller;

use CiscoSystems\ActivityBundle\Controller\AbstractController;

/**
 * 
 */
class TimeKeepingController extends AbstractController
{
    public function punchAction()
    {
        $currentUser = $this->container->get( 'cisco.activity.context.user' );
        $currentUnit = $this->container->get( 'cisco.activity.workunit_manager' )
                                        ->getCurrentlyTrackingUnit( $currentUser );
        return $this->container->get( 'templating' )->renderResponse(
            'CiscoSystemsActivityBundle:TimeKeeping:punch.html.twig', array(
            'currentUnit' => $currentUnit,
        ));
    }
}
