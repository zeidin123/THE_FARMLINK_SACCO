<?php require_once __DIR__ . "/includes/header.php"?>
<!-- Add new Farmer modal -->
<div class="modal fade" id="farmerAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Farmer</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="saveFarmer">
            <div class="modal-body">

                <div id="farmerErrorMessage" class="alert alert-warning d-none"></div>
                
                <div class="mb-3">
                    <label for="fname">Full Name</label>
                    <input type="text" name="fname" class="form-control" id="fname"/>
                </div>
                
                <div class="mb-3">
                    <label for="contactNo">Contact No</label>
                    <input type="text" name="contactNo" class="form-control" id="contactNo"/>
                </div>
                <div class="mb-3">
                    <label for="idNo">ID No</label>
                    <input type="text" name="idNo" class="form-control" id="idNo"/>
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password"/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create Farmer</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- View Farmer Modal -->
<div class="modal fade" id="farmerViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View Farmer</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
            <!-- Show details of the employee -->
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label><b>Full Name:</b></label>
                        <p id="view_fname"></p>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label><b>Contact No:</b></label>
                        <p id="view_contact"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label><b>Id:</b></label>
                        <p id="view_id"></p>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Edit Farmer Modal -->
<div class="modal fade" id="farmerEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Farmer</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="updateFarmer">
            <div class="modal-body">

                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                <input type="hidden" name="farmer_id" id="farmer_id" >

                <div class="mb-3">
                    <label for="editName">Full Name</label>
                    <input type="text" name="editName" class="form-control" id="editName"/>
                </div>
                
                <div class="mb-3">
                    <label for="editContact">Contact No</label>
                    <input type="text" name="editContact" class="form-control" id="editContact"/>
                </div>
                <div class="mb-3">
                    <label for="editId">ID No</label>
                    <input type="text" name="editId" class="form-control" id="editId"/>
                </div>
                <div class="mb-3">
                    <label for="editPassword">Password</label>
                    <input type="password" name="editPassword" class="form-control" id="editPassword"/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Edit Farmer</button>
            </div>
        </form>
        </div>
    </div>
</div>


<!-- ----------------------------------EMPLOYEES MODALS BELOW-------------------------- -->


<!-- Add new Employee modal -->
<div class="modal fade" id="employeeAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="saveEmployee">
            <div class="modal-body">

                <div id="employeeErrorMessage" class="alert alert-warning d-none"></div>
                
                <div class="mb-3">
                    <label for="fname">Full Name</label>
                    <input type="text" name="fname" class="form-control" id="fname"/>
                </div>
                
                <div class="mb-3">
                    <label for="contactNo">Contact No</label>
                    <input type="text" name="contactNo" class="form-control" id="contactNo"/>
                </div>
                <div class="mb-3">
                    <label for="idNo">ID No</label>
                    <input type="text" name="idNo" class="form-control" id="idNo"/>
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password"/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create Employee</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- View Employee Modal -->
<div class="modal fade" id="employeeViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View Employee</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
            <!-- Show details of the employee -->
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label><b>Full Name:</b></label>
                        <p id="empFname"></p>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label><b>Contact No:</b></label>
                        <p id="empContact"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label><b>Id:</b></label>
                        <p id="empId"></p>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Edit Employee Modal -->
<div class="modal fade" id="employeeEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="updateEmployee">
            <div class="modal-body">

                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                <input type="hidden" name="employee_id" id="employee_id" >

                <div class="mb-3">
                    <label for="editName">Full Name</label>
                    <input type="text" name="editName" class="form-control" id="empEditName"/>
                </div>
                
                <div class="mb-3">
                    <label for="editContact">Contact No</label>
                    <input type="text" name="editContact" class="form-control" id="empEditContact"/>
                </div>
                <div class="mb-3">
                    <label for="editId">ID No</label>
                    <input type="text" name="editId" class="form-control" id="empEditId"/>
                </div>
                <div class="mb-3">
                    <label for="editPassword">Password</label>
                    <input type="password" name="editPassword" class="form-control" id="empEditPassword"/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Edit Farmer</button>
            </div>
        </form>
        </div>
    </div>
</div>
<?php require_once __DIR__ . "/includes/footer.php"?>