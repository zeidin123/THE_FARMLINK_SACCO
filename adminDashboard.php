<?php
// The admin should be logged in to access this page
session_start();
if (!isset($_SESSION['adminID'])) {
    header("Location: AdminLogin.php");
    exit;
}
?>
<?php require __DIR__ . '/includes/sidebar.php';?>

<style>
    <?php include "css/style.css"?>
</style>

<!-- main-section -->
<div class="main-wrapper">
    <main id="view-panel">
        <!-- show sidebar page based on the page name in the GET request -->
        <?php $page = isset($_GET['page']) ? $_GET['page'] : 'Create-accounts';
        include $page.'.php';
        ?>
        
    </main>
    