<?php

namespace CiscoSystems\ActivityBundle;

//use CiscoSystems\ActivityBundle\DependencyInjection\Compiler\BundleConfigCompilerPass;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class CiscoSystemsActivityBundle extends Bundle
{
    public function getNamespace()
    {
        return __NAMESPACE__;
    }
    
    public function getPath()
    {
        return strtr(__DIR__, '\\', '/');
    }

//    public function build( ContainerBuilder $container )
//    {
//        parent::build( $container );
//        $container->addCompilerPass( new BundleConfigCompilerPass() );
//    }
}
