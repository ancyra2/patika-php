<?php 

namespace App\Routing;

class RequestContext{

    private $requestUri;
    private $requestMethod;
    
    public function __construct(){
        $this->requestUri = $_SERVER['REQUEST_URI'];
        $this->requestMethod = $_SERVER['REQUEST_METHOD'];
    }

    public function getMethod(): string{
        return $this->requestMethod;
    }

    public function setMethod(string $method): void{
        $this->requestMethod = $method;
    }

    public function getRequestUri(): string{
        return $this->requestUri;
    }

    public function setRequestUri(string $uri): void{
        $this->requestUri = $uri;
    }

    
}