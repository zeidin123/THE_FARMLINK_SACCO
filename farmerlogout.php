<?php
// Start the session (if not already started)
session_start();

// Unset all of the session variables
unset($_SESSION['farmerID']);

// Destroy the session
session_destroy();

// Redirect the user to the index page or any other desired page
header("Location: farmerloginform.php"); // Replace with your desired URL
    exit();
?>
