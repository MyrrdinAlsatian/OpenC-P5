<?php

namespace App\Blog;

use CustomFramework\Router;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class BlogModule
{
    protected $router;

    public function __construct(Router $router)
    {
        $router->get('/blog', [$this, 'index'], 'blog.index');
        $router->get('/blog/{slug:[a-z0-9\-]+}-{id:\d+}', [$this, 'show'], 'blog.show');
    }

    public function index(ServerRequestInterface $request): string
    {
            return '<h1>Bienvenue sur le blog</h1>';
    }


    public function show(ServerRequestInterface $request): string
    {
            return '<h1>Bienvenue sur l\'article' . $request->getAttribute('slug') . '</h1>';
    }
}
