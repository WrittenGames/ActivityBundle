<?php

namespace WrittenGames\ActivityBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class WrittenGamesActivityBundle extends Bundle
{
    public function getNamespace()
    {
        return __NAMESPACE__;
    }
    
    public function getPath()
    {
        return strtr(__DIR__, '\\', '/');
    }
}
