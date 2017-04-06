<?php

require_once __DIR__ . '/init.php';

$path = $request->getPathInfo();

$map = array(
  '/hello' => 'hello',
  '/bye' => 'bye',
);

if (isset($map[$path])) {
  ob_start();
  extract($request->query->all(), EXTR_SKIP);
  include sprintf(__DIR__ . '/src/pages/%s.php', $map[$path]);
  $response->setContent(ob_get_clean());
} else {
	$response->setContent('Not Found', 404);
}
 
$response->send();
