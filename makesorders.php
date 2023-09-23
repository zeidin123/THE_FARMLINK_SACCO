<!DOCTYPE html>
<html>
<head>
    <title>Total Orders</title>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Orders Made</h5>
                    <?php
                    // Include the get_total_orders.php file
                    include('get_total_orders.php');

                    // Display the total orders
                    echo "<p class='card-text'>$totalOrders</p>";
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!DOCTYPE html>
<html>
<head>
    <title>Create Orders</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom styling for the heading */
        .create-orders-heading {
            font-weight: bold;
            font-size: 24px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <h2 class="create-orders-heading">CREATE ORDERS</h2>
            <form action="process_order.php" method="post">
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" required>
                </div>
                <div class="form-group">
                    <label for="date">Date:</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <div class="form-group">
                    <label for="paymentStatus">Payment Status:</label>
                    <select class="form-control" id="paymentStatus" name="paymentStatus">
                        <option value="pending">Pending</option>
                        <!-- Add other payment status options as needed -->
                    </select>
                </div>
               
                <div class="form-group">
                    <label for="orderStatus">Order Status:</label>
                    <select class="form-control" id="orderStatus" name="orderStatus">
                        <option value="pending">Pending</option>
                        <!-- Add other order status options as needed -->
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
<?php
// Include your database connection code
include 'config.php';

// Initialize variables
$editID = '';
$quantity = '';
$date = '';
$paymentStatus = '';
$orderStatus = '';

// Check if an OrderID parameter is provided in the URL for editing
if (isset($_GET['editID'])) {
    $editID = $_GET['editID'];

    // Query to retrieve the order details by OrderID (replace with your table name)
    $sql = "SELECT * FROM `order` WHERE OrderID = $editID";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Fetch the order details
        $row = $result->fetch_assoc();
        $quantity = $row['Quantity'];
        $date = $row['Date'];
        $paymentStatus = $row['PaymentStatus'];
        $orderStatus = $row['OrderStatus'];
    } else {
        echo "Order not found.";
    }
}

// Handle form submission for editing
if (isset($_POST['editOrder'])) {
    $editID = $_POST['editID'];
    $newQuantity = $_POST['quantity'];
    $newDate = $_POST['date'];
    $newPaymentStatus = $_POST['paymentStatus'];
    $newOrderStatus = $_POST['orderStatus'];

    // Update the order in the database (replace with your table name)
    $updateSql = "UPDATE `order` SET Quantity='$newQuantity', Date='$newDate', PaymentStatus='$newPaymentStatus', OrderStatus='$newOrderStatus' WHERE OrderID='$editID'";
    if ($conn->query($updateSql) === TRUE) {
        echo "Order updated successfully.";
    } else {
        echo "Error updating order: " . $conn->error;
    }
}

// Check if an OrderID parameter is provided in the URL for deletion
if (isset($_GET['deleteID'])) {
    $deleteID = $_GET['deleteID'];

    // Query to delete the order by OrderID (replace with your table name)
    $deleteSql = "DELETE FROM `order` WHERE OrderID='$deleteID'";
    if ($conn->query($deleteSql) === TRUE) {
        echo "Order deleted successfully.";
    } else {
        echo "Error deleting order: " . $conn->error;
    }
}

// Query to retrieve recent orders (replace with your table name)
$sql = "SELECT * FROM `order` ORDER BY OrderID DESC LIMIT 10"; // Limit to the last 10 orders, for example

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Recent Orders</h2>";
    echo "<table class='table'>";
    echo "<thead><tr><th>OrderID</th><th>Quantity</th><th>Date</th><th>Payment Status</th><th>Order Status</th><th>Actions</th></tr></thead><tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['OrderID'] . "</td>";
        echo "<td>" . $row['Quantity'] . "</td>";
        echo "<td>" . $row['Date'] . "</td>";
        echo "<td>" . $row['PaymentStatus'] . "</td>";
        echo "<td>" . $row['OrderStatus'] . "</td>";

        // Add Edit and Delete buttons
        echo "<td>
            <a href='?editID=" . $row['OrderID'] . "' class='btn btn-primary btn-sm'>Edit</a>
            <a href='?deleteID=" . $row['OrderID'] . "' class='btn btn-danger btn-sm'>Delete</a>
        </td>";

        echo "</tr>";
    }

    echo "</tbody></table>";
} else {
    echo "No orders found.";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Add your CSS and JS includes here -->
</head>
<body>
    <h2>Edit Order</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
        Enter OrderID to Edit: <input type="number" name="editID">
        <input type="submit" value="Edit">
    </form>

    <?php if (!empty($editID)) : ?>
        <h3>Edit Order Details for OrderID: <?php echo $editID; ?></h3>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="hidden" name="editID" value="<?php echo $editID; ?>">
            <!-- Add your edit form inputs here -->
            Quantity: <input type="number" name="quantity" value="<?php echo $quantity; ?>" required><br>
            Date: <input type="date" name="date" value="<?php echo $date; ?>" required><br>
            Payment Status: <input type="text" name="paymentStatus" value="<?php echo $paymentStatus; ?>" required><br>
            Order Status: <input type="text" name="orderStatus" value="<?php echo $orderStatus; ?>" required><br>
            <input type="submit" name="editOrder" value="Update">
        </form>
    <?php endif; ?>
</body>
</html>
