<?php



require 'vendor/autoload.php';
require 'functions.php';
require 'models/User.php';
require 'models/Product.php';
require 'app/Router.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
if (!file_exists(__DIR__ . '/.env')) {
    throw new Exception(".env file not found.");
}

//var_dump($_ENV);


$router = new Router();
$router->get('/', 'UserController@index');
$router->get('/products', 'ProductController@index');
// Add this inside your Router class
$router->post('/products/create', 'ProductController@create');
// In Router.php
$router->post('/products/update/{id}', 'ProductController@update');
// In Router.php
$router->get('/products/edit/{id}', 'ProductController@edit');



// Dispatch the request
$router->dispatch($_SERVER['REQUEST_URI']);


$newUser = new User();
//dd($newUser);

$userModel = new User();
$productModel = new Product(); // Instantiate Product

//$newUserData = [
//    'name' => 'John Doe',
//    'email' => 'john@example.com',
//];
//$newProductData = [
//    'title' => 'Sample Product',
//    'description' => 'This is a sample product description.',
//    'price' => 19.99,
//];

//if ($userModel->createUser($newUserData)) {
//    echo "User created successfully!";
//} else {
//    echo "Failed to create user.";
//}

$users = $userModel->getAllUsers();
foreach ($users as $user) {
    echo "ID: " . $user['id'] . ", Name: " . $user['name'] . ", Email: " . $user['email'] . "<br>";
}

//if ($productModel->createProduct($newProductData)) {
//    echo "Product created successfully!";
//} else {
//    echo "Failed to create Product.";
//}

$products = $productModel->getAllProduct(); // Corrected variable name
foreach ($products as $product) {
    echo "ID: " . $product['id'] . ", Title: " . $product['title'] . ", Description: " . $product['description'] . ", Price: " . $product['price'] . "<br>";
}

