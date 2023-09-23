<?php include_once __DIR__ . "/includes/header.php";
require __DIR__ . "/config.php";
?>

<!-- modals are in a separate page -->
<?php include __DIR__ . "/modals.php"?>


<div class="container-fluid">
    <div class="row mt-5">
        <!-- Farmers Part -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Farmers List
                        <button class="btn btn-primary float-end w-auto" type="button"
                        data-bs-toggle="modal" data-bs-target="#farmerAddModal">
                            <span class="fa fa-plus"></span> Add Farmer
                        </button>
                    </h4>
                </div>
                <div class="card-body">
                    <table id="myTable" class="table table-bordered table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = $conn->prepare("SELECT * FROM farmers");
                            $sql->execute();
                            $result = $sql->get_result();
                            if ($result->num_rows > 0) :
                                while ($row = $result->fetch_assoc()) : ?>
                                    <tr>
                                        <td><?php echo $row['FullName']?></td> 
                                        <td>
                                            <center>
                                            <!-- View Employee -->
                                            <button class="farmerViewBtn btn btn-sm btn-outline-warning w-auto" type="button"
                                            value="<?php echo $row['FarmerID']?>">
                                            <i class="fa-regular fa-eye"></i></button>

                                            <!-- Edit Employee -->
                                            <button class="farmerEditBtn btn btn-sm btn-outline-primary w-auto" type="button"
                                            value="<?php echo $row['FarmerID']?>">
                                            <i class="fa-regular fa-pen-to-square"></i></button>

                                            <!-- Delete Employee -->
                                            <button class="farmerDeleteBtn btn btn-sm btn-outline-danger w-auto" type="button"
                                            value="<?php echo $row['FarmerID']?>">
                                            <i class="fa-solid fa-trash"></i></button>
                                            </center>
                                        </td>
                                    </tr>
                                <?php endwhile ?>
                            <?php endif?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <!-- Employees PART -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Employees List
                        <button class="btn btn-primary float-end w-auto" type="button"
                        data-bs-toggle="modal" data-bs-target="#employeeAddModal">
                            <span class="fa fa-plus"></span> Add Employee
                        </button>
                    </h4>
                </div>
                <div class="card-body">
                <table id="empTable" class="table table-bordered table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = $conn->prepare("SELECT * FROM employees");
                            $sql->execute();
                            $result = $sql->get_result();
                            if ($result->num_rows > 0) :
                                while ($row = $result->fetch_assoc()) : ?>
                                    <tr>
                                        <td><?php echo $row['FullName']?></td> 
                                        <td>
                                            <center>
                                            <!-- View Employee -->
                                            <button class="employeeViewBtn btn btn-sm btn-outline-warning w-auto" type="button"
                                            value="<?php echo $row['EmpID']?>">
                                            <i class="fa-regular fa-eye"></i></button>

                                            <!-- Edit Employee -->
                                            <button class="employeeEditBtn btn btn-sm btn-outline-primary w-auto" type="button"
                                            value="<?php echo $row['EmpID']?>">
                                            <i class="fa-regular fa-pen-to-square"></i></button>

                                            <!-- Delete Employee -->
                                            <button class="employeeDeleteBtn btn btn-sm btn-outline-danger w-auto" type="button"
                                            value="<?php echo $row['EmpID']?>">
                                            <i class="fa-solid fa-trash"></i></button>
                                            </center>
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
<script>
    <?php require_once("js/script.js");?>
</script>