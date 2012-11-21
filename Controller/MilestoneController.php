<?php

namespace CiscoSystems\ActivityBundle\Controller;

use CiscoSystems\ActivityBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Milestone CRUD
 */
class MilestoneController extends AbstractController
{
    public function listAction()
    {
        $milestones = $this->container->get( 'cisco.activity.milestone_manager' )->findAll();
        return $this->container->get( 'templating' )->renderResponse(
            'CiscoSystemsActivityBundle:Milestone:list.html.twig',
            array( 'milestones' => $milestones )
        );
    }
    
    public function newAction()
    {
        $form = $this->container->get( 'cisco.activity.milestone.form' );
        $formHandler = $this->container->get( 'cisco.activity.milestone.form.handler' );
        if ( $formHandler->process() )
        {
            $this->setFlash( 'cisco_activity_success', 'Milestone created' );
            $url = $this->container->get( 'router' )->generate( 'cisco_activity_milestones' );
            return new RedirectResponse( $url );
        }
        return $this->container->get( 'templating' )->renderResponse(
            'CiscoSystemsActivityBundle:Milestone:new.html.twig',
            array( 'form' => $form->createView() )
        );
    }
    
    public function editAction( Request $request )
    {
    }
    
    public function deleteAction( Request $request )
    {
    }
}
