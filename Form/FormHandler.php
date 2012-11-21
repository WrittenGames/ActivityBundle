<?php

namespace WG\ActivityBundle\Form;

use WG\ActivityBundle\Model\ManagerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

class FormHandler
{
    protected $request;
    protected $instanceManager;
    protected $form;

    public function __construct( FormInterface $form, Request $request, ManagerInterface $instanceManager )
    {
        $this->form = $form;
        $this->request = $request;
        $this->instanceManager = $instanceManager;
    }

    public function process( $entity = null )
    {
        if ( null === $entity )
        {
            $entity = $this->instanceManager->create();
        }
        $this->form->setData( $entity );
        if ( 'POST' === $this->request->getMethod() )
        {
            $this->form->bind( $this->request );
            if ( $this->form->isValid() )
            {
                $this->onSuccess( $entity );
                return true;
            }
        }
        return false;
    }

    protected function onSuccess( $entity )
    {
        $this->instanceManager->save( $entity );
    }
}
