<?php
$host = "localhost";
$username = "root";
$password = "mysql"; // Ungaloda Java code-la irundha exact password-ah inga kuduthruken
$database = "onlineshoppingdb";

// Create connection using MySQLi
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>