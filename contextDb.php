<?php
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Check that the environment variables are set
$host = getenv('DB_SERVER');
$username = getenv('DB_USERNAME');
$password = getenv('DB_PASSWORD');
$database = getenv('DB_DATABASE');

// Debugging line
//var_dump($host, $username, $password, $database); // Check the values

if (empty($host) || empty($username) || empty($password) || empty($database)) {
    throw new Exception("Database connection parameters are not set in the .env file.");
}


class ContextDb {
    private $host;
    private $username;
    private $password;
    private $database;
    private $connection;

    public function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->connect();
    }

    private function connect() {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        try {
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
        } catch (mysqli_sql_exception $e) {
            throw new Exception("Connection failed: " . $e->getMessage());
        }
    }

    public function query($sql) {
        return $this->connection->query($sql);
    }

    public function fetchAll($result) {
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function fetch($result) {
        return $result->fetch_assoc();
    }

    public function close() {
        $this->connection->close();
    }
}

// Create a new ContextDb instance using values from the .env file
$db = new ContextDb($host, $username, $password, $database);

// Example usage (you can comment this out if not needed):
// $result = $db->query("SELECT * FROM some_table");
// $data = $db->fetchAll($result);
// print_r($data);
