<?php

namespace CiscoSystems\ActivityBundle\Model;

use CiscoSystems\ActivityBundle\Model\AbstractManager;
use CiscoSystems\ActivityBundle\Model\UserInterface;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\NonUniqueResultException;

/**
 * Instance manager class
 */
class WorkUnitManager extends AbstractManager
{
    /**
     * 
     */
    public function getCurrentlyTrackingUnit( UserInterface $user = null )
    {
        if ( null === $user ) return null;
        $qb = $this->repository->createQueryBuilder( 'u' );
        $qb->where( 'u.user = :user' );
        $qb->setParameter( 'user', $user );
        $qb->andWhere( 'u.tracking = :tracking' );
        $qb->setParameter( 'tracking', true );
        $qb->orderBy( 'u.startedAt', 'DESC' );
        $query = $qb->getQuery();
        try
        {
            return $query->getSingleResult();
        }
        catch( NoResultException $e ) { return null; }
        catch( NonUniqueResultException $e )
        {
            $multipleResults = $query->execute();
            return $multipleResults[0];
        }
        return null;
    }
}
