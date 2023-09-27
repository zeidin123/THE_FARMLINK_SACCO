<?php 
include_once __DIR__ . "/includes/header.php";
require __DIR__ . "/config.php";

// Process create order form
if (isset($_POST['createOrder'])) {
    $Quantity = $_POST['quantity'];
    $Date = $_POST['date'];
    $traderId = $_POST['traderID'];
    $paymentStatus = $_POST['paymentStatus'];
    $orderStatus = $_POST['orderStatus'];

    // Insert data into the 'order' table (replace with your actual table name)
    $sql = "INSERT INTO `order`(Quantity, Date, PaymentStatus, TraderID, OrderStatus) 
    VALUES('$Quantity', '$Date', '$paymentStatus', '$traderId', '$orderStatus')";
    $result = mysqli_query($conn, $sql);
}
?>

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


<!-- Create order form -->
<div class="container">
    <div class="row justify-content-md-center my-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>CREATE ORDERS</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <!-- hidden field to pass the trader session id. This will be stored on the TraderID column in the DB -->
                        <input type="hidden" name="traderID" value="
                        <?php if (isset($_SESSION['traderID'])) {
                        $traderId = $_SESSION['traderID'];
                        echo $traderId;
                    } ?>">

                    <!-- Pass the Payment status and order status as hidden inputs with pending as their initial value
                This will be updated on the employee side-->
                    <input type="hidden" name="paymentStatus" value="Pending">
                    <input type="hidden" name="orderStatus" value="Pending">

                        <div class="form-group mb-3">
                            <label for="quantity">Quantity(Kgs):</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="orderDate">Date:</label>
                            <input type="date" class="form-control" name="date" id="orderDate" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="createOrder">Create Order</button>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</div>
    
<?php include_once __DIR__ . "/includes/footer.php"?>


