<?php

namespace WG\ActivityBundle\DependencyInjection\Factory;

use Symfony\Component\Security\Core\SecurityContextInterface;

class ContextFactory
{
    private $context;

    /**
     * @param \Symfony\Component\Security\Core\SecurityContextInterface $context
     */
    public function __construct( SecurityContextInterface $context )
    {
        $this->context = $context;
    }

    /**
     * @return \WG\ActivityBundle\Model\UserInterface
     */
    public function getUser()
    {
        if ( null === $token = $this->context->getToken() ) return null;
        if ( !is_object( $user = $token->getUser() )) return null;
        return $user;
    }
}
