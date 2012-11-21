<?php

namespace CiscoSystems\ActivityBundle\Model;

use CiscoSystems\ActivityBundle\Model\UserInterface;
use CiscoSystems\ActivityBundle\Model\Activity;

class WorkUnit
{
    /**
     * @var mixed
     */
    protected $id;
    
    /**
     * @var \CiscoSystems\ActivityBundle\Model\UserInterface
     */
    protected $user;
    
    /**
     * @var \CiscoSystems\ActivityBundle\Model\Activity
     */
    protected $activity;
    
    /**
     * @var integer
     */
    protected $timeSpent;
    
    /**
     * @var boolean
     */
    protected $tracking;
    
    /**
     * @var \DateTime
     */
    protected $startedAt;
    
    /**
     * @var \DateTime
     */
    protected $stoppedAt;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->timeSpent = 0;
    }
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @return \CiscoSystems\ActivityBundle\Model\UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }
    
    /**
     * @param \CiscoSystems\ActivityBundle\Model\UserInterface
     * @return \CiscoSystems\ActivityBundle\Model\WorkWeek
     */
    public function setUser( UserInterface $user )
    {
        $this->user = $user;
        return $this;
    }
    
    /**
     * @return \CiscoSystems\ActivityBundle\Model\Activity
     */
    public function getActivity()
    {
        return $this->activity;
    }
    
    /**
     * @param \CiscoSystems\ActivityBundle\Model\Activity $activity
     * @return \CiscoSystems\ActivityBundle\Model\WorkWeek
     */
    public function setActivity( Activity $activity )
    {
        $this->activity = $activity;
        return $this;
    }
    
    /**
     * @return integer
     */
    public function getTimeSpent()
    {
        return $this->timeSpent;
    }
    
    /**
     * @param integer $timeSpent
     * @return \CiscoSystems\ActivityBundle\Model\WorkWeek
     */
    public function setTimeSpent( $timeSpent )
    {
        $this->timeSpent = $timeSpent;
        return $this;
    }
}
