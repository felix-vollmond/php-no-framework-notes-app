<?php

namespace Core\Routing;

class Router
{
    /** @var Route[] */
    private array $routes = [];

    public function __construct(private ControllerDispatcher $dispatcher) {}

    /**
     * @param  callable|array{class-string, string}  $controller
     */
    private function add(string $method, string $uri, mixed $controller): Route
    {
        $this->routes[] = $route = new Route($method, $uri, $controller);

        return $route;
    }

    /**
     * @param  callable|array{class-string, string}  $controller
     */
    public function get(string $uri, mixed $controller): Route
    {
        return $this->add('GET', $uri, $controller);
    }

    /**
     * @param  callable|array{class-string, string}  $controller
     */
    public function post(string $uri, mixed $controller): Route
    {
        return $this->add('POST', $uri, $controller);
    }

    /**
     * @param  callable|array{class-string, string}  $controller
     */
    public function patch(string $uri, mixed $controller): Route
    {
        return $this->add('PATCH', $uri, $controller);
    }

    /**
     * @param  callable|array{class-string, string}  $controller
     */
    public function delete(string $uri, mixed $controller): Route
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function dispatch(string $method, string $uri): mixed
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
