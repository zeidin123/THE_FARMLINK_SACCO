<?php
// Include the database configuration
include 'config.php';

// SQL query to get the total number of orders
$sql = "SELECT COUNT(OrderID) AS TotalOrders FROM `order`";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalOrders = $row["TotalOrders"];
} else {
    $totalOrders = 0; // No orders found
}

$conn->close();
?>
