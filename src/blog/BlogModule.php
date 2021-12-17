<?php

namespace App\Blog;

use CustomFramework\Renderer;
use CustomFramework\Router;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class BlogModule
{
    private $renderer;
    public function __construct(Router $router, Renderer $renderer)
    {
        $this->renderer = $renderer;
        $this->renderer->addPath('blog', __DIR__ . '/Views');
        $router->get('/blog', [$this, 'index'], 'blog.index');
        $router->get('/blog/{slug:[a-z0-9\-]+}', [$this, 'show'], 'blog.show');
    }

    public function index(ServerRequestInterface $request): string
    {
        return $this->renderer->render('@blog/index');
    }


    public function show(ServerRequestInterface $request): string
    {
        return $this->renderer->render('@blog/show', ["slug" => $request->getAttribute('slug')]);
    }
}
