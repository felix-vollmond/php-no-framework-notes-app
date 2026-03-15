<?php

namespace App\Controllers;

use App\App;

use Core\Database;

class NotesController
{
    private Database $db;
    private int $userId;

    public function __construct()
    {
        $this->db = App::$database;
        $this->userId = App::$currentUserId;
    }

    public function index()
    {
        $notes = $this->db->query(
            'SELECT * FROM notes WHERE user_id = ?',
            [$this->userId],
        )->all();

        view('notes.index', ['notes' => $notes]);
    }

    public function show()
    {
        if (!isset($_GET['id'])) {
            abort();
        }

        $noteId = $_GET['id'];

        $query = 'SELECT * FROM notes WHERE id = :noteId AND user_id = :userId';

        $note = $this->db->query($query, [
            ':noteId' => $noteId,
            ':userId' => $this->userId,
        ])->findOrFail();

        view('notes.show', ['note' => $note]);
    }

    public function edit()
    {
        if (!isset($_GET['id'])) {
            abort();
        }

        $noteId = $_GET['id'];

        $query = 'SELECT * FROM notes WHERE id = :noteId AND user_id = :userId';

        $note = $this->db->query($query, [
            ':noteId' => $noteId,
            ':userId' => $this->userId,
        ])->findOrFail();

        view('notes.edit', ['note' => $note]);
    }

    public function create()
    {
        view('notes.create');
    }

    public function update()
    {
        $noteId = $_POST['id'] ?? null;
        $noteBody = $_POST['body'] ?? null;

        $query = 'UPDATE notes SET body = :noteBody WHERE id = :noteId AND user_id = :userId';

        $this->db->query($query, [
            ':noteBody' => $noteBody,
            ':noteId' => $noteId,
            ':userId' => $this->userId,
        ]);

        redirect("/note?id={$noteId}");
    }

    public function store()
    {
        $noteBody = $_POST['body'] ?? null;

        $query = 'INSERT INTO notes (body, user_id) VALUES (:noteBody, :userId)';

        $this->db->query($query, [
            ':noteBody' => $noteBody,
            ':userId' => $this->userId,
        ]);

        redirect('/notes');
    }

    public function destroy()
    {
        $noteId = $_POST['id'] ?? null;

        $query = 'DELETE FROM notes WHERE id = :noteId AND user_id = :userId';

        $this->db->query($query, [
            ':noteId' => $noteId,
            ':userId' => $this->userId,
        ]);

        redirect('/notes');
    }
}
