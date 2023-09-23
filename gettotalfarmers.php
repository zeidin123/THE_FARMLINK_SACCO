<?php
// Include the database configuration
include 'config.php';

// Query to get the total number of farmers
$sql = "SELECT COUNT(*) AS totalFarmers FROM farmers"; // Adjust the table name accordingly

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalFarmers = $row["totalFarmers"];
} else {
    $totalFarmers = 0;
}

// Close the database connection
$conn->close();

// Return the count as JSON
header('Content-Type: application/json');
echo json_encode(['totalFarmers' => $totalFarmers]);
?>
