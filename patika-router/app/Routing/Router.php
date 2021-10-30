<?php

namespace App\Routing;

class Router{
    public array $routes;
    public string $requestUri;
    public string $requestMethod;

    public function __construct($routes)
    {
     $this->routes = $routes;   
    }
    public function __invoke()
    {
        $requestContext = new RequestContext();

        $matcher = new UrlMatcher($this->routes, $requestContext);
        $params = $matcher->match($_SERVER['REQUEST_URI']);
    
        $controllerName ="\\" . $params['controller'];
        $controllerInstance = new $controllerName;

        call_user_func_array([$controllerInstance, $params['method']],[]);   
    }
      
}