<?php
// The employee should be logged in to access this page
// Include the necessary authentication check here
session_start();
if (!isset($_SESSION['traderID'])) {
    header("Location: traderform.html");
    exit;
}
?>

<?php require __DIR__ . '/includes/sidebartrader.php';?>

<style>
    <?php include "css/style.css"?>
</style>

<!-- main-section -->
<div class="main-wrapper">
    <main id="view-panel">
        <?php
        // show sidebar page based on the page name in the GET request
        $page = isset($_GET['page']) ? $_GET['page'] : 'makesorders';
        include $page.'.php';
        ?>
    </main>
</div>
