<?php

declare(strict_types=1);

if (! defined('BASE_PATH')) {
    define('BASE_PATH', dirname(__DIR__));
}

if (! function_exists('dd')) {
    function dd(mixed ...$vars): never
    {
        echo '<pre>';
        foreach ($vars as $var) {
            var_dump($var);
        }
        echo '</pre>';
        die();
    }
}

if (! function_exists('env')) {
    function env(string $key, mixed $default = null): mixed
    {
        return $_ENV[$key] ?? $default;
    }
}

if (! function_exists('base_path')) {
    function base_path(string $path = ''): string
    {
        return $path === '' ?
            BASE_PATH :
            BASE_PATH . DIRECTORY_SEPARATOR . $path;
    }
}

if (! function_exists('view')) {
    /**
     * @param  array<string, mixed>  $data
     */
    function view(string $name, array $data = []): void
    {
        extract($data);
        $name = str_replace('.', '/', $name);
        include base_path("views/{$name}.view.php");
    }
}

if (! function_exists('partial')) {
    /**
     * @param  array<string, mixed>  $data
     */
    function partial(string $name, array $data = []): void
    {
        extract($data);
        $name = str_replace('.', '/', $name);
        include base_path("views/partials/{$name}.partial.php");
    }
}

if (! function_exists('redirect')) {
    function redirect(string $path): never
    {
        header("Location: {$path}");
        exit();
    }
}

if (! function_exists('abort')) {
    function abort(int $code = 404): never
    {
        http_response_code($code);
        view("{$code}");
        exit();
    }
}

if (! function_exists('e')) {
    function e(string $value): string
    {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
}

if (! function_exists('if_uri_is')) {
    function if_uri_is(string $uri, string $then): string
    {
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        return $requestUri === $uri ? $then : '';
    }
}
