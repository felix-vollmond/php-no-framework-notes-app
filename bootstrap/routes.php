<?php

use App\Controllers\Auth\RegisteredUserController;
use App\Controllers\NotesController;
use App\Controllers\PagesController;

use Core\Router;

return function (Router $router) {
    $router->get('/', [PagesController::class, 'index']);
    $router->get('/about', [PagesController::class, 'about']);

    $router->get('/notes', [NotesController::class, 'index']);
    $router->get('/notes/create', [NotesController::class, 'create']);
    $router->get('/notes/{id}', [NotesController::class, 'show']);
    $router->get('/notes/{id}/edit', [NotesController::class, 'edit']);
    $router->post('/notes', [NotesController::class, 'store']);
    $router->patch('/notes/{id}', [NotesController::class, 'update']);
    $router->delete('/notes/{id}', [NotesController::class, 'destroy']);

    $router->get('/register', [RegisteredUserController::class, 'create']);
    $router->post('/register', [RegisteredUserController::class, 'store']);
};
