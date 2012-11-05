<?php

namespace WG\ActivityBundle\Controller;

use WG\ActivityBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Milestone CRUD
 */
class MilestoneController extends AbstractController
{
    public function listAction()
    {
        $milestones = $this->container->get( 'wg.activity.milestone_manager' )->findAll();
        return $this->container->get( 'templating' )->renderResponse(
            'WGActivityBundle:Milestone:list.html.twig',
            array( 'milestones' => $milestones )
        );
    }
    
    public function newAction()
    {
        $form = $this->container->get( 'wg.activity.milestone.form' );
        $formHandler = $this->container->get( 'wg.activity.milestone.form.handler' );
        if ( $formHandler->process() )
        {
            $this->setFlash( 'wg_activity_success', 'Milestone created' );
            $url = $this->container->get( 'router' )->generate( 'wg_activity_milestones' );
            return new RedirectResponse( $url );
        }
        return $this->container->get( 'templating' )->renderResponse(
            'WGActivityBundle:Milestone:new.html.twig',
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
