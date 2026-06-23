<?php

declare(strict_types=1);

namespace Core\Bootstrap;

use RuntimeException;

/*
    A temporary implementation of reading secrets from .env

    It does not support quoted values, comments after a key-value pair
    and a lot of things yet. It also does not check if the key is a valid
    identifier. But it meets our needs perfectly! ^-^
*/
class Env
{
    /**
     * @throws RuntimeException
     */
    public static function load(string $path, string $name = '.env'): void
    {
        $path .= "/{$name}";
        if (! is_readable($path)) {
            throw new RuntimeException("{$path} is not readable");
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            $line = trim($line);

            // Skip blank lines or comment lines
            if (empty($line) || str_starts_with($line, '#')) continue;

            // Find first `=` and ensure it was encountered
            $delimPos = strpos($line, '=');
            if ($delimPos === false) continue;

            $key = trim(substr($line, 0, $delimPos));
            $value = trim(substr($line, $delimPos + 1));

            if (empty($key) || empty($value)) continue;

            // Add variables to superglobals
            $_ENV[$key] = $value;
            $_SERVER[$key] = $value;
        }
    }
}
