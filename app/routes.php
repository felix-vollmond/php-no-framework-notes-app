<?php

use App\App;

App::$router->get('/', 'index');
App::$router->get('/about', 'about');

App::$router->get('/notes', 'notes/index');
App::$router->get('/notes/create', 'notes/create');
App::$router->post('/notes', 'notes/store');
App::$router->get('/note/edit', 'notes/edit');
App::$router->patch('/note', 'notes/update');
