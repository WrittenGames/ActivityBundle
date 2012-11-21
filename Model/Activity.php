<?php

namespace CiscoSystems\ActivityBundle\Model;

use CiscoSystems\ActivityBundle\Model\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Storage agnostic Activity object
 */
abstract class Activity
{
    const PRIORITY_NONE = 0;
    const PRIORITY_LOW = 1;
    const PRIORITY_MEDIUM = 2;
    const PRIORITY_HIGH = 3;
    const PRIORITY_URGENT = 4;
    
    const EFFORT_LOW = 0;
    const EFFORT_HIGH = 1;
    
    const IMPACT_LOW = 0;
    const IMPACT_HIGH = 1;
    
    /**
     * @var mixed
     */
    protected $id;
    
    /**
     * @var object
     */
    protected $project;
    
    /**
     * @var object
     */
    protected $user;
    
    /**
     * @var string
     */
    protected $title;
    
    /**
     * @var string
     */
    protected $description;
    
    /**
     * @var integer
     */
    protected $priority;
    
    /**
     * @var integer
     * 
     * Time is stored in minutes
     */
    protected $timeEstimated;
    
    /**
     * @var integer
     * 
     * Time is stored in minutes
     */
    protected $timeSpent;
    
    /**
     * @var string
     */
    protected $slug;
    
    /**
     * @var \DateTime
     */
    protected $createdAt;
    
    /**
     * @var \DateTime
     */
    protected $updatedAt;
    
    /**
     * @var \DateTime
     */
    protected $completedAt;

    /**
     * @var integer
     */
    protected $lft;

    /**
     * @var integer
     */
    protected $lvl;

    /**
     * @var integer
     */
    protected $rgt;

    /**
     * @var integer
     */
    protected $root;

    /**
     * @var CiscoSystems\ActivityBundle\Entity\Activity
     */
    protected $parent;

    /**
     * @var Collection
     */
    protected $children;

    /**
     * @var CiscoSystems\ActivityBundle\Entity\Milestone
     */
    protected $milestone;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->children = new ArrayCollection();
    }

    /**
     * 
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
     * @param \CiscoSystems\ActivityBundle\Model\UserInterface $user
     * @return \CiscoSystems\ActivityBundle\Model\Activity
     */
    public function setUser( UserInterface $user )
    {
        $this->user = $user;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * @param string $title
     * @return \CiscoSystems\ActivityBundle\Model\Activity
     */
    public function setTitle( $title )
    {
        $this->title = $title;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * @param string $description
     * @return \CiscoSystems\ActivityBundle\Model\Activity
     */
    public function setDescription( $description )
    {
        $this->description = $description;
        return $this;
    }
    
    /**
     * @return integer
     */
    public function getTimeEstimated()
    {
        return $this->timeEstimated;
    }
    
    /**
     * @param integer $timeEstimated
     * @return \CiscoSystems\ActivityBundle\Model\Activity
     */
    public function setTimeEstimated( $timeEstimated )
    {
        $this->timeEstimated = $timeEstimated;
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
     * @return \CiscoSystems\ActivityBundle\Model\Activity
     */
    public function setTimeSpent( $timeSpent )
    {
        $this->timeSpent = $timeSpent;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
    
    /**
     * @param string $slug
     * @return \CiscoSystems\ActivityBundle\Model\Activity
     */
    public function setSlug( $slug )
    {
        $this->slug = $slug;
        return $this;
    }
    
    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    
    /**
     * @param \DateTime $createdAt
     * @return \CiscoSystems\ActivityBundle\Model\Activity
     */
    public function setCreatedAt( $createdAt )
    {
        $this->createdAt = $createdAt;
        return $this;
    }
    
    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
    
    /**
     * @param \DateTime $updatedAt
     * @return \CiscoSystems\ActivityBundle\Model\Activity
     */
    public function setUpdatedAt( $updatedAt )
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
    
    /**
     * @return \DateTime
     */
    public function getCompletedAt()
    {
        return $this->completedAt;
    }
    
    /**
     * @param \DateTime $completedAt
     * @return \CiscoSystems\ActivityBundle\Model\Activity
     */
    public function setCompletedAt( $completedAt )
    {
        $this->completedAt = $completedAt;
        return $this;
    }

    /**
     * @return \CiscoSystems\ActivityBundle\Model\Activity $parent
     */
    public function getParent()
    {
        return $this->parent;   
    }

    /**
     * @param \CiscoSystems\ActivityBundle\Model\Activity $parent
     * @return \CiscoSystems\ActivityBundle\Model\Activity
     */
    public function setParent( Activity $parent = null )
    {
        $this->parent = $parent; 
        return $this;   
    }
    
    /**
     * String representation
     * 
     * @return string
     */
    public function __toString()
    {
        return $this->title;
    }
    
    /**
     * @return \CiscoSystems\ActivityBundle\Model\Project
     */
    public function getProject()
    {
        return $this->project;
    }
    
    /**
     * @param \CiscoSystems\ActivityBundle\Model\Project $project
     * @return \CiscoSystems\ActivityBundle\Model\Activity
     */
    public function setProject( Project $project )
    {
        $this->project = $project;
        return $this;
    }
    
    /**
     * @return \CiscoSystems\ActivityBundle\Model\Milestone
     */
    public function getMilestone()
    {
        return $this->milestone;
    }
    
    /**
     * @param \CiscoSystems\ActivityBundle\Model\Milestone $milestone
     * @return \CiscoSystems\ActivityBundle\Model\Activity
     */
    public function setMilestone( Milestone $milestone )
    {
        $this->milestone = $milestone;
        return $this;
    }
}
