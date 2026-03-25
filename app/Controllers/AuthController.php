<?php

namespace App\Controllers;

class AuthController
{
    public function showRegisterForm()
    {
        view('auth.register');
    }

    public function register()
    {
        // For now the route just prints the $_POST data
        dd($_POST);
    }
}
