<?php

namespace App\Controllers\Auth;

use Core\Database;

class SessionsController
{
    public function __construct(private Database $db) {}

    public function create()
    {
        view('auth.login');
    }

    public function store()
    {
        // This data should be validated
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;

        $user = $this->db
            ->query(
                'SELECT * FROM users WHERE email = :email',
                ['email' => $email],
            )
            ->find();

        if (
            $user === false
            || ! password_verify($password, $user['password_hash'])
        ) {
            redirect('/login');
        }

        session_regenerate_id(true);

        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $user['name'],
        ];

        redirect('/');
    }

    public function destroy()
    {
        //
    }
}
