<?php

// GLOBALS? O_o
global $db, $userId;

$notes = $db->query("SELECT * FROM notes WHERE user_id = {$userId}")->fetchAll();

view('notes.index', ['notes' => $notes]);
