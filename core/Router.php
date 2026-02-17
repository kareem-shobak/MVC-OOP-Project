<?php

class Router
{
    public function handleRequest()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        // Helpers
        require_once __DIR__ . '/../app/Helpers/view.php';
        require_once __DIR__ . '/../app/Helpers/auth.php';

        /*
        |--------------------------------------------------------------------------
        | Public Routes (Guest)
        |--------------------------------------------------------------------------
        */

        // Home
        if ($uri === '/') {
            requireAuth();
            require_once __DIR__ . '/../app/Controllers/HomeController.php';
            (new HomeController())->index();
            return;
        }

        // Register
        if ($uri === '/register' && $method === 'GET') {
            requireGuest();
            require_once __DIR__ . '/../app/Controllers/AuthController.php';
            (new AuthController())->registerForm();
            return;
        }


        /**   Start  API       **/

             // display all products 
         if ($uri === '/api/products' && $method === 'GET') {
            requireGuest();
            require_once __DIR__ . '/../app/Controllers/ProductController.php';
            (new ProductController())->allProducts();
            return;
        }
            // diplay a specific product 
        if (preg_match('#^/api/product/(\d+)$#', $uri, $matches) && $method === 'GET') {
            requireGuest();
            require_once __DIR__ . '/../app/Controllers/ProductController.php';
            $id = $matches[1];
            (new ProductController())->getProduct($id);
            return;
        }
        
            // add new product 
         if ($uri === '/api/add/product' && $method === 'POST') {
            requireGuest();
            require_once __DIR__ . '/../app/Controllers/ProductController.php';
            (new ProductController())->addProduct();
            return;
        }

            // Edit product 
         if (preg_match('#^/api/edit/product/(\d+)$#', $uri, $matches) && $method === 'POST') {
            requireGuest();
            require_once __DIR__ . '/../app/Controllers/ProductController.php';
            $id = $matches[1];
            (new ProductController())->editProduct($id);
            return;
        }

        if (preg_match('#^/api/delete/product/(\d+)$#', $uri, $matches) && $method === 'DELETE') {
            requireGuest();
            require_once __DIR__ . '/../app/Controllers/ProductController.php';
            $id = $matches[1];
            (new ProductController())->deleteProduct($id);
            return;
        }

        /**   End  API       **/

        if ($uri === '/register' && $method === 'POST') {
            requireGuest();
            require_once __DIR__ . '/../app/Controllers/AuthController.php';
            (new AuthController())->register();
            return;
        }

        // Login
        if ($uri === '/login' && $method === 'GET') {
            requireGuest();
            require_once __DIR__ . '/../app/Controllers/AuthController.php';
            (new AuthController())->loginForm();
            return;
        }

        if ($uri === '/login' && $method === 'POST') {
            requireGuest();
            require_once __DIR__ . '/../app/Controllers/AuthController.php';
            (new AuthController())->login();
            return;
        }

        /*
        |--------------------------------------------------------------------------
        | Authenticated Routes
        |--------------------------------------------------------------------------
        */

        // Logout
        if ($uri === '/logout') {
            requireAuth();
            require_once __DIR__ . '/../app/Controllers/AuthController.php';
            (new AuthController())->logout();
            return;
        }

        // Products
        if ($uri === '/products' && $method === 'GET') {
            requireAuth();
            require_once __DIR__ . '/../app/Controllers/ProductController.php';
            (new ProductController())->index();
            return;
        }

        if ($uri === '/products/create' && $method === 'GET') {
            requireAuth();
            require_once __DIR__ . '/../app/Controllers/ProductController.php';
            (new ProductController())->createForm();
            return;
        }

        if ($uri === '/products/create' && $method === 'POST') {
            requireAuth();
            require_once __DIR__ . '/../app/Controllers/ProductController.php';
            (new ProductController())->create();
            return;
        }

        if ($uri === '/products/edit' && $method === 'GET') {
            requireAuth();
            require_once __DIR__ . '/../app/Controllers/ProductController.php';
            (new ProductController())->editForm($_GET['id'] ?? null);
            return;
        }

        if ($uri === '/products/edit' && $method === 'POST') {
            requireAuth();
            require_once __DIR__ . '/../app/Controllers/ProductController.php';
            (new ProductController())->update($_GET['id'] ?? null);
            return;
        }

        /*
        |--------------------------------------------------------------------------
        | Admin Only Routes
        |--------------------------------------------------------------------------
        */

        if ($uri === '/products/delete') {
            requireAuth();
            requireAdmin();
            require_once __DIR__ . '/../app/Controllers/ProductController.php';
            (new ProductController())->delete($_GET['id'] ?? null);
            return;
        }

        /*
        |--------------------------------------------------------------------------
        | 404
        |--------------------------------------------------------------------------
        */
        http_response_code(404);
        echo "404 - Page Not Found";
    }
}
