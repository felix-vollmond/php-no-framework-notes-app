<?php

use App\App;

App::$router->get('/', 'index');
App::$router->get('/about', 'about');

App::$router->get('/notes', 'notes/index');
App::$router->get('/note', 'notes/show');
App::$router->get('/notes/create', 'notes/create');
App::$router->post('/notes', 'notes/store');
App::$router->get('/note/edit', 'notes/edit');
App::$router->patch('/note', 'notes/update');
App::$router->delete('/note', 'notes/destroy');
