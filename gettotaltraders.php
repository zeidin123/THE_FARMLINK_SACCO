<?php
// Include the database configuration
include 'config.php';

// Query to get the total number of traders
$sql = "SELECT COUNT(*) AS totalTraders FROM trader"; // Adjust the table name accordingly

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalTraders = $row["totalTraders"];
} else {
    $totalTraders = 0;
}

// Close the database connection
$conn->close();

// Return the count as JSON
header('Content-Type: application/json');
echo json_encode(['totalTraders' => $totalTraders]);
?>
