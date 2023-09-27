<?php
include_once __DIR__ . "/includes/header.php";

// Include the database connection file (config.php)
require_once __DIR__ . "/config.php";
?>

<div class="container-fluid">
    <div class="row mt-5">
        <!-- Farmers Part -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Create Delivery Form</h4>
                </div>
                <div class="card-body">
                    <form id="createDelivery">

                    <!-- hidden field to pass the employee session id. This will be stored on the empID column in the DB -->
                    <input type="hidden" name="empId" value="<?php if (isset($_SESSION['employeeID'])) {
                        $empId = $_SESSION['employeeID'];
                        echo $empId;
                    } ?>">

                        <div id="deliveryErrorMessage" class="alert alert-warning d-none"></div>

                        <!-- select the farmer based on their id -->
                        <select name="farmer_id" class="form-select" aria-label="Default select example">
                            <option selected>Select farmer</option>
                            <?php 
                            $sql = $conn->prepare("SELECT FarmerID, FullName FROM farmers");
                            $sql->execute();
                            $result = $sql->get_result();
                            if ($result->num_rows > 0) :
                                while ($row = $result->fetch_assoc()) :?>
                                    <option value="<?php echo $row['FarmerID']?>">
                                        <?php echo $row['FullName']?>
                                    </option>
                                <?php endwhile?>
                            <?php endif ?>
                            </select> 

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity (Kg)</label>
                            <input type="number" name="quantity" class="form-control" id="quantity">
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" name="date" class="form-control" id="date">
                        </div>
                        <button type="submit" class="btn btn-primary" name="createDelivery">Create Delivery</button>
                    </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once __DIR__ . "/includes/footer.php";?>
<script>
    <?php require_once("js/script.js");?>
</script>