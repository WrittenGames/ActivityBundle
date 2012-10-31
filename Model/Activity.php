<?php

namespace WG\ActivityBundle\Model;

use WG\ActivityBundle\DependencyInjection\User\ActivityUserInterface;

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
     * @var text
     */
    protected $description;
    
    /**
     * 
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @return \WG\ActivityBundle\DependencyInjection\User\ActivityUserInterface
     */
    public function getUser()
    {
        return $this->user;
    }
    
    /**
     * @param \WG\ActivityBundle\DependencyInjection\User\ActivityUserInterface $user
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
}
