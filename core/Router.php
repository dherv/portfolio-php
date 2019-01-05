<?php

namespace App\Core;

class Router {

    protected $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($file) {

        $router = new static; // means new Router (self) because route.php depends on Router

        require $file;

        return $router;
        // $this would not work because it is a static method not available in the instance but we created a new static that we can use
    }

    public function get($uri, $controller) {
        return $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller) {
        return $this->routes['POST'][$uri] = $controller;
    }

    public function define($routes) 
    {
        $this->routes = $routes;
    }

    public function direct($uri, $type) {
        if(array_key_exists($uri, $this->routes[$type])) {
            return $this->callAction(
                ...explode('@', $this->routes[$type][$uri])
            );
        }
        throw new Exception('No route found for this uri');
    }

    protected function callAction($controller, $action) {

        $controller = "App\\Controller\\{$controller}";
        $controller = new $controller;

        if(!method_exists($controller, $action)) {
            throw new Exception("this method {$action} does not exist on {$controller}");
        }

        return $controller->$action();
    }
}