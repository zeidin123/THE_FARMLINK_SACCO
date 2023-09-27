<?php 
// start a session
session_start();

// Include the database connection file (config.php)
require_once __DIR__ . "/config.php";

// Initialize variables for error messages
$fnameError = $passwordError = $loginError = "";

// Initialize variables to hold user input
$fname = $password = "";

// Check if the form has been submitted
if (isset($_POST['adminLogin'])) {
    // Validate the username
    if (empty($_POST['fname'])) {
        $fnameError = "Username is required";
    } else {
        $fname = $_POST['fname'];
    }

    // Validate the password
    if (empty($_POST['password'])) {
        $passwordError = "Password is required";
    } else {
        $password = $_POST['password'];
    }

    // If both username and password are provided, proceed with login
    if (!empty($fname) && !empty($password)) {
        $sql = "SELECT * FROM admin WHERE FullName = ? AND Password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $fname, $password);
        if ($stmt->execute()) {
            $result = $stmt->get_result();

            // Check if a matching record was found
            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();

                // introduce a session to store admin id on the DB
                $_SESSION['adminID'] = $row['AdminID'];

                // Login successful, redirect to the dashboard
                header("Location: adminDashboard.php");
                exit();
            } else {
                $loginError = "Incorrect username or password";
            }
        } else {
            echo "Database error: " . $stmt->error;
        }
    }
}
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
    <form action="" method="post">
        <div class="container" id="login-container">
            <h2>Admin Login</h2>
            <input type="text" name="fname" placeholder="Full Name">
            <span style="color: red;"><?php echo $fnameError; ?></span> <!-- Display error message if username is empty -->
            <input type="password" id="login-password" name="password" placeholder="Password">
            <span style="color: red;"><?php echo $passwordError; ?></span> <!-- Display error message if password is empty -->
            <button id="login-button" type="submit" name="adminLogin">Login</button>
            <!-- <p class="toggle">Forgot your password? <span onclick="toggleForgotPasswordForm()">Reset it here</span></p> -->
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
    
        // function goBackToLogin() {
        //     loginContainer.style.display = 'block';
        //     forgotPasswordContainer.style.display = 'none';
        // }
    </script>
</body>
</html>
