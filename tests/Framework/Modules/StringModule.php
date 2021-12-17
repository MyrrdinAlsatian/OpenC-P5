<?php

namespace Tests\CustomFramework\Modules;

use CustomFramework\Router;

class StringModule
{
    public function __construct(Router $router)
    {
        $router->get('/demo', function () {
            return 'DEMO';
        }, 'demo');
    }
}
