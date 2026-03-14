<?php

use App\App;

$db = App::$database;
$userId = App::$currentUserId;

if (!isset($_GET['id'])) {
    abort();
}

$noteId = $_GET['id'];

$query = 'SELECT * FROM notes WHERE id = :noteId AND user_id = :userId';

$note = $db->query($query, [
    ':noteId' => $noteId,
    ':userId' => $userId,
])->find();

if ($note === false) {
    abort();
}

view('notes.edit', ['note' => $note]);
