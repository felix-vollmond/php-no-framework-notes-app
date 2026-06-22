<?php

declare(strict_types=1);

namespace App\Controllers\Auth;

use Core\Database\Database;

class RegisteredUserController
{
    public function __construct(private Database $db) {}

    public function create()
    {
        view('auth.register');
    }

    public function store()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $name = $_POST['name'] ?? '';

        // The validation will be performed properly soon
        if (
            !filter_var($email, FILTER_VALIDATE_EMAIL)
            || strlen($password) < 7 || strlen($password) > 255
            || empty($name)
        ) {
            redirect('/register');
        }

        $query = <<<QUERY
            INSERT INTO users (email, password_hash, name)
                   VALUES (:email, :password, :name)
        QUERY;

        $this->db->query($query, [
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'name' => $name,
        ]);

        // A user session should be created here
        redirect('/');
    }
}
