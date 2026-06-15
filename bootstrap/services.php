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
};
