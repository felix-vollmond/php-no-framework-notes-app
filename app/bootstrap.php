<?php

require dirname(__DIR__) . '/core/helpers.php';

require base_path('core/Router.php');
require base_path('core/Env.php');
require base_path('core/Database.php');

use Core\Router;
use Core\Env;
use Core\Database;

Env::load(base_path());

$db = new Database(require(base_path('config/database.php')));

// Yes... Hardcoding the user identifier is stupid.
$userId = 1;

$router = new Router();

$router->get('/', 'index');
$router->get('/about', 'about');

$router->get('/notes', 'notes/index');
$router->get('/note/edit', 'notes/edit');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->dispatch($method, $uri);
