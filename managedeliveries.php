<?php
include_once __DIR__ . "/includes/header.php";
?>

<h3>Welcome Emp<?php
if (isset($_SESSION['employeeID'])) {
    $id = $_SESSION['employeeID'];
    echo $id;
} 
?></h3>


<?php include_once __DIR__ . "/includes/footer.php";?>