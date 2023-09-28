<?php include_once __DIR__ . "/includes/header.php";
require __DIR__ . "/config.php";
?>

<div class="container-fluid">
    <div class="row mt-5">
        <!-- View Trader orders -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>My Deliveries</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>Delivery Id</th>
                                <th>Full Name</th>
                                <th>Quantity</th>
                                <th>Date(dd-mm-yy)</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                            if (isset($_SESSION['farmerID'])) {
                                $farmer_id = $_SESSION['farmerID'];
                            }

                            // get data from order and trader tables
                            $sql = $conn->prepare("SELECT delivery.DeliveryID, delivery.Quantity,
                            delivery.Date, farmers.FullName
                            FROM `delivery`
                            INNER JOIN `farmers` 
                            ON delivery.FarmerID = farmers.FarmerID
                            AND delivery.FarmerID = '$farmer_id'");
                            $sql->execute();
                            $result = $sql->get_result();
                            if ($result->num_rows > 0) :
                                while ($row = $result->fetch_assoc()) : ?>
                                    <tr>
                                        <td><?php echo $row['DeliveryID']?></td> 
                                        <td><?php echo $row['FullName']?></td>
                                        <td><?php echo $row['Quantity']?></td>
                                        <td><?php echo $row['Date']?></td>
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
