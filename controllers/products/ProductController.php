<?php

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new Product(); // Instantiate Product model
    }

    public function index() {
        $products = $this->productModel->getAllProduct();

        // Render view (for example, using a simple echo for demonstration)
        foreach ($products as $product) {
            echo $product['title'] . '<br>'; // Changed to 'title' to match the data
        }
    }

    public function create() {
        // Check if the request is a POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Collect data from POST request
            $data = [
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
            ];

            // Create a new product
            if ($this->productModel->createProduct($data)) {
                echo "Product created successfully!";
            } else {
                echo "Failed to create product.";
            }
        } else {
            echo "Invalid request method.";
        }
    }

    // In ProductController.php

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Collect data from POST request
            $data = [
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
            ];

            // Update the product
            if ($this->productModel->update($id, $data)) {
                echo "Product updated successfully!";
            } else {
                echo "Failed to update product.";
            }
        } else {
            echo "Invalid request method.";
        }
    }

// Method to display the update form
    public function edit($id) {
        $product = $this->productModel->find($id);
        require 'views/products/update.view.php';
    }


}
