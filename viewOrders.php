<?php include_once __DIR__ . "/includes/header.php";
require __DIR__ . "/config.php";
?>

<div class="container-fluid">
    <div class="row mt-5">
        <!-- View Trader orders -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>My orders</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>Order Id</th>
                                <th>Full Name</th>
                                <th>Quantity</th>
                                <th>Date(dd-mm-yy)</th>
                                <th>Payment status</th>
                                <th>Order status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- get data from order and trader tables -->
                            <?php
                            $sql = $conn->prepare("SELECT order.OrderID, order.Quantity,
                            order.Date, order.PaymentStatus, order.OrderStatus, trader.FullName
                            FROM `order`
                            INNER JOIN `trader` 
                            ON order.TraderID = trader.TraderID");
                            $sql->execute();
                            $result = $sql->get_result();
                            if ($result->num_rows > 0) :
                                while ($row = $result->fetch_assoc()) : ?>
                                    <tr>
                                        <td><?php echo $row['OrderID']?></td> 
                                        <td><?php echo $row['FullName']?></td>
                                        <td><?php echo $row['Quantity']?></td>
                                        <td><?php echo $row['Date']?></td>
                                        <td><?php echo $row['PaymentStatus']?></td>
                                        <td><?php echo $row['OrderStatus']?></td>
                                    </tr>
                                <?php endwhile ?>
                            <?php endif?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once __DIR__ . "/includes/footer.php";?>
