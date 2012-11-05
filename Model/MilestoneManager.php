<?php

namespace WG\ActivityBundle\Model;

use WG\ActivityBundle\Model\Milestone;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * 
 */
class MilestoneManager
{
    protected $class;
    protected $objectManager;
    protected $repository;

    public function __construct( ObjectManager $om, $class )
    {
        $metadata = $om->getClassMetadata( $class );
        $this->class = $metadata->getName();
        $this->objectManager = $om;
        $this->repository = $om->getRepository( $class );
    }
    
    /**
     * Returns an empty Milestone instance.
     *
     * @return WG\ActivityBundle\Model\Milestone
     */
    public function createMilestone()
    {
        $class = $this->getClass();
        return new $class();
    }
    
    public function updateMilestone( Milestone $milestone )
    {
        if ( null === $milestone->getId() )
        {
            $this->objectManager->persist( $milestone );
        }
        $this->objectManager->flush();
    }
    
    public function findAll()
    {
        return $this->repository->findAll();
    }

    /**
     * Returns the group's fully qualified class name.
     *
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }
}
