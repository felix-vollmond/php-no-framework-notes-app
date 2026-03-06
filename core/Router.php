<?php

namespace Core;

// TODO: Add POST, DELETE, PATCH
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
        $controller = $this->routes[$method][$uri] ?? null;

        if ($controller === null) {
            http_response_code(404);
            require dirname(__DIR__) . "/views/404.view.php";
            return;
        }

        require dirname(__DIR__) . "/controllers/{$controller}.php";
    }
}
