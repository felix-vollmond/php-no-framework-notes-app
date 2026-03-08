<?php

use App\App;

$db = App::$database;
$userId = App::$currentUserId;

$user = $db->query("SELECT * FROM users WHERE id = {$userId}")->fetch();
$user = $user['name'] ?? 'Guest';

include dirname(__DIR__) . '/views/index.view.php';
