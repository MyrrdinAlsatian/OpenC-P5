<?php

use App\Blog\BlogModule;
use CustomFramework\App;
use GuzzleHttp\Psr7\ServerRequest;

// use \Http\Response\send;
require '../vendor/autoload.php';
// require '../src/form.php';
// require '../src/text.php';

$app = new App([
    BlogModule::class
]);

$response = $app->run(ServerRequest::fromGlobals());

\Http\Response\send($response);
