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
