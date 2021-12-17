<?php

namespace Tests\CustomFramework;

use App\Blog\BlogModule;
use CustomFramework\App;
use PHPUnit\Framework\TestCase;
// use GuzzleHttp\Psr7\ResponseInterface;
use GuzzleHttp\Psr7\ServerRequest;
use Tests\CustomFramework\Modules\ErroredModule;

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
        $app = new App([
            BlogModule::class
        ]);

        $request = new ServerRequest("GET", '/blog');
        $response = $app->run($request);
        $this->assertEquals('<h1>Bienvenue sur le blog</h1>', (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
        
        $requestArticle = new ServerRequest("GET", '/blog/mon-article-8');
        $responseArticle = $app->run($requestArticle);
        $this->assertEquals('<h1>Bienvenue sur l\'article mon-article</h1>', (string)$responseArticle->getBody());
        $this->assertEquals(200, $responseArticle->getStatusCode());
    }


    public function test404()
    {
        
        $app = new App();

        $request = new ServerRequest("GET", '/ezate');

        $response = $app->run($request);

        $this->assertEquals('<h1>404</h1>', (string)$response->getBody());
        $this->assertEquals(404, $response->getStatusCode());
    }

    public function throwExceptionIfNoResponse()
    {
        $app = new App(
            [ErroredModule::class]
        );

        $request = new ServerRequest("GET", '/demo');

        $this->expectException(\Exception::class);
        $app->run($request);
    }
}
