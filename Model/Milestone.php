<?php

namespace WG\ActivityBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;

class Milestone
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
     * @var WG\ActivityBundle\Entity\Milestone
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
     * @return \WG\ActivityBundle\Model\Milestone
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
     * @return \WG\ActivityBundle\Model\Milestone
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
     * @return \WG\ActivityBundle\Model\Milestone
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
     * @return \WG\ActivityBundle\Model\Milestone
     */
    public function setCreatedAt( \DateTime $createdAt )
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return \WG\ActivityBundle\Model\Milestone $parent
     */
    public function getParent()
    {
        return $this->parent;   
    }

    /**
     * @param \WG\ActivityBundle\Model\Milestone $parent
     * @return \WG\ActivityBundle\Model\Milestone
     */
    public function setParent( Milestone $parent = null )
    {
        $this->parent = $parent; 
        return $this;   
    }
    
    public function __toString()
    {
        return $this->title;
    }
}
