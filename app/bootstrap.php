<?php

require dirname(__DIR__) . '/core/Router.php';
require dirname(__DIR__) . '/core/Env.php';
require dirname(__DIR__) . '/core/Database.php';

use Core\Router;
use Core\Env;
use Core\Database;

Env::load(dirname(__DIR__));

$db = new Database(require(dirname(__DIR__) . '/config/database.php'));

$router = new Router();

$router->get('/', 'index');
$router->get('/about', 'about');

$uri = $_SERVER['REQUEST_URI'];

$router->dispatch('GET', $uri);
