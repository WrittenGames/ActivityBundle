<?php

namespace WG\ActivityBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MilestoneFormType extends AbstractType
{
    protected $class;

    /**
     * @param string $class The Milestone class name
     */
    public function __construct( $class )
    {
        $this->class = $class;
    }
    
    public function buildForm( FormBuilderInterface $builder, array $options )
    {
        $builder->add( 'title' );
        $builder->add( 'dueBy', 'date', array(
            'input' => 'datetime',
            'widget' => 'single_text',
            'label' => 'Due by',
        ));
        $builder->add( 'parent', null, array( 
            'empty_value' => 'none',
            'required' => false,
        ));
    }

    public function getName()
    {
        return 'wg_activity_milestone';
    }

    public function setDefaultOptions( OptionsResolverInterface $resolver )
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class,
        ));
    }
}
