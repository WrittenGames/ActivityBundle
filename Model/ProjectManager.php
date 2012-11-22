<?php

namespace CiscoSystems\ActivityBundle\Model;

use CiscoSystems\ActivityBundle\Model\UserInterface;
use CiscoSystems\ActivityBundle\Model\AbstractManager;

/**
 * Instance manager class
 */
class ProjectManager extends AbstractManager
{
    /**
     * Returns all Project entities for provided user
     * or all Projects entities if no user provided
     * 
     * @param \CiscoSystems\ActivityBundle\Model\UserInterface $user
     * @return Collection
     */
    public function findByUser( UserInterface $user = null )
    {
        if ( null === $user ) return $this->repository->findAll();
        $qb = $this->repository->createQueryBuilder( 'p' );
        $qb->join( 'p.users', 'u' );
        $qb->where( 'u.id = :uid' );
        $qb->setParameter( 'uid', $user );
        return $qb->getQuery()->getResult();
    }
}
