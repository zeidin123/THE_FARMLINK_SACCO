<?php include_once __DIR__ . "/includes/header.php";
require __DIR__ . "/config.php";
?>

<!-- modals are in a separate page -->
<?php include __DIR__ . "/modals.php"?>


<div class="container-fluid">
    <div class="row mt-5">
        <!-- View Farmer Deliveries -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Farmer Deliveries</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>Farmer</th>
                                <th>Quantity</th>
                                <th>Date(dd-mm-yy)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- get data from farmer and delivery tables -->
                            <?php
                            $sql = $conn->prepare("SELECT delivery.Quantity, delivery.Date,
                            farmers.FullName  
                            FROM delivery
                            INNER JOIN farmers 
                            ON delivery.FarmerID = farmers.FarmerID");
                            $sql->execute();
                            $result = $sql->get_result();
                            if ($result->num_rows > 0) :
                                while ($row = $result->fetch_assoc()) : ?>
                                    <tr>
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
<script>
    <?php require_once("js/script.js");?>
</script>