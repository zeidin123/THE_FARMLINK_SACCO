<?php
// Start the session (if not already started)
session_start();

// Check if the Sacco Employee is logged in (customize this condition as needed)
unset($_SESSION['employeeID']);

// Destroy the session
session_destroy();

// Redirect the user to the index page or any other desired page
header("Location: saccoemplogin.php"); // Replace with your desired URL
exit();

?>
