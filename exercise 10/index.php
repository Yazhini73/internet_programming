<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Job Seeker Registration</title>
<style>
:root {
    --primary: #4f46e5;
    --primary-hover: #4338ca;
    --bg-color: #f3f4f6;
    --card-bg: #ffffff;
    --text-main: #1f2937;
    --text-muted: #6b7280;
    --border-color: #d1d5db;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: var(--bg-color);
    color: var(--text-main);
    display: flex;
    justify-content: center;
    padding: 40px 20px;
    margin: 0;
}

.form-box {
    background: var(--card-bg);
    width: 100%;
    max-width: 900px;
    padding: 35px;
    border-radius: 12px;
    box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.05);
}

h2 {
    text-align: center;
    color: var(--text-main);
    margin-top: 0;
    margin-bottom: 30px;
    font-size: 26px;
}

#registrationForm {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.full {
    grid-column: 1 / 3;
}

label {
    display: block;
    margin-bottom: 6px;
    font-weight: 600;
    font-size: 14px;
    color: var(--text-main);
}

input, select {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid var(--border-color);
    border-radius: 6px;
    box-sizing: border-box;
    font-size: 14px;
    transition: border-color 0.2s, box-shadow 0.2s;
}

input:focus, select:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.15);
}

.radio-group {
    display: flex;
    gap: 20px;
    align-items: center;
    padding-top: 6px;
}

.radio-group label {
    font-weight: normal;
    margin-bottom: 0;
    cursor: pointer;
}

.radio-group input {
    width: auto;
    margin-right: 6px;
    cursor: pointer;
}

button {
    width: 100%;
    padding: 12px;
    background-color: var(--primary);
    color: white;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.2s ease;
    margin-top: 10px;
}

button:hover {
    background-color: var(--primary-hover);
}

@media (max-width: 768px) {
    #registrationForm {
        grid-template-columns: 1fr;
    }
    .full {
        grid-column: 1;
    }
}
</style>
</head>
<body>
<div class="form-box">
    <h2>Job Registration</h2>
    <form id="registrationForm" action="job-register.php" method="post">
        <div>
            <label>Full Name</label>
            <input type="text" name="fullName" placeholder="Enter full name">
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" placeholder="Enter email">
        </div>
        <div>
            <label>Phone Number</label>
            <input type="text" name="phone" placeholder="Enter 10-digit phone number" maxlength="10">
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" placeholder="At least 6 characters">
        </div>
        <div>
            <label>Desired Job Role</label>
            <input type="text" name="jobTitle" placeholder="Enter job role">
        </div>
        <div>
            <label>Years of Experience</label>
            <input type="number" name="experience" min="0" placeholder="Enter years of experience eg. 2">
        </div>
        <div>
            <label>Previous Job Role</label>
            <input type="text" name="previousRole" placeholder="Enter previous job role (if any)">
        </div>
        <div>
            <label>Gender</label>
            <select name="gender">
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <div>
            <label>Preferred Work Mode</label>
            <div class="radio-group">
                <label><input type="radio" name="workMode" value="Remote"> Remote</label>
                <label><input type="radio" name="workMode" value="Offline"> Offline</label>
            </div>
        </div>
        <div>
            <label>Employment Type</label>
            <div class="radio-group">
                <label><input type="radio" name="employmentType" value="Full Time"> Full Time</label>
                <label><input type="radio" name="employmentType" value="Part Time"> Part Time</label>
            </div>
        </div>
        <div class="full">
            <label>Credit Card Number</label>
            <input type="text" name="creditCard" maxlength="16" placeholder="Enter 16-digit credit card number">
        </div>
        <div class="full">
            <button type="submit">Register</button>
        </div>
    </form>
</div>
</body>
</html>