<?php
require_once 'Model.php';
class Product extends Model {
    public function __construct() {
        parent::__construct('products'); // Assuming 'Products' is the table name
    }

    public function createProduct($data) {
        return $this->create($data);
    }

    public function getAllProduct() {
        return $this->all();
    }
}
