<?php

namespace Tests\CustomFramework;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Psr7\ServerRequest;
// use GuzzleHttp\Psr7\ResponseInterface;
use CustomFramework\App;

class AppTest extends TestCase
{


    public function testRedirectTrailingSlash()
    {

        $app = new App();

        $request = new ServerRequest('GET', '/trotro/');
        $response = $app->run($request);

        $this->assertContains('/trotro', $response->getHeader('Location'));
        $this->assertEquals(301, $response->getStatusCode());
    }


    public function testblog()
    {
        $app = new App();

        $request = new ServerRequest("GET", '/blog');

        $response = $app->run($request);

        $this->assertEquals('<h1>Blog</h1>', (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }


    public function test404()
    {
        $app = new App();

        $request = new ServerRequest("GET", '/ezate');

        $response = $app->run($request);

        $this->assertEquals('<h1>404</h1>', (string)$response->getBody());
        $this->assertEquals(404, $response->getStatusCode());
    }
}
