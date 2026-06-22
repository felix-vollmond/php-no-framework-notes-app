<?php

namespace Core\Routing;

class RouteMatcher
{
    /** @var string[] */
    private array $uriParts;

    public function __construct(string $uri)
    {
        $this->uriParts = static::split($uri);
    }

    /**
     * @return array<string, string>|false
     */
    public function match(string $pattern): array|false
    {
        $patternParts = static::split($pattern);

        if (count($this->uriParts) !== count($patternParts)) {
            return false;
        }

        $params = [];

        foreach ($patternParts as $i => $part) {
            if (static::isParam($part)) {
                $params[trim($part, '{}')] = $this->uriParts[$i];
                continue;
            }

            if ($this->uriParts[$i] !== $part) {
                return false;
            }
        }

        return $params;
    }

    /**
     * @return string[]
     */
    private static function split(string $uri): array
    {
        return explode('/', trim($uri, '/'));
    }

    private static function isParam(string $value): bool
    {
        return str_starts_with($value, '{') && str_ends_with($value, '}');
    }
}
