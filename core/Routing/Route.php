<?php

namespace Core\Routing;

use Core\Middleware\Middleware;
use Exception;

class Route
{
    public ?Middleware $middleware = null;

    /**
     * @param  callable|array{class-string, string}  $action
     */
    public function __construct(
        public readonly string $method,
        public readonly string $uri,
        public readonly mixed $action,
    ) {}

    /**
     * @throws Exception
     */
    public function only(string $middleware): static
    {
        if (! isset(Middleware::MAP[$middleware])) {
            throw new Exception("Unknown middleware [{$middleware}]");
        }

        $class = Middleware::MAP[$middleware];

        $this->middleware = new $class();

        return $this;
    }
}
