<?php
// Include database credentials
require_once 'config.php';

// Connect to MySQL server (without specifying database yet)
$conn = new mysqli($host, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error . " - Please check if your MySQL server is running and the password is correct.");
}

// Create database if it does not exist
$sql_create_db = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql_create_db) === FALSE) {
    die("Error creating database: " . $conn->error);
}

// Select the database to use
$conn->select_db($dbname);

// Create the 'tasks' table if it does not exist
$sql_create_table = "CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    task VARCHAR(255) NOT NULL,
    status VARCHAR(20) DEFAULT 'pending'
)";

if ($conn->query($sql_create_table) === FALSE) {
    die("Error creating table: " . $conn->error);
}
?>
