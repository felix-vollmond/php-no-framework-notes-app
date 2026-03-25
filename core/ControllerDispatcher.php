<?php

namespace Core;

use Core\Container;

class ControllerDispatcher
{
    public function __construct(private Container $container) {}

    public function dispatch($route, $params)
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
