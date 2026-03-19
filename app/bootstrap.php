<?php

require dirname(__DIR__) . '/core/helpers.php';
require dirname(__DIR__) . '/core/autoload.php';

autoload_register([
    'App\\' => 'app/',
    'Core\\' => 'core/',
]);

use Core\Router;
use Core\Env;
use Core\Container;

Env::load(base_path());

$container = new Container();
$router = new Router($container);

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$routes = require base_path('app/routes.php');
$services = require base_path('app/services.php');

// Register routes and services
$routes($router);
$services($container);

$router->dispatch($method, $uri);
