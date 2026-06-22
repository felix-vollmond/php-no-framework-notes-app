<?php

use App\Controllers\Auth\RegisteredUserController;
use App\Controllers\Auth\SessionsController;
use App\Controllers\NotesController;
use App\Controllers\PagesController;

use Core\Routing\Router;

return function (Router $router) {
    $router->get('/', [PagesController::class, 'index']);
    $router->get('/about', [PagesController::class, 'about']);

    $router->get('/notes', [NotesController::class, 'index'])->only('auth');
    $router->get('/notes/create', [NotesController::class, 'create'])->only('auth');
    $router->get('/notes/{id}', [NotesController::class, 'show'])->only('auth');
    $router->get('/notes/{id}/edit', [NotesController::class, 'edit'])->only('auth');
    $router->post('/notes', [NotesController::class, 'store'])->only('auth');
    $router->patch('/notes/{id}', [NotesController::class, 'update'])->only('auth');
    $router->delete('/notes/{id}', [NotesController::class, 'destroy'])->only('auth');

    $router->get('/register', [RegisteredUserController::class, 'create'])->only('guest');
    $router->post('/register', [RegisteredUserController::class, 'store'])->only('guest');

    $router->get('/login', [SessionsController::class, 'create'])->only('guest');
    $router->post('/login', [SessionsController::class, 'store'])->only('guest');
    $router->delete('/logout', [SessionsController::class, 'destroy'])->only('auth');
};
