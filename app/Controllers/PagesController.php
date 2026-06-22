<?php

namespace App\Controllers;

use Core\Database\Database;

class PagesController
{
    public function __construct(
        private Database $db,
    ) {}

    public function index()
    {
        $user = $_SESSION['user']['name'] ?? 'Guest';

        view('index', ['user' => $user]);
    }

    public function about()
    {
        view('about');
    }
}
