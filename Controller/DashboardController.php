<?php

namespace WG\ActivityBundle\Controller;

use WG\ActivityBundle\Controller\AbstractController;

/**
 * 
 */
class DashboardController extends AbstractController
{
    public function indexAction()
    {
        return $this->container->get( 'templating' )->renderResponse(
            'WGActivityBundle:Dashboard:index.html.twig', array(
        ));
    }
    
    public function eventsAction()
    {
        // get created, updated or completed activities
        // get times punched in for activities
        // get created and expired milestones
        $events = array(
            array( 'user' => 'Bob', 'event' => 'created activity', 'entity' => 'Foo' ),
            array( 'user' => 'Alice', 'event' => 'completed activity', 'entity' => 'Baa' ),
            array( 'event' => 'Milestone expired:', 'entity' => 'Meep' ),
            array( 'user' => 'Claire', 'event' => 'worked 5 hours on activity', 'entity' => 'Foo Baa' ),
        );
        return $this->container->get( 'templating' )->renderResponse(
            'WGActivityBundle:Dashboard:events.html.twig', array(
            'events' => $events,
        ));
    }
}
