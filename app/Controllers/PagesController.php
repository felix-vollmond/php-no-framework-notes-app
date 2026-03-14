<?php

namespace App\Controllers;

use App\App;

use Core\Database;

class PagesController
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
