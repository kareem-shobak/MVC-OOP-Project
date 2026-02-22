<?php

require_once __DIR__ . '/../Helpers/view.php';
require_once __DIR__ . '/../Models/Product.php';
require_once __DIR__ . '/../Helpers/ApiResponse.php';

class ProductController
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new Product();
        header("Content-Type: application/json");
    }

    // Read
    public function index()
    {
        $products = $this->productModel->all();
        return view('products.index', ['products' => $products]);
    }

    // Show Create Form
    public function createForm()
    {
        return view('products.create');
    }

    // Create Product
    public function create()
    {
        $data = [
            'name' => $_POST['name'],
            'price' => $_POST['price']
        ];

        $this->productModel->create($data);
        header('Location: /products');
        exit;
    }

    // Show Edit Form
    public function editForm($id)
    {
        if (!$id) die('ID required');
        $product = $this->productModel->find($id);
        return view('products.edit', ['product' => $product]);
    }

    // Update Product
    public function update($id)
    {
        if (!$id) die('ID required');

        $data = [
            'name' => $_POST['name'],
            'price' => $_POST['price']
        ];

        $this->productModel->update($id, $data);
        header('Location: /products');
        exit;
    }

    // Delete Product
    public function delete($id)
    {
        if (!$id) die('ID required');

        $this->productModel->delete($id);
        header('Location: /products');
        exit;
    }


    /**      API       **/
    
    // API - Get all products
    public function allProducts(){

        try {

            $products = $this->productModel->all();

            ApiResponse::success(
                $products,
                'Products fetched successfully',
                200
            );

        } catch (Exception $e) {

            ApiResponse::error(
                'Failed to fetch products',
                500
            );

        }
    }

    // API - Get product with ID
    public function getProduct($id){
        try {

            if (!$id) {
                ApiResponse::error('Product ID is required', 400);
            }

            $product = $this->productModel->find($id);

            if (!$product) {
                ApiResponse::error('Product not found', 404);
            }

            ApiResponse::success(
                $product,
                'Product fetched successfully',
                200
            );

        } catch (Exception $e) {

            ApiResponse::error(
                'Server error',
                500
            );

        }
    } 

    // API - Add product
    public function addProduct()
    {

        try {

            $data = $this->getRequestData();

            $this->validate($data);

            $id = $this->productModel->create($data);

            ApiResponse::success(
                ['id' => $id],
                'Product created successfully',
                201
            );

        } catch (Exception $e) {

            ApiResponse::error(
                $e->getMessage(),
                400
            );

        }
    }
    
    // API - Edit Product
    public function editProduct($id)
    {   
       try {

            if (!$id) {
                ApiResponse::error('Product ID required', 400);
            }

            $data = $this->getRequestData();

            $this->validate($data);

            $product = $this->productModel->find($id);

            if (!$product) {
                ApiResponse::error('Product not found', 404);
            }

            $this->productModel->update($id, $data);

            ApiResponse::success(
                null,
                'Product updated successfully',
                200
            );

        } catch (Exception $e) {

            ApiResponse::error(
                $e->getMessage(),
                400
            );

        }
    }
    
    // API - Delete Product
    public function deleteProduct($id)
    {
        try {

            if (!$id) {
                ApiResponse::error('Product ID required', 400);
            }

            $product = $this->productModel->find($id);

            if (!$product) {
                ApiResponse::error('Product not found', 404);
            }

            $this->productModel->delete($id);

            ApiResponse::success(
                null,
                'Product deleted successfully',
                200
            );

        } catch (Exception $e) {

            ApiResponse::error(
                'Failed to delete product',
                500
            );

        }
    }

    private function getRequestData()
    {
        $input = json_decode(file_get_contents("php://input"), true);

        if ($input) {
            return $input;
        }

        return $_POST;
    }

    /**
     * Validation
     */
    private function validate($data)
    {
        if (!isset($data['name']) || empty($data['name'])) {
            throw new Exception('Name is required');
        }

        if (!isset($data['price']) || !is_numeric($data['price'])) {
            throw new Exception('Price is required');
        }
    }
}
