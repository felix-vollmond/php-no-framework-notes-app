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
        foreach ($this->routes[$method] ?? [] as $pattern => $route) {
            $params = static::match($uri, $pattern);

            if ($params !== false) {
                return static::callAction($route, $params);
            }
        }

        abort();
    }

    private static function callAction($route, $params)
    {
        [$class, $action] = $route;

        if (!method_exists($class, $action)) {
            abort();
        }

        $controller = new $class();

        return $controller->$action(...array_values($params));
    }

    private static function split($uri)
    {
        return explode('/', trim($uri, '/'));
    }

    private static function isParam($value)
    {
        return str_starts_with($value, '{') && str_ends_with($value, '}');
    }

    private static function match($uri, $pattern)
    {
        $uriParts = static::split($uri);
        $patternParts = static::split($pattern);

        if (count($uriParts) !== count($patternParts)) {
            return false;
        }

        $params = [];

        foreach ($patternParts as $i => $part) {
            if (static::isParam($part)) {
                $params[] = $uriParts[$i];
                continue;
            }

            if ($uriParts[$i] !== $part) {
                return false;
            }
        }

        return $params;
    }
}
