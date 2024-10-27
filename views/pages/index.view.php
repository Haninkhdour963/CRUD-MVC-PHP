
  
<?php

require_once 'contextDb.php';
require_once 'UserController.php';

dd($_ENV(''));

// Database configuration
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'php-mvc';

// Create Database instance
$db = new contextDb($host, $username, $password, $database);

// Create UserController instance and inject Database
$userController = new UserController($db);

// Call the index method to display users
$userController->index();

// Close the database connection if needed
$db->close();

 require 'views/partials/header.php'?>
<main>
<h1>Hello, world!</h1>
</main>
<?php require 'views/partials/footer.php'?>

