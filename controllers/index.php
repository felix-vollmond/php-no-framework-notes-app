<?php

// GLOBALS? O_o
global $db, $userId;

$user = $db->query("SELECT * FROM users WHERE id = {$userId}")->fetch();
$user = $user['name'] ?? 'Guest';

include dirname(__DIR__) . '/views/index.view.php';
