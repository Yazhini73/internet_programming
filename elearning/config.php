<?php
session_start();
$conn = new mysqli("localhost", "root", "", "elearning_db");
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

function require_login() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }
}