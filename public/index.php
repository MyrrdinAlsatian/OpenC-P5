<?php

use App\Blog\BlogModule;
use CustomFramework\App;
use CustomFramework\Renderer;
use GuzzleHttp\Psr7\ServerRequest;

// use \Http\Response\send;
require '../vendor/autoload.php';
// require '../src/form.php';
// require '../src/text.php';


$renderer = new Renderer();
$renderer->addPath(dirname(__DIR__) . DIRECTORY_SEPARATOR . "Views");

$app = new App([
    BlogModule::class
], [
    'renderer' => $renderer
]);

$response = $app->run(ServerRequest::fromGlobals());

\Http\Response\send($response);
