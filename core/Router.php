<?php

class Router
{
    public function handleRequest()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        require_once __DIR__ . '/../app/Helpers/view.php';

        // ================== Products Routes ==================
        if ($uri === '/products') {
            require_once __DIR__ . '/../app/Controllers/ProductController.php';
            $controller = new ProductController();
            $controller->index();

        } elseif ($uri === '/products/create' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            require_once __DIR__ . '/../app/Controllers/ProductController.php';
            $controller = new ProductController();
            $controller->createForm();

        } elseif ($uri === '/products/create' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once __DIR__ . '/../app/Controllers/ProductController.php';
            $controller = new ProductController();
            $controller->create();

        } elseif ($uri === '/products/edit' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            require_once __DIR__ . '/../app/Controllers/ProductController.php';
            $controller = new ProductController();
            $controller->editForm($_GET['id'] ?? null);

        } elseif ($uri === '/products/edit' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once __DIR__ . '/../app/Controllers/ProductController.php';
            $controller = new ProductController();
            $controller->update($_GET['id'] ?? null);

        } elseif ($uri === '/products/delete') {
            require_once __DIR__ . '/../app/Controllers/ProductController.php';
            $controller = new ProductController();
            $controller->delete($_GET['id'] ?? null);

        } else {
            echo "404 - Page Not Found";
        }
    }
}
