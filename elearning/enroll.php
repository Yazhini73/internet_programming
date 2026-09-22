<?php
require_once 'config.php';
require_login();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $course_id = (int) $_POST['course_id'];
    $stmt = $conn->prepare("INSERT IGNORE INTO enrollments (user_id, course_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $_SESSION['user_id'], $course_id);
    $stmt->execute();
}
header("Location: dashboard.php");
exit;