<?php

require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Helpers/view.php';

class AuthController
{
    private $userModel;

    public function __construct()
    {
        // session_start();
        $this->userModel = new User();
    }

    // Show Register Form
    public function registerForm()
    {
        return view('auth.register');
    }

    // Handle Register
public function register()
{
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $this->userModel->createUser([
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'password' => $password
    ]);

    // احصل على user من database
    $user = $this->userModel->findByEmail($_POST['email']);

    // خزن user كامل
    $_SESSION['user'] = $user;

    header('Location: /');
    exit;
}


    // Show Login Form
    public function loginForm()
    {
        return view('auth.login');
    }

    // Handle Login
    public function login()
    {
        $user = $this->userModel->findByEmail($_POST['email']);

        if (!$user || !password_verify($_POST['password'], $user['password'])) {
            die('Invalid credentials');
        }

        $_SESSION['user'] = $user;
        header('Location: /');
        exit;
    }

    // Logout
    public function logout()
    {
        session_destroy();
        header('Location: /login');
        exit;
    }
}
