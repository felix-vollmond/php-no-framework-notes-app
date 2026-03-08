<?php

use App\App;

$db = App::$database;
$userId = App::$currentUserId;
$noteBody = $_POST['body'] ?? null;

$query = 'INSERT INTO notes (body, user_id) VALUES (:noteBody, :userId)';

$db->query($query, [
    ':noteBody' => $noteBody,
    ':userId' => $userId,
]);

header("Location: /notes");
exit();
