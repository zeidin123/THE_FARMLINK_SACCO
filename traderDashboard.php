<?php
// The employee should be logged in to access this page
// Include the necessary authentication check here
?>

<?php require __DIR__ . '/includes/sidebartrader.php';?>

<style>
    <?php include "css/style.css"?>
</style>

<!-- main-section -->
<div class="main-wrapper">
    <main id="view-panel">
        <?php
        // Determine which page to display based on the 'page' parameter
        $page = isset($_GET['page']) ? $_GET['page'] : 'makesorders';

        // Include different sections based on the 'page' parameter
        if ($page == 'makesorders') {
            include 'makesorders.php'; // Include your existing 'makesorders.php' content
        } else {
            // Handle cases when an invalid or unrecognized 'page' parameter is provided
            echo 'Invalid page request.';
        }
        ?>
    </main>
</div>
