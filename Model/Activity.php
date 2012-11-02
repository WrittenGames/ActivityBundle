<?php

namespace WG\ActivityBundle\Model;

use WG\ActivityBundle\DependencyInjection\User\ActivityUserInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Storage agnostic Activity object
 */
abstract class Activity
{
    /**
     * @var mixed
     */
    protected $id;
    
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
     * @var string
     */
    protected $slug;
    
    /**
     * @var \DateTime
     */
    protected $updatedAt;
    
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
}
