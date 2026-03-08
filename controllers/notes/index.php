<?php

use App\App;

$db = App::$database;
$userId = App::$currentUserId;

$notes = $db->query('SELECT * FROM notes WHERE user_id = ?', [$userId])->fetchAll();

view('notes.index', ['notes' => $notes]);
