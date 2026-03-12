<?php

if (!defined('BASE_PATH')) {
    define('BASE_PATH', dirname(__DIR__));
}

if (!function_exists('dd')) {
    function dd(...$vars)
    {
        echo '<pre>';
        foreach ($vars as $var) {
            var_dump($var);
        }
        echo '</pre>';
        die();
    }
}

if (!function_exists('base_path')) {
    function base_path($path = '')
    {
        return $path === '' ?
            BASE_PATH :
            BASE_PATH . DIRECTORY_SEPARATOR . $path;
    }
}

if (!function_exists('view')) {
    function view($name, $data = [])
    {
        extract($data);
        $name = str_replace('.', '/', $name);
        include base_path("views/{$name}.view.php");
    }
}

if (!function_exists('partial')) {
    function partial($name, $data = [])
    {
        extract($data);
        $name = str_replace('.', '/', $name);
        include base_path("views/partials/{$name}.partial.php");
    }
}

if (!function_exists('redirect')) {
    function redirect($path)
    {
        header("Location: {$path}");
        exit();
    }
}

if (!function_exists('abort')) {
    function abort($code = 404)
    {
        http_response_code($code);
        view("{$code}");
        exit();
    }
}

if (!function_exists('e')) {
    function e($value)
    {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
}
