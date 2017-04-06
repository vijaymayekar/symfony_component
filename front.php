<?php

require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


$request = Request::createFromGlobals();
$response = new Response();

$path = $request->getPathInfo();

$map = array(
  '/hello' => __DIR__ . '/src/pages/hello.php',
  '/bye' => __DIR__ . '/src/pages/bye.php',
);

if (isset($map[$path])) {
  require $map[$path];
} else {
  $response->setStatusCode(404);
  $response->setContent('Not Found');
}
 
$response->send();
