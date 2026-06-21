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
        $this->routes[] = $route = new Route($method, $uri, $controller);

        return $route;
    }

    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function dispatch($method, $uri)
    {
        $uriMatcher = new RouteMatcher($uri);

        foreach ($this->routes as $route) {
            if ($route->method !== $method) continue;

            $params = $uriMatcher->match($route->uri);

            if ($params === false) continue;

            $route->middleware?->handle();

            return $this->dispatcher->dispatch($route->action, $params);
        }

        abort();
    }
}
