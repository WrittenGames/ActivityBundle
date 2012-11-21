<?php

namespace CiscoSystems\ActivityBundle\Model;

use Doctrine\Common\Persistence\ObjectManager;

/**
 * Instance manager class
 */
interface ManagerInterface
{
    /**
     * Returns the fully qualified class name for the managed entity
     *
     * @return string
     */
    public function getClass();
    
    /**
     * Returns an empty entity.
     *
     * @return object
     */
    public function create();
    
    /**
     * Saves an entity to the database
     * 
     * @param object $entity
     */
    public function save( $entity );
    
    /**
     * Removes an entity from the database
     * 
     * @param object $entity
     */
    public function delete( $entity );
    
    /**
     * Returns all entities
     * 
     * @return Collection
     */
    public function findAll();
    
    /**
     * Returns all entities fitting provided criteria
     * 
     * @return Collection
     */
    public function findBy( array $criteria = array() );
}
