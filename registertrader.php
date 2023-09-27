<?php
// start a session
session_start();

// Include the database connection file (config.php)
require_once __DIR__ . "/config.php";

// Process the trader login form
if (isset($_POST['loginTrader'])) {
    
    $loginName = $_POST["login-fullname"];
    $loginPassword = $_POST["login-password"];

    $query = $conn->prepare("SELECT * FROM trader WHERE FullName = ?");
    $query->bind_param("s", $loginName);
    $query->execute();
    $result = $query->get_result();
       if ($row = $result->fetch_assoc()) {

            $_SESSION['traderID'] = $row['TraderID'];
            
            header("Location: traderDashboard.php");
            exit;
       } 
       else {
            echo "User not found";
       }
}


// Process signup trader form
if (isset($_POST['signupTrader'])) {
    // Retrieve trader details from the form
    $FullName = $_POST["signup-fullname"];
    $ContactNumber = $_POST["signup-contactnumber"];
    $IDnumber = $_POST["signup-idnumber"];
    $Password = $_POST["signup-password"];

    // Hash the password for security
    // $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

    // SQL query to insert trader details into the database
    $sql = $conn->prepare("INSERT INTO trader(FullName, ContactNumber, IDnumber, Password) 
    VALUES (?, ?, ?, ?)");

    $sql->bind_param("ssss", $FullName, $ContactNumber, $IDnumber, $Password);
    $sql->execute(); 
    $result = $conn->insert_id;
    if ($result) {
        header("Location: traderform.html");
        exit;
    }
}


?>
