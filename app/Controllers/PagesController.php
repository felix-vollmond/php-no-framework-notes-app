<?php

namespace App\Controllers;

use Core\Database;

class PagesController
{
    public function __construct(
        private Database $db,
        private int $userId,
    ) {}

    public function index()
    {
        $user = $this->db->query(
            'SELECT * FROM users WHERE id = ?',
            [$this->userId],
        )->find();

        $user = $user['name'] ?? 'Guest';

        view('index', ['user' => $user]);
    }

    public function about()
    {
        view('about');
    }
}
