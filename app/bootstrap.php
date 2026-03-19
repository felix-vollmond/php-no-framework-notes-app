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
use Core\Container;

use App\Controllers\{PagesController, NotesController};

Env::load(base_path());

$container = new Container();

$container->set('currentUserId', fn($c) => 1);
$container->set(
    Database::class,
    fn($c) => new Database(require(base_path('config/database.php'))),
);
$container->set(
    NotesController::class,
    fn($c) => new NotesController(
        $c->get(Database::class),
        $c->get('currentUserId'),
    ),
);
$container->set(
    PagesController::class,
    fn($c) => new PagesController(
        $c->get(Database::class),
        $c->get('currentUserId'),
    ),
);

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router = new Router($container);

require base_path('app/routes.php');
$router->dispatch($method, $uri);
