<?php

namespace WG\ActivityBundle\Controller;

use WG\ActivityBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Project CRUD
 */
class ProjectController extends AbstractController
{
    public function listAction()
    {
        if ( null !== $currentUser = $this->container->get( 'wg.activity.context.user' ))
        {
            $projects = $this->container
                             ->get( 'wg.activity.project_manager' )
                             ->findByUser( $currentUser );
        }
        else
        {
            $projects = $this->container->get( 'wg.activity.project_manager' )->findAll();
        }
        return $this->container->get( 'templating' )->renderResponse(
            'WGActivityBundle:Project:list.html.twig',
            array( 'projects' => $projects )
        );
    }
    
    public function newAction()
    {
        $form = $this->container->get( 'wg.activity.project.form' );
        $formHandler = $this->container->get( 'wg.activity.project.form.handler' );
        if ( $formHandler->process() )
        {
            $this->setFlash( 'wg_activity_success', 'Project created' );
            $url = $this->container->get( 'router' )->generate( 'wg_activity_projects' );
            return new RedirectResponse( $url );
        }
        return $this->container->get( 'templating' )->renderResponse(
            'WGActivityBundle:Project:new.html.twig',
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
