<?php

namespace Core;

use Exception;

class Container
{
    private $objects = [];

    public function set($id, $callback)
    {
        $this->objects[$id] = $callback;
    }

    public function get($id)
    {
        if (!$this->has($id)) {
            throw new Exception("Unregistered service: {$id}");
        }

        return $this->objects[$id]($this);
    }

    public function has($id)
    {
        return isset($this->objects[$id]);
    }
}
