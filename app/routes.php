<?php

use App\App;
use App\Controllers\NotesController;
use App\Controllers\PagesController;

App::$router->get('/', [PagesController::class, 'index']);
App::$router->get('/about', [PagesController::class, 'about']);

App::$router->get('/notes', [NotesController::class, 'index']);
App::$router->get('/notes/create', [NotesController::class, 'create']);
App::$router->get('/notes/{id}', [NotesController::class, 'show']);
App::$router->get('/notes/{id}/edit', [NotesController::class, 'edit']);
App::$router->post('/notes', [NotesController::class, 'store']);
App::$router->patch('/notes/{id}', [NotesController::class, 'update']);
App::$router->delete('/notes/{id}', [NotesController::class, 'destroy']);
