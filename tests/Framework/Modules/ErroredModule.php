<?php

namespace Tests\CustomFramework\Modules;

use CustomFramework\Router;

class ErroredModule
{
    public function __construct(Router $router)
    {
        $router-> get('/demo', function () {
            return new \stdClass();
        }, 'Error');
    }
}
