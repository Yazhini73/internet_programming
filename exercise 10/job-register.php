<?php
$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = trim($_POST['fullName'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $password = $_POST['password'] ?? '';
    $jobTitle = trim($_POST['jobTitle'] ?? '');
    $experience = trim($_POST['experience'] ?? '');
    $previousRole = trim($_POST['previousRole'] ?? '');
    $gender = $_POST['gender'] ?? '';
    $workMode = $_POST['workMode'] ?? '';
    $employmentType = $_POST['employmentType'] ?? '';
    $creditCard = trim($_POST['creditCard'] ?? '');

    if (empty($fullName)) {
        $errors[] = "Full Name is required.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid Email address is required.";
    }
    if (empty($phone) || !preg_match('/^[0-9]{10}$/', $phone)) {
        $errors[] = "Phone Number must be exactly 10 digits.";
    }
    if (empty($password) || strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters long.";
    }
    if (empty($jobTitle)) {
        $errors[] = "Desired Job Role is required.";
    }
    if ($experience === "" || !is_numeric($experience) || $experience < 0) {
        $errors[] = "Valid Years of Experience is required.";
    } else {
        if ($experience > 0 && empty($previousRole)) {
            $errors[] = "Previous Job Role is required since experience is greater than 0.";
        }
    }
    if (empty($gender)) {
        $errors[] = "Gender must be selected.";
    }
    if (empty($workMode)) {
        $errors[] = "Preferred Work Mode must be selected.";
    }
    if (empty($employmentType)) {
        $errors[] = "Employment Type must be selected.";
    }
    if (empty($creditCard) || !preg_match('/^[0-9]{16}$/', $creditCard)) {
        $errors[] = "Credit Card Number must be exactly 16 digits.";
    }
} else {
    header("Location: index.php");
    exit();
}

$maskedCard = "";
if (strlen($creditCard) == 16) {
    $maskedCard = "••••-••••-••••-" . substr($creditCard, -4);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registration Summary - DreamLauncher</title>
<style>
:root {
    --primary: #4f46e5;
    --primary-hover: #4338ca;
    --bg-color: #f3f4f6;
    --card-bg: #ffffff;
    --text-main: #1f2937;
    --text-muted: #6b7280;
    --border-color: #e5e7eb;
    --error-bg: #fef2f2;
    --error-border: #fecaca;
    --error-text: #dc2626;
    --success-accent: #10b981;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: var(--bg-color);
    color: var(--text-main);
    margin: 0;
    padding: 40px 20px;
}

.details-container {
    width: 100%;
    max-width: 650px;
    margin: 0 auto;
    background: var(--card-bg);
    padding: 35px;
    border-radius: 12px;
    box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.05);
}

h2 {
    text-align: center;
    color: var(--text-main);
    margin-top: 0;
    margin-bottom: 25px;
    font-size: 24px;
}

.success-title {
    color: var(--success-accent);
}

.error-title {
    color: var(--error-text);
}

.error-box {
    background-color: var(--error-bg);
    color: var(--error-text);
    padding: 18px;
    border-radius: 8px;
    border: 1px solid var(--error-border);
    margin-bottom: 25px;
}

.error-box ul {
    margin: 0;
    padding-left: 20px;
}

.error-box li {
    margin-bottom: 6px;
}

.error-box li:last-child {
    margin-bottom: 0;
}

.back-btn {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    background-color: var(--primary);
    color: white;
    text-decoration: none;
    border-radius: 6px;
    font-weight: 600;
    transition: background-color 0.2s ease;
}

.back-btn:hover {
    background-color: var(--primary-hover);
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

tr {
    transition: background-color 0.1s ease;
}

tr:hover {
    background-color: #f9fafb;
}

td {
    padding: 14px 12px;
    border-bottom: 1px solid var(--border-color);
    word-break: break-word;
    font-size: 15px;
}

td.label {
    font-weight: 600;
    color: var(--text-muted);
    width: 40%;
}

td.value {
    color: var(--text-main);
}
</style>
</head>
<body>
<div class="details-container">
<?php if (!empty($errors)): ?>
    <h2 class="error-title">Validation Failed</h2>
    <div class="error-box">
        <ul>
        <?php foreach ($errors as $error): ?>
            <li><?php echo htmlspecialchars($error); ?></li>
        <?php endforeach; ?>
        </ul>
    </div>
    <a href="javascript:history.back()" class="back-btn">Go Back and Fix Errors</a>
<?php else: ?>
    <h2 class="success-title">Registration Successful!</h2>
    <table>
        <tr>
            <td class="label">Full Name:</td>
            <td class="value"><?php echo htmlspecialchars($fullName); ?></td>
        </tr>
        <tr>
            <td class="label">Email:</td>
            <td class="value"><?php echo htmlspecialchars($email); ?></td>
        </tr>
        <tr>
            <td class="label">Phone Number:</td>
            <td class="value"><?php echo htmlspecialchars($phone); ?></td>
        </tr>
        <tr>
            <td class="label">Password:</td>
            <td class="value">••••••••</td>
        </tr>
        <tr>
            <td class="label">Desired Job Role:</td>
            <td class="value"><?php echo htmlspecialchars($jobTitle); ?></td>
        </tr>
        <tr>
            <td class="label">Years of Experience:</td>
            <td class="value"><?php echo htmlspecialchars($experience); ?> Years</td>
        </tr>
        <tr>
            <td class="label">Previous Job Role:</td>
            <td class="value">
            <?php 
                if (empty(trim($previousRole))) {
                    echo "Fresher";
                } else {
                    echo htmlspecialchars($previousRole);
                }
            ?>
            </td>
        </tr>
        <tr>
            <td class="label">Gender:</td>
            <td class="value"><?php echo htmlspecialchars($gender); ?></td>
        </tr>
        <tr>
            <td class="label">Preferred Work Mode:</td>
            <td class="value"><?php echo htmlspecialchars($workMode); ?></td>
        </tr>
        <tr>
            <td class="label">Employment Type:</td>
            <td class="value"><?php echo htmlspecialchars($employmentType); ?></td>
        </tr>
        <tr>
            <td class="label">Credit Card Number:</td>
            <td class="value"><?php echo htmlspecialchars($maskedCard); ?></td>
        </tr>
    </table>
    <div style="text-align: center;">
        <a href="index.php" class="back-btn">Back to Home</a>
    </div>
<?php endif; ?>
</div>
</body>
</html>