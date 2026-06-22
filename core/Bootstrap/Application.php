<?php

declare(strict_types=1);

namespace Core\Bootstrap;

use Core\Container\Container;
use Core\Routing\ControllerDispatcher;
use Core\Routing\Router;

class Application
{
    private Container $container;
    private Router $router;

    /**
     * @param  callable(Container): void  $services
     * @param  callable(Router): void  $routes
     */
    public function __construct(
        callable $services,
        callable $routes,
    ) {
        Env::load(base_path());

        $this->container = new Container();
        $this->registerCoreServices();

        $this->router = $this->container->get(Router::class);

        $this->register($services, $routes);
    }

    public function handleRequest(): mixed
    {
        $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
        $method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

        return $this->router->dispatch($method, $uri);
    }

    public function getContainer(): Container
    {
        return $this->container;
    }

    private function registerCoreServices(): void
    {
        $this->container->set(
            ControllerDispatcher::class,
            fn($c) => new ControllerDispatcher($c),
        );
        $this->container->set(
            Router::class,
            fn($c) => new Router($c->get(ControllerDispatcher::class)),
        );
    }

    /**
     * @param  callable(Container): void  $registerServices
     * @param  callable(Router): void  $registerRoutes
     */
    private function register(
        callable $registerServices,
        callable $registerRoutes,
    ): void {
        $registerServices($this->container);
        $registerRoutes($this->router);
    }
}
