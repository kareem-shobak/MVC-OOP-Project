<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function auth()
{
    return $_SESSION['user'] ?? null;
}

function isLoggedIn()
{
    return isset($_SESSION['user']);
}

function requireAuth()
{
    if (!isLoggedIn()) {
        header('Location: /login');
        exit;
    }
}

function requireGuest()
{
    if (isLoggedIn()) {
        header('Location: /');
        exit;
    }
}

function isAdmin()
{
    return auth() && auth()['role'] === 'admin';
}

function requireAdmin()
{
    if (!isAdmin()) {
        die('403 Forbidden');
    }
}
