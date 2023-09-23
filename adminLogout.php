<?php
// Start the session (if not already started)
session_start();

// Check if the admin user is logged in (you can customize this condition as needed)
if (isset($_SESSION['adminLoggedIn']) && $_SESSION['adminLoggedIn'] === true) {
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect the user to the index page or any other desired page
    header("Location: index.php"); // Replace with your desired URL
    exit();
} else {
    // If the admin user is not logged in, you can handle this case accordingly
    header("Location: index.php"); // Redirect to the admin login page
    exit();
}
?>
