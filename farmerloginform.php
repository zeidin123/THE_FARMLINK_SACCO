<?php
session_start();
// Include the database connection file (config.php)
require_once __DIR__ . "/config.php";

// Initialize variables for error messages
$fullNameError = $passwordError = $loginError = "";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate the FullName
    if (empty($_POST["FullName"])) {
        $fullNameError = "Full Name is required";
    } else {
        $fullName = $_POST["FullName"];
    }

    // Validate the password
    if (empty($_POST["password"])) {
        $passwordError = "Password is required";
    } else {
        $password = $_POST["password"];
    }

    // If both FullName and password are provided, proceed with login
    if (!empty($fullName) && !empty($password)) {
        // SQL query to check if the provided credentials are valid
        $sql = "SELECT * FROM farmers WHERE `FullName` = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $fullName);
            $stmt->execute();
            $result = $stmt->get_result();

            // Check if a row with the provided FullName exists
            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();
                // Verify the password (you should use password hashing)
                if ($password === $row['Password']) {

                    $_SESSION['farmerID'] = $row['FarmerID'];
                    // Authentication successful
                    header("Location: farmerDashboard.php");
                    exit();
                } else {
                    // Incorrect password
                    $loginError = "Invalid Password. Please try again.";
                }
            } else {
                // FullName not found
                $loginError = "Invalid Full Name. Please try again.";
            }

            $stmt->close();
        } else {
            echo "Error in preparing the SQL statement.";
        }
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 300px;
            padding: 20px;
            text-align: center;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        h2 {
            margin: 0 0 20px;
        }
        input {
            width: 90%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #0cbb3d;
            color: white;
            border: none;
            cursor: pointer;
        }
        .forgot-password {
            display: none;
        }
        .toggle {
            color: #07d65d;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form action="farmerloginform.php" method="post">
        <div class="container" id="login-container">
            <h2>Farmer Login</h2>
            <input type="text" id="login-idnumber" name="FullName" placeholder="Full Name">
            <input type="password" id="login-password" name="password" placeholder="Password">
            <button id="login-button" type="submit">Login</button>
            <p class="toggle">Forgot your password? <span onclick="toggleForgotPasswordForm()">Reset it here</span></p>
        </div>
    </form>

    <form action="farmerlogin.php" method="post" class="forgot-password" id="forgot-password-container">
        <div class="container">
            <h2>Reset Password (Farmer)</h2>
            <input type="text" id="reset-idnumber" name="idnumber" placeholder="ID Number">
            <input type="password" id="reset-password" name="new_password" placeholder="New Password">
            <button type="submit">Reset Password</button>
            <button id="go-back-button" type="button" onclick="goBackToLogin()" style="background-color: white; color: #007bff;">&#8592;Go Back to Login</button>
        </div>
    </form>

    <script>
        // Define the variables globally to be accessed by both functions
        const loginContainer = document.getElementById('login-container');
        const forgotPasswordContainer = document.getElementById('forgot-password-container');

        function toggleForgotPasswordForm() {
            loginContainer.style.display = 'none';
            forgotPasswordContainer.style.display = 'block';
        }
    
        function goBackToLogin() {
            loginContainer.style.display = 'block';
            forgotPasswordContainer.style.display = 'none';
        }
    </script>
</body>
</html>
