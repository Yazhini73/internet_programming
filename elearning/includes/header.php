<?php require_once __DIR__ . '/../config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EduLearn - E-Learning Management System</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav class="navbar">
  <a class="brand" href="index.php">🎓 EduLearn</a>
  <div class="links">
    <a href="index.php">Home</a>
    <a href="courses.php">Courses</a>
    <?php if (isset($_SESSION['user_id'])): ?>
      <a href="dashboard.php">Dashboard</a>
      <a class="nav-btn" href="logout.php">Logout (<?= htmlspecialchars($_SESSION['user_name']) ?>)</a>
    <?php else: ?>
      <a href="login.php">Login</a>
      <a class="nav-btn" href="register.php">Register</a>
    <?php endif; ?>
  </div>
</nav>
<main class="container">