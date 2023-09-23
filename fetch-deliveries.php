<?php
// Include your database connection code here (e.g., PDO or mysqli)

// Query to retrieve DeliveryID and FarmerID from the Delivery table
$query = "SELECT D.DeliveryID, D.FarmerID
          FROM Delivery AS D
          INNER JOIN Farmer AS F ON D.FarmerID = F.FarmerID";

// Execute the query and fetch data
// Replace this with your database connection code
$deliveries = []; // Array to store the delivery data
foreach ($result as $row) {
    $deliveries[] = [
        'DeliveryID' => $row['DeliveryID'],
        'FarmerID' => $row['FarmerID']
    ];
}

// Return the data as JSON response
header('Content-Type: application/json');
echo json_encode($deliveries);
