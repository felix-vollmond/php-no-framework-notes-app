<?php

use App\App;

$db = App::$database;
$userId = App::$currentUserId;
$noteId = $_POST['id'] ?? null;
$noteBody = $_POST['body'] ?? null;

$query = 'UPDATE notes SET body = :noteBody WHERE id = :noteId AND user_id = :userId';

$db->query($query, [
    ':noteBody' => $noteBody,
    ':noteId' => $noteId,
    ':userId' => $userId,
]);

redirect($_SERVER['HTTP_REFERER']);
