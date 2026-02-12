<?php

require_once __DIR__ . '/../Helpers/view.php';
require_once __DIR__ . '/../Models/Product.php';
require_once __DIR__ . '/../Helpers/auth.php';
require_once __DIR__ . '/../Models/User.php';

class HomeController 
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function index(){
        $user = $this->userModel->findByEmail($_SESSION['user']);
        return view('Home.home',['user' => $user]);
    }
}