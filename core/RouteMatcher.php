<?php

namespace Core;

class RouteMatcher
{
    private $uriParts;

    public function __construct($uri)
    {
        $this->uriParts = static::split($uri);
    }

    public function match($pattern)
    {
        $patternParts = static::split($pattern);

        if (count($this->uriParts) !== count($patternParts)) {
            return false;
        }

        $params = [];

        foreach ($patternParts as $i => $part) {
            if (static::isParam($part)) {
                $params[] = $this->uriParts[$i];
                continue;
            }

            if ($this->uriParts[$i] !== $part) {
                return false;
            }
        }

        return $params;
    }

    private static function split($uri)
    {
        return explode('/', trim($uri, '/'));
    }

    private static function isParam($value)
    {
        return str_starts_with($value, '{') && str_ends_with($value, '}');
    }
}
