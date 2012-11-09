<?php

namespace WG\ActivityBundle\Time;

use WG\ActivityBundle\Model\Activity;
use Doctrine\Common\Persistence\ObjectManager;

class BusinessTime
{
    /**
     * Constants
     */
    const MINUTE = 'minute';
    const HOUR   = 'hour';
    const DAY    = 'day';
    const WEEK   = 'week';

    /**
     * Properties
     */
    protected $objectManager;
    
    /**
     * Constructor
     */
    public function __construct( ObjectManager $om )
    {
        $this->objectManager = $om;
    }

    /**
     * @return string
     */
    public function humaniseMinutes( Activity $activity, $timeInMinutes )
    {
        if ( null !== $timeInMinutes ) return '';
        $workWeek = $this->objectManager
                         ->getRepository( 'WGActivityBundle:WorkWeek' )
                         ->findOneByUser( $activity->getUser() );
        $workDays = $workWeek ? $workWeek->getDays() : 5;
        $workHours = $workWeek ? $workWeek->getHours() : 8;
        $hourInMinutes = 60;
        $dayInMinutes = $workHours * $hourInMinutes;
        $weekInMinutes = $workDays * $workHours * $hourInMinutes;
        $strParts = array();
        $weeks = floor( $timeInMinutes / $weekInMinutes );
        if ( $timeInMinutes > $weekInMinutes )
        {
            $strParts[] = $this->stringifyValue( $weeks, self::WEEK );
            $timeInMinutes -= $weeks * $weekInMinutes;
        }
        $days = floor( $timeInMinutes / $dayInMinutes );
        if ( $timeInMinutes > $dayInMinutes )
        {
            $strParts[] = $this->stringifyValue( $days, self::DAY );
            $timeInMinutes -= $days * $dayInMinutes;
        }
        $hours = floor( $timeInMinutes / $hourInMinutes );
        if ( $timeInMinutes > $hourInMinutes )
        {
            $strParts[] = $this->stringifyValue( $hours, self::HOUR );
            $timeInMinutes -= $hours * $hourInMinutes;
        }
        $strParts[] = $this->stringifyValue( $timeInMinutes, self::MINUTE );
        return $this->stringify( $strParts );
    }
    
    /**
     * @return string
     */
    protected function stringify( $parts )
    {
        if ( count( $parts ) > 1 )
        {
            $used = array();
            for ( $it = 0 ; $it < 2 ; $it++ )
            {
                $used[] = $parts[$it];
            }
            return join( ', ', $used );
        }
        return $parts[0];
    }
    
    /**
     * @return string
     */
    protected function stringifyValue( $value, $quantisation )
    {
        return $value . ' ' . $quantisation . ( $value > 1 ? 's' : '' );
    }
}
