<?php

namespace WG\ActivityBundle\Model;

use WG\ActivityBundle\Model\ManagerInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Instance manager class
 */
class ActivityManager implements ManagerInterface
{
    protected $class;
    protected $objectManager;
    protected $repository;

    /**
     * Constructor
     * 
     * @param \Doctrine\Common\Persistence\ObjectManager $om
     * @param string $class
     */
    public function __construct( ObjectManager $om, $class )
    {
        $metadata = $om->getClassMetadata( $class );
        $this->class = $metadata->getName();
        $this->objectManager = $om;
        $this->repository = $om->getRepository( $class );
    }

    /**
     * Returns the fully qualified class name for the managed entity
     *
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }
    /**
     * Returns an empty entity.
     *
     * @return object
     */
    public function create()
    {
        $class = $this->getClass();
        return new $class();
    }
    
    /**
     * Saves an entity to the database
     * 
     * @param object $entity
     */
    public function save( $entity )
    {
        if ( null === $entity->getId() )
        {
            $this->objectManager->persist( $entity );
        }
        $this->objectManager->flush();
    }
    
    /**
     * Removes an entity from the database
     * 
     * @param object $entity
     */
    public function delete( $entity )
    {
        $this->objectManager->remove( $entity );
        $this->objectManager->flush();
    }
    
    /**
     * Returns all entities
     * 
     * @return Collection
     */
    public function findAll()
    {
        return $this->repository->findAll();
    }
    
    /**
     * Returns all entities fitting provided criteria
     * 
     * @return Collection
     */
    public function findBy( array $criteria = array() )
    {
        return $this->repository->findBy( $criteria );
    }
}
