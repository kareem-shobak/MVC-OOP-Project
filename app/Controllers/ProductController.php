<?php

require_once __DIR__ . '/../Helpers/view.php';
require_once __DIR__ . '/../Models/Product.php';

class ProductController
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new Product();
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
        $products = $this->productModel->all();
        echo json_encode([
            'status' => 'success',
            'message' => 'all the product returned successfuly',
            'code' => 200,
            'data' => $products
        ]);
    }

    // API - Get product with ID
    public function getProduct($id){
        if (!$id) die('ID required');
        $product = $this->productModel->find($id);
        echo json_encode([
            'status' => 'success',
            'message' => 'single product returned successfuly',
            'code' => 200,
            'data' => $product
        ]);
    } 

    // API - Add product
    public function addProduct()
    {
        $data = 
        [
            'name' => $_POST['name'],
            'price' => $_POST['price'],
        ];

        $this->productModel->create($data);

        echo json_encode([
            'status' => 'success',
            'message' => 'product added successfuly',
            'code' => 201
        ]);
    }
    
    // API - Edit Product
    public function editProduct($id)
    {   

        try {
            $data = 
        [
            'name' => $_POST['name'],
            'price' => $_POST['price'],
        ];

        $this->productModel->update($id,$data);

        
        echo json_encode([
            'status' => 'success',
            'message' => 'product edited successfuly',
            'code' => 204
        ]);
        } catch (Exception $e) {
            echo json_encode([
            'status' => 'error',
            'message' => 'product not found',
            'code' => 404
        ]);

        }
    }
    
    // API - Delete Product
    public function deleteProduct($id)
    {
        $this->productModel->delete($id);
        
        echo json_encode([
            'status' => 'success',
            'message' => 'product deleted successfuly',
            'code' => 204
        ]);

    }
}
