<?php
session_start();
if (!isset($_SESSION['farmerID'])) {
    header("Location: farmerloginform.php");
    exit;
}
?>
<?php require __DIR__ . '/includes/sidebarfarmer.php';?>

<style>
    <?php include "css/style.css"?>
</style>

<!-- main-section -->
<div class="main-wrapper">
    <main id="view-panel">
        <!-- show sidebar page based on the page name in the GET request -->
        <?php $page = isset($_GET['page']) ? $_GET['page'] : 'viewFarmerDeliveries';
        include $page.'.php';
        ?>
    </main>
