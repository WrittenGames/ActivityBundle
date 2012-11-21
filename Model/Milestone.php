<?php

namespace CiscoSystems\ActivityBundle\Model;

use CiscoSystems\ActivityBundle\Model\Project;
use Doctrine\Common\Collections\ArrayCollection;

class Milestone
{
    /**
     * @var mixed
     */
    protected $id;
    
    /**
     * @var object
     */
    protected $project;
    
    /**
     * @var string
     */
    protected $title;
    
    /**
     * @var string
     */
    protected $slug;
    
    /**
     * @var \DateTime
     */
    protected $dueBy;
    
    /**
     * @var \DateTime
     */
    protected $createdAt;

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
     * @var CiscoSystems\ActivityBundle\Entity\Milestone
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
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * @param string $title
     * @return \CiscoSystems\ActivityBundle\Model\Milestone
     */
    public function setTitle( $title )
    {
        $this->title = $title;
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
     * @return \CiscoSystems\ActivityBundle\Model\Milestone
     */
    public function setSlug( $slug )
    {
        $this->slug = $slug;
        return $this;
    }
    
    /**
     * @return \DateTime
     */
    public function getDueBy()
    {
        return $this->dueBy;
    }
    
    /**
     * @param \DateTime $dueBy
     * @return \CiscoSystems\ActivityBundle\Model\Milestone
     */
    public function setDueBy( \DateTime $dueBy )
    {
        $this->dueBy = $dueBy;
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
     * @return \CiscoSystems\ActivityBundle\Model\Milestone
     */
    public function setCreatedAt( \DateTime $createdAt )
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return \CiscoSystems\ActivityBundle\Model\Milestone
     */
    public function getParent()
    {
        return $this->parent;   
    }

    /**
     * @param \CiscoSystems\ActivityBundle\Model\Milestone $parent
     * @return \CiscoSystems\ActivityBundle\Model\Milestone
     */
    public function setParent( Milestone $parent = null )
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getChildren()
    {
        return $this->children;   
    }

    /**
     * @param \CiscoSystems\ActivityBundle\Model\Milestone $child
     * @return \CiscoSystems\ActivityBundle\Model\Milestone
     */
    public function addChild( Milestone $child )
    {
        $this->children[] = $child;
        return $this;
    }

    /**
     * @param \CiscoSystems\ActivityBundle\Model\Milestone $child
     * @return \CiscoSystems\ActivityBundle\Model\Milestone
     */
    public function removeChild( Milestone $child )
    {
        $this->children->removeElement( $child );
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
     * @return \CiscoSystems\ActivityBundle\Model\Milestone
     */
    public function setProject( Project $project )
    {
        $this->project = $project;
        return $this;
    }
}
