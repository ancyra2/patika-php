<?php

namespace App\Routing;

class UrlMatcher{

    public $requestContext;
    protected array $routes;

    public function __construct(array $routes, RequestContext $requestContext) {
        $this->requestContext = $requestContext;
        $this->routes = $routes;
    }

    public function match(string $requestUri){
        $config = include __DIR__ . "/../../config.php";
        $hostname = $config['host'];
        $urlPattern = "/$hostname(\/[a-zA-Z0-9]*\/*[a-zA-Z0-9]*)/i";
        preg_match($urlPattern, $requestUri, $path);
        $requestedPath = $path[1];

        foreach($this->routes as $route){
                if($route['path'] == $requestedPath){
                 return $route;   
                }
        }
        echo "<h1>404 Aradığınız sayfa bulunamadı</h1>";
        return;
    }
}