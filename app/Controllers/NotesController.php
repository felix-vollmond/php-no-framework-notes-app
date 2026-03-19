<?php

namespace App\Controllers;

use Core\Database;

class NotesController
{
    public function __construct(
        private Database $db,
        private int $userId,
    ) {}

    public function index()
    {
        $notes = $this->db->query(
            'SELECT * FROM notes WHERE user_id = ?',
            [$this->userId],
        )->all();

        view('notes.index', ['notes' => $notes]);
    }

    public function show($noteId)
    {
        $query = 'SELECT * FROM notes WHERE id = :noteId AND user_id = :userId';

        $note = $this->db->query($query, [
            ':noteId' => $noteId,
            ':userId' => $this->userId,
        ])->findOrFail();

        view('notes.show', ['note' => $note]);
    }

    public function edit($noteId)
    {
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

    public function update($noteId)
    {
        $noteBody = $_POST['body'] ?? null;

        $query = 'UPDATE notes SET body = :noteBody WHERE id = :noteId AND user_id = :userId';

        $this->db->query($query, [
            ':noteBody' => $noteBody,
            ':noteId' => $noteId,
            ':userId' => $this->userId,
        ]);

        redirect("/notes/{$noteId}");
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

    public function destroy($noteId)
    {
        $query = 'DELETE FROM notes WHERE id = :noteId AND user_id = :userId';

        $this->db->query($query, [
            ':noteId' => $noteId,
            ':userId' => $this->userId,
        ]);

        redirect('/notes');
    }
}
