<?php

// GLOBALS? O_o
global $db, $userId;

if (!isset($_GET['id'])) {
    http_response_code(404);
    view('404');
    return;
}

$noteId = $_GET['id'];

$query = 'SELECT * FROM notes WHERE id = :noteId AND user_id = :userId';

$note = $db->query($query, [
    ':noteId' => $noteId,
    ':userId' => $userId,
])->fetch();

if ($note === false) {
    http_response_code(404);
    view('404');
    return;
}

view('notes.edit', ['note' => $note]);
