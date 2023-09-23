// Ajax code
// create Farmer
$(document).on('submit', '#saveFarmer', function(e) {
        e.preventDefault();

        var formData = new FormData(this);
        formData.append("save_farmer", true);

        $.ajax({
            type: "POST",
            url: "code.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                
                var res = jQuery.parseJSON(response);
                if(res.status == 422) {
                    $('#farmerErrorMessage').removeClass('d-none');
                    $('#farmerErrorMessage').text(res.message);
                }
                else if(res.status == 200){
                    $('#farmerErrorMessage').addClass('d-none');
                    $('#farmerAddModal').modal('hide');
                    $('#saveFarmer')[0].reset();

                    alertify.set('notifier','position', 'top-right');
                    alertify.success(res.message);

                    $('#myTable').load(location.href + " #myTable");

                }else if(res.status == 500) {
                    alert(res.message);
                }
            }
        });

});

// VIEW FARMER
$(document).on('click', '.farmerViewBtn', function () {
        var farmer_id = $(this).val();
        $.ajax({
            type: "GET",
            url: "code.php?farmer_id=" + farmer_id,
            success: function (response) {

                var res = jQuery.parseJSON(response);
                if(res.status == 404) {

                    alert(res.message);
                }else if(res.status == 200){

                    $('#view_fname').text(res.data.FullName);
                    $('#view_contact').text(res.data.ContactNumber);
                    $('#view_id').text(res.data.IDNumber);
                    

                    $('#farmerViewModal').modal('show');
                }
            }
        });
});

// DELETE FARMER---
$(document).on('click', '.farmerDeleteBtn', function (e) {
    e.preventDefault();

    if(confirm('Are you sure you want to delete this farmer?'))
    {
        var farmer_id = $(this).val();
        $.ajax({
            type: "POST",
            url: "code.php",
            data: {
                'delete_farmer': true,
                'farmer_id': farmer_id
            },
            success: function (response) {

                var res = jQuery.parseJSON(response);
                if(res.status == 500) {

                    alert(res.message);
                }else{
                    alertify.set('notifier','position', 'top-right');
                    alertify.success(res.message);

                    $('#myTable').load(location.href + " #myTable");
                }
            }
        });
    }
});


// EDIT FARMER DETAILS
$(document).on('click', '.farmerEditBtn', function () {
    var farmer_id = $(this).val();

    $.ajax({
        type: "GET",
        url: "code.php?farmer_id=" + farmer_id,
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if(res.status == 404) {

                alert(res.message);
            }else if(res.status == 200){

                $('#farmer_id').val(res.data.FarmerID);
                $('#editName').val(res.data.FullName);
                $('#editContact').val(res.data.ContactNumber);
                $('#editId').val(res.data.IDNumber);
                $('#editPassword').val(res.data.Password);

                $('#farmerEditModal').modal('show');
            }

        }
    });

});

$(document).on('submit', '#updateFarmer', function (e) {
    e.preventDefault();

    var formData = new FormData(this);
    formData.append("update_farmer", true);

    $.ajax({
        type: "POST",
        url: "code.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            
            var res = jQuery.parseJSON(response);
            if(res.status == 422) {
                $('#errorMessageUpdate').removeClass('d-none');
                $('#errorMessageUpdate').text(res.message);

            }else if(res.status == 200){

                $('#errorMessageUpdate').addClass('d-none');

                alertify.set('notifier','position', 'top-right');
                alertify.success(res.message);
                
                $('#farmerEditModal').modal('hide');
                $('#updateFarmer')[0].reset();

                $('#myTable').load(location.href + " #myTable");

            }else if(res.status == 500) {
                alert(res.message);
            }
        }
    });

});


// EMPLOYEES AJAX CODE
// create Employee
$(document).on('submit', '#saveEmployee', function(e) {
    e.preventDefault();

    var formData = new FormData(this);
    formData.append("save_employee", true);

    $.ajax({
        type: "POST",
        url: "code.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            
            var res = jQuery.parseJSON(response);
            if(res.status == 422) {
                $('#employeeErrorMessage').removeClass('d-none');
                $('#employeeErrorMessage').text(res.message);
            }
            else if(res.status == 200){
                $('#employeeErrorMessage').addClass('d-none');
                $('#employeeAddModal').modal('hide');
                $('#saveEmployee')[0].reset();

                alertify.set('notifier','position', 'top-right');
                alertify.success(res.message);

                $('#empTable').load(location.href + " #empTable");

            }else if(res.status == 500) {
                alert(res.message);
            }
        }
    });

});

// VIEW Employee
$(document).on('click', '.employeeViewBtn', function () {
    var employee_id = $(this).val();
    $.ajax({
        type: "GET",
        url: "code.php?employee_id=" + employee_id,
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if(res.status == 404) {

                alert(res.message);
            }else if(res.status == 200){

                $('#empFname').text(res.data.FullName);
                $('#empContact').text(res.data.ContactNumber);
                $('#empId').text(res.data.IDNumber);
                

                $('#employeeViewModal').modal('show');
            }
        }
    });
});

// DELETE Employee
$(document).on('click', '.employeeDeleteBtn', function (e) {
e.preventDefault();

if(confirm('Are you sure you want to delete this Employee?'))
{
    var employee_id = $(this).val();
    $.ajax({
        type: "POST",
        url: "code.php",
        data: {
            'delete_employee': true,
            'employee_id': employee_id
        },
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if(res.status == 500) {

                alert(res.message);
            }else{
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.message);

                $('#empTable').load(location.href + " #empTable");
            }
        }
    });
}
});


// EDIT Employee 
$(document).on('click', '.employeeEditBtn', function () {
var employee_id = $(this).val();

$.ajax({
    type: "GET",
    url: "code.php?employee_id=" + employee_id,
    success: function (response) {

        var res = jQuery.parseJSON(response);
        if(res.status == 404) {

            alert(res.message);
        }else if(res.status == 200){

            $('#employee_id').val(res.data.EmpID);
            $('#empEditName').val(res.data.FullName);
            $('#empEditContact').val(res.data.ContactNumber);
            $('#empEditId').val(res.data.IDNumber);
            $('#empEditPassword').val(res.data.Password);

            $('#employeeEditModal').modal('show');
        }

    }
});

});

$(document).on('submit', '#updateEmployee', function (e) {
e.preventDefault();

var formData = new FormData(this);
formData.append("update_employee", true);

$.ajax({
    type: "POST",
    url: "code.php",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
        
        var res = jQuery.parseJSON(response);
        if(res.status == 422) {
            $('#errorMessageUpdate').removeClass('d-none');
            $('#errorMessageUpdate').text(res.message);

        }else if(res.status == 200){

            $('#errorMessageUpdate').addClass('d-none');

            alertify.set('notifier','position', 'top-right');
            alertify.success(res.message);
            
            $('#employeeEditModal').modal('hide');
            $('#updateEmployee')[0].reset();

            $('#empTable').load(location.href + " #empTable");

        }else if(res.status == 500) {
            alert(res.message);
        }
    }
});

});

// script.js
document.addEventListener("DOMContentLoaded", function () {
    // Fetch total payments and deliveries
    fetch("fetch_totals.php")
        .then((response) => response.json())
        .then((data) => {
            document.getElementById("totalPayments").innerText = data.totalPayments;
            document.getElementById("totalDeliveries").innerText = data.totalDeliveries;
        });

    // Handle sidebar links
    const sidebarLinks = document.querySelectorAll("#sidebar a");
    sidebarLinks.forEach((link) => {
        link.addEventListener("click", (e) => {
            e.preventDefault();
            const sectionId = link.getAttribute("href").substr(1);
            const sections = document.querySelectorAll(".hidden");
            sections.forEach((section) => section.classList.add("hidden"));
            document.getElementById(sectionId).classList.remove("hidden");
        });
    });
});
function updateCardContents() {
    // Make AJAX requests to fetch data from individual PHP files
    $.ajax({
        url: 'gettotalfarmers.php', // Replace with the actual path to your farmer total PHP file
        method: 'GET',
        dataType: 'json',
        success: function (farmerData) {
            // Update the card for Total Farmers with the retrieved data
            $('#totalFarmers').text(farmerData.totalFarmers);
        },
        error: function () {
            console.error('Error fetching farmer data.');
        }
    });

    $.ajax({
        url: 'gettotaltraders.php', // Replace with the actual path to your trader total PHP file
        method: 'GET',
        dataType: 'json',
        success: function (traderData) {
            // Update the card for Total Traders with the retrieved data
            $('#totalTraders').text(traderData.totalTraders);
        },
        error: function () {
            console.error('Error fetching trader data.');
        }
    });

    $.ajax({
        url: 'gettotalssaccoemployees.php', // Replace with the actual path to your Sacco employees total PHP file
        method: 'GET',
        dataType: 'json',
        success: function (saccoEmpData) {
            // Update the card for Total Sacco Employees with the retrieved data
            $('#totalEmployees').text(saccoEmpData.totalEmployees);
        },
        error: function () {
            console.error('Error fetching Sacco employee data.');
        }
    });
}

// Call the updateCardContents function initially
updateCardContents();

// Update card contents every 1 seconds (adjust the interval as needed)
setInterval(updateCardContents, 1000);
// Add this code to your script.js file
