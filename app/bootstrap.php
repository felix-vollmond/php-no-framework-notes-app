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

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

require base_path('app/routes.php');
App::$router->dispatch($method, $uri);
