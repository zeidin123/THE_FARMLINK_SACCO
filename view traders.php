<?php
include_once __DIR__ . "/includes/header.php";
require __DIR__ . "/config.php";
?>


<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
            
    <!-- Traders list content goes here -->
                    <h4>Traders List</h4>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Contact Number</th>
                                <th>ID Number</th>
                                <!-- Add other trader-specific columns here -->
                            </tr>
                        </thead>
                 </div>
             
                        <tbody>
             
 
                            <?php
                            $sql = $conn->prepare("SELECT * FROM trader");
                            $sql->execute();
                            $result = $sql->get_result();
                            if ($result->num_rows > 0) :
                                while ($row = $result->fetch_assoc()) : ?>
                                    <tr>
                                        <td><?php echo $row['FirstName']?></td>
                                        <td><?php echo $row['LastName']?></td>
                                        <td><?php echo $row['ContactNumber']?></td>
                                        <td><?php echo $row['IDnumber']?></td>
                                       
                                        <!-- Add other trader-specific data here -->
                                    </tr>
                                <?php endwhile ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="2">No traders found.</td>
                                </tr>
                            <?php endif ?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Get references to the button and the traders' table
    const toggleTradersButton = document.getElementById("toggleTradersButton");
    const tradersTable = document.getElementById("tradersTable");

    // Add a click event listener to the button
    toggleTradersButton.addEventListener("click", function () {
        // Toggle the visibility of the traders' table
        if (tradersTable.style.display === "none" || tradersTable.style.display === "") {
            tradersTable.style.display = "block"; // Show the table
        } else {
            tradersTable.style.display = "none"; // Hide the table
        }
    });
</script>

<?php include_once __DIR__ . "/includes/footer.php"; ?>
