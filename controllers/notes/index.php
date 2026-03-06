<?php

// GLOBALS? O_o
global $db, $userId;

$notes = $db->query("SELECT * FROM notes WHERE user_id = {$userId}")->fetchAll();

include dirname(__DIR__, 2) . '/views/notes/index.view.php';
