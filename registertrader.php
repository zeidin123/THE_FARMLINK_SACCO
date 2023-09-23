<?php
// Include the database connection file (config.php)
require_once __DIR__ . "/config.php";

// Check if the connection is successful
if ($conn === false) {
    die("Error: Connection failed: " . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve trader details from the form
    $FirstName = $_POST["signup-firstname"];
    $LastName = $_POST["signup-lastname"];
    $ContactNumber = $_POST["signup-contactnumber"];
    $IDnumber = $_POST["signup-idnumber"];
    $Password = $_POST["signup-password"];

    // Hash the password for security
    $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

    // SQL query to insert trader details into the database
    $sql = "INSERT INTO trader (FirstName, LastName, ContactNumber, IDnumber, Password) 
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $FirstName, $LastName, $ContactNumber, $IDNumber, $hashedPassword);

// Set the parameter values and execute the statement
$FirstName = $_POST["signup-firstname"];
$LastName = $_POST["signup-lastname"];
$ContactNumber = $_POST["signup-contactnumber"];
$IDNumber = $_POST["signup-idnumber"];
$Password = $_POST["signup-password"];

if ($stmt->execute()) {
    echo "Trader registration successful!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
}
?>