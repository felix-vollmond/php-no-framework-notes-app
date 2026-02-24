<?php

require dirname(__DIR__) . '/core/Router.php';
require dirname(__DIR__) . '/core/Env.php';

use Core\Router;
use Core\Env;

Env::load(dirname(__DIR__));

$router = new Router();

$router->get('/', 'index');
$router->get('/about', 'about');

$uri = $_SERVER['REQUEST_URI'];

$router->dispatch('GET', $uri);
