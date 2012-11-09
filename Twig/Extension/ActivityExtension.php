<?php

namespace WG\ActivityBundle\Twig\Extension;

use Twig_Extension;
use Twig_Function_Method;

class ActivityExtension extends Twig_Extension
{
    protected $businessTime;

    public function __construct( $businessTime )
    {
        $this->businessTime = $businessTime;
    }

    public function getName()
    {
        return 'activity_extension';
    }

    public function getFunctions()
    {
        return array(
            'format_activity_time' => new Twig_Function_Method( $this, 'formatActivityTime' ),
        );
    }
    
    public function formatActivityTime( $activity, $timeInMinutes )
    {
        return $this->businessTime->humaniseMinutes( $activity, $timeInMinutes );
    }
}
