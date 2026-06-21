<?php

namespace Core;

use Core\ControllerDispatcher;
use Core\Route;
use Core\RouteMatcher;

class Router
{
    private $routes = [];

    public function __construct(private ControllerDispatcher $dispatcher) {}

    private function add($method, $uri, $controller)
    {
        $this->routes[] = new Route($method, $uri, $controller);
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
        $uriMatcher = new RouteMatcher($uri);

        foreach ($this->routes as $route) {
            if ($route->method !== $method) continue;

            $params = $uriMatcher->match($route->uri);

            if ($params !== false) {
                return $this->dispatcher->dispatch($route->action, $params);
            }
        }

        abort();
    }
}
