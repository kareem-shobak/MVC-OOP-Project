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
}
