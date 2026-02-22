<?php

$routes = [
    '/' => 'index',
    '/about' => 'about',
];

$uri = $_SERVER['REQUEST_URI'];

if (isset($routes[$uri])) {
    require dirname(__DIR__) . "/views/{$routes[$uri]}.view.php";
} else {
    require dirname(__DIR__) . '/views/404.view.php';
}
