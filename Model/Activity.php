<?php

namespace WG\ActivityBundle\Model;

use WG\ActivityBundle\DependencyInjection\User\ActivityUserInterface;
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
     * @var WG\ActivityBundle\Entity\Activity
     */
    protected $parent;

    /**
     * @var Collection
     */
    protected $children;
    
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
     * @return \WG\ActivityBundle\Model\ActivityUserInterface
     */
    public function getUser()
    {
        return $this->user;
    }
    
    /**
     * @param \WG\ActivityBundle\Model\ActivityUserInterface $user
     * @return \WG\ActivityBundle\Model\Activity
     */
    public function setUser( ActivityUserInterface $user )
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
     * @return \WG\ActivityBundle\Model\Activity
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
     * @return \WG\ActivityBundle\Model\Activity
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
     * @return \WG\ActivityBundle\Model\Activity
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
     * @return \WG\ActivityBundle\Model\Activity
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
     * @return \WG\ActivityBundle\Model\Activity
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
     * @return \WG\ActivityBundle\Model\Activity
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
     * @return \WG\ActivityBundle\Model\Activity
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
     * @return \WG\ActivityBundle\Model\Activity
     */
    public function setCompletedAt( $completedAt )
    {
        $this->completedAt = $completedAt;
        return $this;
    }

    /**
     * @return \WG\ActivityBundle\Model\Activity $parent
     */
    public function getParent()
    {
        return $this->parent;   
    }

    /**
     * @param \WG\ActivityBundle\Model\Activity $parent
     * @return \WG\ActivityBundle\Model\Activity
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
}
