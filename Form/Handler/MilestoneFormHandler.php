<?php

namespace WG\ActivityBundle\Form\Handler;

use WG\ActivityBundle\Model\Milestone;
use WG\ActivityBundle\Model\MilestoneManager;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

class MilestoneFormHandler
{
    protected $request;
    protected $milestoneManager;
    protected $form;

    public function __construct( FormInterface $form, Request $request, MilestoneManager $milestoneManager )
    {
        $this->form = $form;
        $this->request = $request;
        $this->milestoneManager = $milestoneManager;
    }

    public function process( Milestone $milestone = null )
    {
        if ( null === $milestone )
        {
            $milestone = $this->milestoneManager->createMilestone();
        }
        $this->form->setData( $milestone );
        if ( 'POST' === $this->request->getMethod() )
        {
            $this->form->bind( $this->request );
            if ( $this->form->isValid() )
            {
                $this->onSuccess( $milestone );
                return true;
            }
        }
        return false;
    }

    protected function onSuccess( Milestone $milestone )
    {
        $this->milestoneManager->updateMilestone( $milestone );
    }
}
