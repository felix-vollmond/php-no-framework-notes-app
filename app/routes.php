<?php

use App\App;
use App\Controllers\NotesController;
use App\Controllers\PagesController;

App::$router->get('/', [PagesController::class, 'index']);
App::$router->get('/about', [PagesController::class, 'about']);

App::$router->get('/notes', [NotesController::class, 'index']);
App::$router->get('/note', [NotesController::class, 'show']);
App::$router->get('/notes/create', [NotesController::class, 'create']);
App::$router->post('/notes', [NotesController::class, 'store']);
App::$router->get('/note/edit', [NotesController::class, 'edit']);
App::$router->patch('/note', [NotesController::class, 'update']);
App::$router->delete('/note', [NotesController::class, 'destroy']);
