<?php

namespace WG\ActivityBundle\Controller;

use WG\ActivityBundle\Controller\AbstractController;

/**
 * 
 */
class RoadmapController extends AbstractController
{
    public function indexAction()
    {
        $em = $this->container->get( 'doctrine' )->getEntityManager();
        $projects = $em->getRepository( 'WGActivityBundle:Project' )->findAll();
        $selectedProject = $projects[0];
        return $this->container->get( 'templating' )->renderResponse(
            'WGActivityBundle:Roadmap:index.html.twig', array(
            'projects' => $projects,
            'selectedProject' => $selectedProject,
        ));
    }
}
