<?php

namespace CiscoSystems\ActivityBundle\Model;

use CiscoSystems\ActivityBundle\Model\UserInterface;

class WorkWeek
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
     * @var integer
     */
    protected $hours;
    
    /**
     * @var integer
     */
    protected $days;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->hours = 8;
        $this->days = 5;
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
     * @return integer
     */
    public function getHours()
    {
        return $this->hours;
    }
    
    /**
     * @param integer $hours
     * @return \CiscoSystems\ActivityBundle\Model\WorkWeek
     */
    public function setHours( $hours )
    {
        $this->hours = $hours;
        return $this;
    }
    
    /**
     * @return integer
     */
    public function getDays()
    {
        return $this->days;
    }
    
    /**
     * @param integer $days
     * @return \CiscoSystems\ActivityBundle\Model\WorkWeek
     */
    public function setDays( $days )
    {
        $this->days = $days;
        return $this;
    }
}
