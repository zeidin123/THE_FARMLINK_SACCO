<?php
// Include your database connection code
include 'config.php';
// Get values from the form
$Quantity = $_POST['quantity'];
$Date = $_POST['date'];
$PaymentStatus = $_POST['paymentStatus'];
$OrderStatus = $_POST['orderStatus'];

// Insert data into the 'order' table (sreplace with your actual table name)
$sql = "INSERT INTO `order` (Quantity, Date, PaymentStatus, OrderStatus) VALUES ('$Quantity', '$Date', '$PaymentStatus', '$OrderStatus')";

if ($conn->query($sql) === TRUE) {
    echo "Order added successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
