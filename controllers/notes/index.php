<?php

// GLOBALS? O_o
global $db, $userId;

$notes = $db->query("SELECT * FROM notes WHERE user_id = {$userId}")->fetchAll();
$notes = array_map(fn($note) => $note['body'], $notes);

include dirname(__DIR__, 2) . '/views/notes.view.php';
