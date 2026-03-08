<?php

use App\App;

App::$router->get('/', 'index');
App::$router->get('/about', 'about');

App::$router->get('/notes', 'notes/index');
App::$router->get('/note/edit', 'notes/edit');
