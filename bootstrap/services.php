<?php

use App\Controllers\Auth\RegisteredUserController;
use App\Controllers\Auth\SessionsController;
use App\Controllers\NotesController;
use App\Controllers\PagesController;

use Core\Container;
use Core\Database;

return function (Container $container) {
    $container->set(
        Database::class,
        fn($c) => new Database(require(base_path('config/database.php'))),
    );
    $container->set(
        NotesController::class,
        fn($c) => new NotesController($c->get(Database::class)),
    );
    $container->set(
        PagesController::class,
        fn($c) => new PagesController($c->get(Database::class)),
    );
    $container->set(
        RegisteredUserController::class,
        fn($c) => new RegisteredUserController($c->get(Database::class)),
    );
    $container->set(
        SessionsController::class,
        fn($c) => new SessionsController($c->get(Database::class)),
    );
};
