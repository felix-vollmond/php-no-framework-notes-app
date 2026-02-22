<?php

namespace Core;

// TODO: Add POST, DELETE, PATCH. Accept contollers instead of views.
class Router
{
    private $routes = [];

    private function add($method, $uri, $view)
    {
        $this->routes[$method][$uri] = $view;
    }

    public function get($uri, $view)
    {
        $this->add('GET', $uri, $view);
    }

    public function dispatch($method, $uri)
    {
        $view = $this->routes[$method][$uri] ?? '404';

        if ($view === '404') {
            http_response_code(404);
        }

        require dirname(__DIR__) . "/views/{$view}.view.php";
    }
}
