<?php

namespace App;

use App\App;

class NotesController
{
    public function index()
    {
        $db = App::$database;
        $userId = App::$currentUserId;

        $notes = $db->query('SELECT * FROM notes WHERE user_id = ?', [$userId])->all();

        view('notes.index', ['notes' => $notes]);
    }

    public function show()
    {
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
        ])->findOrFail();

        view('notes.show', ['note' => $note]);
    }

    public function edit()
    {
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
        ])->findOrFail();

        view('notes.edit', ['note' => $note]);
    }

    public function create()
    {
        view('notes.create');
    }

    public function update()
    {
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
    }

    public function store()
    {
        $db = App::$database;
        $userId = App::$currentUserId;
        $noteBody = $_POST['body'] ?? null;

        $query = 'INSERT INTO notes (body, user_id) VALUES (:noteBody, :userId)';

        $db->query($query, [
            ':noteBody' => $noteBody,
            ':userId' => $userId,
        ]);

        redirect('/notes');
    }

    public function destroy()
    {
        $db = App::$database;
        $userId = App::$currentUserId;
        $noteId = $_POST['id'] ?? null;

        $query = 'DELETE FROM notes WHERE id = :noteId AND user_id = :userId';

        $db->query($query, [
            ':noteId' => $noteId,
            ':userId' => $userId,
        ]);

        redirect('/notes');
    }
}
