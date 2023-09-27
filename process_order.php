<?php
// Include your database connection code
include 'config.php';

if (isset($_POST['createOrder'])) {
    # code...
}
$Quantity = $_POST['quantity'];
$Date = $_POST['date'];
$traderId = $_POST['traderID'];


// Insert data into the 'order' table (sreplace with your actual table name)
$sql = "INSERT INTO `order` (Quantity, Date, TraderID) VALUES ('$Quantity', '$Date', '$traderId')";

if ($conn->query($sql) === TRUE) {
    echo "Order added successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

