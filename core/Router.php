<?php

namespace Core;

class Router
{
    private $routes = [];

    private function add($method, $uri, $controller)
    {
        $this->routes[$method][$uri] = $controller;
    }

    public function get($uri, $controller)
    {
        $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        $this->add('POST', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        $this->add('PATCH', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        $this->add('DELETE', $uri, $controller);
    }

    public function dispatch($method, $uri)
    {
        $route = $this->routes[$method][$uri] ?? null;

        if ($route === null) {
            abort();
        }

        [$class, $action] = $route;

        if (!method_exists($class, $action)) {
            abort();
        }

        $controller = new $class();
        $controller->$action();
    }
}
