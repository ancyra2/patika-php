<?php

use App\Routing\Router;

require __DIR__ . '/../vendor/autoload.php';

$routes = require __DIR__ . '/../route/routes.php'; 

(new Router($routes))();
