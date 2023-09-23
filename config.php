<?php
// OOP style
$conn = new mysqli("localhost","root","","farmlink_sacco");

// Check connection
if ($conn->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
?>