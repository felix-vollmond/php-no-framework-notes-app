<?php

namespace Core\Container;

use ReflectionClass;

class Container
{
    private $objects = [];

    public function set($id, $callback)
    {
        $this->objects[$id] = $callback;
    }

    public function get($id)
    {
        return isset($this->objects[$id])
            ? $this->objects[$id]($this)
            : $this->make($id);
    }

    private function make($class)
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
