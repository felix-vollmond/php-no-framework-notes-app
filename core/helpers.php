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
