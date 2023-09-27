<?php
// Initialize the session
session_start();

// Include the database connection file (config.php)
require_once __DIR__ . "/config.php";

// Process the employee login form
if (isset($_POST['employeeLogin'])) {
    $fname = $_POST['fname'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM employees WHERE FullName = ? AND Password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $fname, $password);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            // Store the logged-in employee's ID and TraderID in the session (if needed)
            $_SESSION['employeeID'] = $row['EmpID'];
            // $_SESSION['traderID'] = $row['TraderID']; // Assuming TraderID is available in employee table

            // Redirect to the employee dashboard upon successful login
            header("Location: saccoempdashboard.php");
            exit();
        } else {
            // Handle cases where login credentials are incorrect
            echo "Incorrect Login details.";
        }
    } else {
        echo "Error executing the query: " . $stmt->error;
    }
}
?>


<!-- Rest of your HTML code -->

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
    </style>
</head>
<body>
    <form action="" method="post">
        <div class="container">
            <h2>Employee Login</h2>
            <input type="text" name="fname" placeholder="Full Name">
            <input type="password" id="login-password" name="password" placeholder="Password">
            <button type="submit" name="employeeLogin">Login</button>
        </div>
    </form>
</body>
</html>
