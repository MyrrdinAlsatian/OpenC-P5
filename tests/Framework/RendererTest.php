<?php

namespace Tests\CustomFramework;

use PHPUnit\Framework\TestCase;
use CustomFramework\Renderer;

class RendererTest extends TestCase
{

    private $renderer;
    public function setUp(): void
    {
        $this->renderer = new Renderer();
        $this->renderer->addPath(__DIR__ . '/views');
    }

    public function testRenderTheCorrectPath()
    {
        $this->renderer->addPath('blog', __DIR__ . '/views');
        $content = $this->renderer->render('@blog/demo');

        $this->assertEquals('toto', $content);
    }

    public function testRenderDefaultPath()
    {
        $content = $this->renderer->render('demo');
        $this->assertEquals('toto', $content);
    }
    public function testRenderWithParams()
    {
        $content = $this->renderer->render('demoparams', ['nom'=> 'Marc']);
        $this->assertEquals('toto Marc', $content);
    }

    public function testRenderGlobalParams()
    {   
        $this->renderer->addGlobal('nom', 'Marc');
        $content = $this->renderer->render('demoparams');
        $this->assertEquals('toto Marc', $content);
    }
}
