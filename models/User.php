<?php
require 'Model.php';
class User extends Model {
    public function __construct() {
        parent::__construct('users'); // Assuming 'users' is the table name
    }

    public function createUser($data) {
        return $this->create($data);
    }

    public function getAllUsers() {
        return $this->all();
    }
}
