<?php
require __DIR__ . '/../vendor/autoload.php';

$routes = [];

array_push(
        $routes,
        ['name' => 'home', 'path' => '/home', 'controller' => \App\Controller\HomeController::class, 'method' => 'index', 'httpMethod' => 'GET'],
        ['name' => 'test', 'path' => '/test', 'controller' => \App\Controller\TestController::class, 'method' => 'test', 'httpMethod' => 'GET'],
);

return $routes;