<?php

namespace CiscoSystems\ActivityBundle\Controller;

use CiscoSystems\ActivityBundle\Controller\AbstractController;

/**
 * 
 */
class RoadmapController extends AbstractController
{
    public function indexAction()
    {
        $em = $this->container->get( 'doctrine' )->getEntityManager();
        $projects = $em->getRepository( 'CiscoSystemsActivityBundle:Project' )->findAll();
        return $this->container->get( 'templating' )->renderResponse(
            'CiscoSystemsActivityBundle:Roadmap:index.html.twig', array(
            'projects' => $projects,
            'selectedProject' => count( $projects ) > 0 ? $projects[0] : false,
        ));
    }
}
