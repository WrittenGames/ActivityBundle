<?php

namespace WG\ActivityBundle\DependencyInjection\User;

/**
 * Must be implemented by your application's User entity
 */
interface ActivityUserInterface
{
    /**
     * @var mixed
     */
    public function getId();
}
