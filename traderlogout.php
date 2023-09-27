<?php
// Start the session (if not already started)
session_start();

// Unset all of the session variables
unset($_SESSION['traderID']);

// Destroy the session
session_destroy();

// Redirect the user to the index page or any other desired page
header("Location: traderform.html"); // Replace with your desired URL
exit();
?>
