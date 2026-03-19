<?php

// It is assumed that MySQL is used
return [
    'host' => env('DB_HOST', '127.0.0.1'),
    'port' => env('DB_PORT', 3306),
    'name' => env('DB_NAME', 'notes_app'),
    'charset' => env('DB_CHARSET', 'utf8mb4'),
    'user' => env('DB_USER', 'root'),
    'password' => env('DB_PASSWORD', ''),
];
