<?php
// Start the session (if not already started)
session_start();

// Check if the Sacco Employee is logged in (customize this condition as needed)
if (isset($_SESSION['saccoEmpLoggedIn']) && $_SESSION['saccoEmpLoggedIn'] === true) {
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect the user to the index page or any other desired page
    header("Location: index.php"); // Replace with your desired URL
    exit();
} else {
    // If the Sacco Employee is not logged in, you can handle this case accordingly
    header("Location: saccoemplogin.php"); // Redirect to the Sacco Employee login page
    exit();
}
?>
