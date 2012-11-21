<?php

namespace CiscoSystems\ActivityBundle\Model;

use CiscoSystems\ActivityBundle\Model\Activity;
use CiscoSystems\ActivityBundle\Model\Milestone;
use CiscoSystems\ActivityBundle\Model\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;

class Project
{
    /**
     * @var mixed
     */
    protected $id;
    
    /**
     * @var string
     */
    protected $title;
    
    /**
     * @var string
     */
    protected $description;
    
    /**
     * @var string
     */
    protected $slug;
    
    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var Collection
     */
    protected $users;

    /**
     * @var Collection
     */
    protected $activities;

    /**
     * @var Collection
     */
    protected $milestones;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->milestones = new ArrayCollection();
        $this->activities = new ArrayCollection();
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
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * @param string $title
     * @return \CiscoSystems\ActivityBundle\Model\Project
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
     * @return \CiscoSystems\ActivityBundle\Model\Project
     */
    public function setDescription( $description )
    {
        $this->description = $description;
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
     * @return \CiscoSystems\ActivityBundle\Model\Project
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
     * @return \CiscoSystems\ActivityBundle\Model\Project
     */
    public function setCreatedAt( \DateTime $createdAt )
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getUsers()
    {
        return $this->users;   
    }

    /**
     * @param \CiscoSystems\ActivityBundle\Model\UserInterface $user
     * @return \CiscoSystems\ActivityBundle\Model\Project
     */
    public function addUser( UserInterface $user )
    {
        $this->users[] = $user;
        return $this;
    }

    /**
     * @param \CiscoSystems\ActivityBundle\Model\UserInterface $user
     * @return \CiscoSystems\ActivityBundle\Model\Project
     */
    public function removeUser( Milestone $user )
    {
        $this->users->removeElement( $user );
        return $this;
    }

    /**
     * @return Collection
     */
    public function getMilestones()
    {
        return $this->milestones;   
    }

    /**
     * @param \CiscoSystems\ActivityBundle\Model\Milestone $milestone
     * @return \CiscoSystems\ActivityBundle\Model\Project
     */
    public function addMilestone( Milestone $milestone )
    {
        $this->milestones[] = $milestone;
        return $this;
    }

    /**
     * @param \CiscoSystems\ActivityBundle\Model\Milestone $milestone
     * @return \CiscoSystems\ActivityBundle\Model\Project
     */
    public function removeMilestone( Milestone $milestone )
    {
        $this->milestones->removeElement( $milestone );
        return $this;
    }

    /**
     * @return Collection
     */
    public function getActivities()
    {
        return $this->activities;   
    }

    /**
     * @param \CiscoSystems\ActivityBundle\Model\Activity $activity
     * @return \CiscoSystems\ActivityBundle\Model\Project
     */
    public function addActivity( Activity $activity )
    {
        $this->activities[] = $activity;
        return $this;
    }

    /**
     * @param \CiscoSystems\ActivityBundle\Model\Activity $activity
     * @return \CiscoSystems\ActivityBundle\Model\Project
     */
    public function removeActivity( Activity $activity )
    {
        $this->activities->removeElement( $activity );
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
