<?php

namespace JBSBlog;

use GuzzleHttp\Psr7\ServerRequest;

// use \Http\Response\send;
require '../vendor/autoload.php';
// require '../src/form.php';
// require '../src/text.php';

$app = new \JBSBlog\App();

$response = $app->run(ServerRequest::fromGlobals());

\Http\Response\send($response);
