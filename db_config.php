<?php
$host = 'localhost';
$username = 'root';  // Default XAMPP MySQL username
$password = '';      // Default XAMPP MySQL password (blank)
$dbname = 'userdb';  // Your database name

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
