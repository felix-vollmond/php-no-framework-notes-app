<?php

namespace App;

use App\App;

class PagesController
{
    public function index()
    {
        $db = App::$database;
        $userId = App::$currentUserId;

        $user = $db->query('SELECT * FROM users WHERE id = ?', [$userId])->find();
        $user = $user['name'] ?? 'Guest';

        view('index', ['user' => $user]);
    }

    public function about()
    {
        view('about');
    }
}
