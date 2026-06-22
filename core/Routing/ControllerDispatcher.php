<?php

namespace Core\Routing;

use Core\Container\Container;

use Exception;
use ReflectionFunction;
use ReflectionMethod;

class ControllerDispatcher
{
    public function __construct(private Container $container) {}

    /**
     * @param  callable|array{class-string, string}  $route
     * @param  array<string, mixed>  $params
     *
     * @throws Exception
     */
    public function dispatch(mixed $route, array $params): mixed
    {
        if (is_callable($route)) {
            $this->invoke($route, $params);
        }

        if (!is_array($route) || count($route) !== 2) {
            abort();
        }

        [$class, $action] = $route;

        if (!method_exists($class, $action)) {
            abort();
        }

        $controller = $this->container->get($class);

        return $this->invoke([$controller, $action], $params);
    }

    // I could have made it static, but I didn't.
    /**
     * @param  callable|array{class-string, string}  $callable
     * @param  array<string, mixed>  $params
     *
     * @throws Exception
     */
    private function invoke(mixed $callable, array $params): mixed
    {
        if (is_array($callable) && count($callable) === 2) {
            $reflection = new ReflectionMethod($callable[0], $callable[1]);
        } else {
            $reflection = new ReflectionFunction($callable);
        }

        $args = [];

        foreach ($reflection->getParameters() as $parameter) {
            $name = $parameter->getName();

            if (array_key_exists($name, $params)) {
                $args[] = $params[$name];
                continue;
            }

            throw new Exception("Cannot resolve parameter '{$name}'");
        }

        return $callable(...$args);
    }
}
