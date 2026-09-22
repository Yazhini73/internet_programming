<?php
require_once 'config.php';
$error = ""; $success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if ($name === "" || $email === "" || strlen($password) < 6) {
        $error = "Fill all fields. Password must be at least 6 characters.";
    } else {
        $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $error = "Email already registered.";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $hash);
            if ($stmt->execute()) {
                $success = "Registration successful! You can now log in.";
            } else {
                $error = "Something went wrong. Try again.";
            }
        }
    }
}
include 'includes/header.php';
?>

<div class="form-box">
  <h2>Create Account</h2>
  <?php if ($error): ?><div class="error"><?= $error ?></div><?php endif; ?>
  <?php if ($success): ?><div class="success"><?= $success ?></div><?php endif; ?>

  <form method="POST" id="registerForm">
    <input type="text" name="name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" id="password" placeholder="Password" required>
    <input type="password" id="confirm" placeholder="Confirm Password" required>
    <button class="btn" type="submit">Register</button>
  </form>
</div>

<?php include 'includes/footer.php'; ?>