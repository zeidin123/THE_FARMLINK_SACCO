<?php
// The admin should be logged in to access this page
// session_start();
// if (!isset($_SESSION['auth'])) {
//     header("Location: login.php");
//     exit;
// }
?>
<?php require __DIR__ . '/includes/sidebarfarmer.php';?>

<style>
    <?php include "css/style.css"?>
</style>

<!-- main-section -->
<div class="main-wrapper">
    <main id="view-panel">
        <!-- show sidebar page based on the page name in the GET request -->
        <?php $page = isset($_GET['page']) ? $_GET['page'] : 'view-deliveries';
        include $page.'.php';
        ?>
        <?php $page2 = isset($_GET['page2']) ? $_GET['page2'] : 'view-payments';
        include $page2.'.php';
        ?>
    </main>
