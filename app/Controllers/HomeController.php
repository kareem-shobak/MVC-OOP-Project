<?php

require_once __DIR__ . '/../Helpers/view.php';
require_once __DIR__ . '/../Models/Product.php';
require_once __DIR__ . '/../Helpers/auth.php';
require_once __DIR__ . '/../Models/User.php';

class HomeController 
{
    public function __construct()
    {
        // session_start();
    }

    public function index()
    {
        $user = $_SESSION['user'] ?? null;

        return view('Home.home', compact('user'));
    }
}
