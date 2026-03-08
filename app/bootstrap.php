<?php

require dirname(__DIR__) . '/core/helpers.php';
require dirname(__DIR__) . '/core/autoload.php';

autoload_register([
    'App\\' => 'app/',
    'Core\\' => 'core/',
]);

use Core\Router;
use Core\Env;
use Core\Database;

use App\App;

Env::load(base_path());

App::$database = new Database(require(base_path('config/database.php')));
App::$router = new Router();
App::$currentUserId = 1;

$router = App::$router;

$router->get('/', 'index');
$router->get('/about', 'about');

$router->get('/notes', 'notes/index');
$router->get('/note/edit', 'notes/edit');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->dispatch($method, $uri);
