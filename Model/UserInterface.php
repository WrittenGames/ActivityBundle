<?php

namespace CiscoSystems\ActivityBundle\Model;

/**
 * Must be implemented by your application's User object
 */
interface UserInterface
{
    /**
     * @var mixed
     */
    public function getId();
    
    /**
     * @var string
     */
    public function getUsername();
}
