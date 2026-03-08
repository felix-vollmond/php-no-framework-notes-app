<?php

use App\App;

$db = App::$database;
$userId = App::$currentUserId;

$user = $db->query('SELECT * FROM users WHERE id = ?', [$userId])->fetch();
$user = $user['name'] ?? 'Guest';

view('index', ['user' => $user]);
