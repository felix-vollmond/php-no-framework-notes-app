<?php

require dirname(__DIR__) . '/core/Router.php';

use Core\Router;

$router = new Router();

$router->get('/', 'index');
$router->get('/about', 'about');

$uri = $_SERVER['REQUEST_URI'];

$router->dispatch('GET', $uri);
