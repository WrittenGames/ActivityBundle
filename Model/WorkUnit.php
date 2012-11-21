<?php

namespace WG\ActivityBundle\Model;

use WG\ActivityBundle\Model\UserInterface;
use WG\ActivityBundle\Model\Activity;

class WorkUnit
{
    /**
     * @var mixed
     */
    protected $id;
    
    /**
     * @var \WG\ActivityBundle\Model\UserInterface
     */
    protected $user;
    
    /**
     * @var \WG\ActivityBundle\Model\Activity
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
     * @return \WG\ActivityBundle\Model\UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }
    
    /**
     * @param \WG\ActivityBundle\Model\UserInterface
     * @return \WG\ActivityBundle\Model\WorkWeek
     */
    public function setUser( UserInterface $user )
    {
        $this->user = $user;
        return $this;
    }
    
    /**
     * @return \WG\ActivityBundle\Model\Activity
     */
    public function getActivity()
    {
        return $this->activity;
    }
    
    /**
     * @param \WG\ActivityBundle\Model\Activity $activity
     * @return \WG\ActivityBundle\Model\WorkWeek
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
     * @return \WG\ActivityBundle\Model\WorkWeek
     */
    public function setTimeSpent( $timeSpent )
    {
        $this->timeSpent = $timeSpent;
        return $this;
    }
}
