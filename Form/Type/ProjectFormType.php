<?php

namespace CiscoSystems\ActivityBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProjectFormType extends AbstractType
{
    protected $class;

    /**
     * @param string $class The entity class name
     */
    public function __construct( $class )
    {
        $this->class = $class;
    }

    public function getName() {}    // injected into factory instead

    public function setDefaultOptions( OptionsResolverInterface $resolver )
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class,
        ));
    }
    
    public function buildForm( FormBuilderInterface $builder, array $options )
    {
        $builder->add( 'title' );
        $builder->add( 'description', 'textarea' );
    }
}
