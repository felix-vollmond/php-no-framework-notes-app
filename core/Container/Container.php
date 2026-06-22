<?php

declare(strict_types=1);

namespace Core\Container;

use ReflectionClass;

class Container
{
    /** @var array<string, callable(self): object> */
    private array $objects = [];

    /**
     * @param  callable(self): object  $callback
     */
    public function set(string $id, callable $callback): void
    {
        $this->objects[$id] = $callback;
    }

    public function get(string $id): object
    {
        return isset($this->objects[$id])
            ? $this->objects[$id]($this)
            : $this->make($id);
    }

    /**
     * @param  class-string  $class
     */
    private function make(string $class): ?object
    {
        if (!class_exists($class)) {
            return null;
        }

        $constructorArgs = (new ReflectionClass($class))
            ->getConstructor()
            ?->getParameters();

        $args = [];

        foreach ($constructorArgs ?? [] as $arg) {
            $argType = $arg->getType()->getName();

            $args[$arg->getName()] = $this->get($argType);
        }

        return new $class(...$args);
    }
}
