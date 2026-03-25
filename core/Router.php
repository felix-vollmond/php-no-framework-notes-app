<?php

namespace Core;

use Core\Container;
use Core\RouteMatcher;

class Router
{
    private $routes = [];

    public function __construct(private Container $container) {}

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
        $uriMatcher = new RouteMatcher($uri);

        foreach ($this->routes[$method] ?? [] as $pattern => $route) {
            $params = $uriMatcher->match($pattern);

            if ($params !== false) {
                return $this->callAction($route, $params);
            }
        }

        abort();
    }

    private function callAction($route, $params)
    {
        if (is_callable($route)) {
            return $route(...array_values($params));
        }

        if (!is_array($route) || count($route) !== 2) {
            abort();
        }

        [$class, $action] = $route;

        if (!method_exists($class, $action)) {
            abort();
        }

        $controller = $this->container->get($class);

        return $controller->$action(...array_values($params));
    }
}
