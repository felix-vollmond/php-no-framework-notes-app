<?php

namespace App\Controllers;

use Core\Database;

class NotesController
{
    public function __construct(
        private Database $db,
    ) {}

    public function index()
    {
        $notes = $this->db->query(
            'SELECT * FROM notes WHERE user_id = ?',
            [$_SESSION['user']['id']],
        )->all();

        view('notes.index', ['notes' => $notes]);
    }

    public function show($id)
    {
        $query = 'SELECT * FROM notes WHERE id = :noteId AND user_id = :userId';

        $note = $this->db->query($query, [
            ':noteId' => $id,
            ':userId' => $_SESSION['user']['id'],
        ])->findOrFail();

        view('notes.show', ['note' => $note]);
    }

    public function edit($id)
    {
        $query = 'SELECT * FROM notes WHERE id = :noteId AND user_id = :userId';

        $note = $this->db->query($query, [
            ':noteId' => $id,
            ':userId' => $_SESSION['user']['id'],
        ])->findOrFail();

        view('notes.edit', ['note' => $note]);
    }

    public function create()
    {
        view('notes.create');
    }

    public function update($id)
    {
        $noteBody = $_POST['body'] ?? null;

        $query = 'UPDATE notes SET body = :noteBody WHERE id = :noteId AND user_id = :userId';

        $this->db->query($query, [
            ':noteBody' => $noteBody,
            ':noteId' => $id,
            ':userId' => $_SESSION['user']['id'],
        ]);

        redirect("/notes/{$id}");
    }

    public function store()
    {
        $noteBody = $_POST['body'] ?? null;

        $query = 'INSERT INTO notes (body, user_id) VALUES (:noteBody, :userId)';

        $this->db->query($query, [
            ':noteBody' => $noteBody,
            ':userId' => $_SESSION['user']['id'],
        ]);

        redirect('/notes');
    }

    public function destroy($id)
    {
        $query = 'DELETE FROM notes WHERE id = :noteId AND user_id = :userId';

        $this->db->query($query, [
            ':noteId' => $id,
            ':userId' => $_SESSION['user']['id'],
        ]);

        redirect('/notes');
    }
}
