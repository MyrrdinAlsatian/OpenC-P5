<?php

namespace CustomFramework;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class App
{
    /**
     * app constructor function
     *
     * @param string[] $modules list des modules
     */
    public function __construct(array $modules = [])
    {
        $router = new Router();
        foreach ($modules as $module) :
            $this->modules[] = new $modules($router);
        endforeach;
    }


    public function run(ServerRequestInterface $request): ResponseInterface
    {
        $uri = $request->getUri()->getPath();

        if (!empty($uri) && $uri[-1] === '/') {
            return (new Response())
                ->withStatus(301)
                ->withHeader('Location', substr($uri, 0, -1));
        }
        if ($uri === '/blog') :
            return new Response(200, [], '<h1>Blog</h1>');
        endif;


        return new Response(404, [], '<h1>404</h1>');
    }
}
