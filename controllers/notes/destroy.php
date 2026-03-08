<?php

use App\App;

$db = App::$database;
$userId = App::$currentUserId;
$noteId = $_POST['id'] ?? null;

$query = 'DELETE FROM notes WHERE id = :noteId AND user_id = :userId';

$db->query($query, [
    ':noteId' => $noteId,
    ':userId' => $userId,
]);

header("Location: /notes");
exit();

