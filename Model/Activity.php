<?php

namespace WG\ActivityBundle\Model;

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
