<?php include_once __DIR__ . "/includes/header.php";
require __DIR__ . "/config.php";

// process the approve and reject buttons here
if (isset($_POST['approve'])) {
    $id = $_POST['id'];
    $approved = "approved";
    $stmt = $conn->prepare("UPDATE `order` SET PaymentStatus = '$approved' WHERE OrderID = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
}

if (isset($_POST['reject'])) {
    $id = $_POST['id'];
    $rejected = "rejected";
    $stmt = $conn->prepare("UPDATE `order` SET OrderStatus = '$rejected' WHERE OrderID = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
}
?>


<div class="container-fluid">
    <div class="row mt-5">
        <!-- View Trader orders -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Trader orders</h4>
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

                                        <!-- Payment approval or rejection-->
                                        <td>
                                        <form action="" method="post">
                                            <input type="hidden" name="id" value="<?php echo $row['OrderID']?>">
                                            <button type="submit" name="approve" class="btn btn-primary btn-sm">Approve</button>
                                            <button type="submit" name="reject" class="btn btn-danger btn-sm">Reject</button>
                                        </form>
                                        </td>

                                        <!-- Order approval or rejection -->
                                        <td>
                                        <form action="" method="post">
                                            <input type="hidden" name="id" value="<?php echo $row['OrderID']?>">
                                            <button type="submit" name="approve" class="btn btn-primary btn-sm">Approve</button>
                                            <button type="submit" name="reject" class="btn btn-danger btn-sm">Reject</button>
                                        </form>
                                        </td>
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
