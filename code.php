<?php
require __DIR__ . "/config.php";
//Process the form to create a department
if(isset($_POST['save_farmer']))
{
    $fullName = $_POST["fname"];
    $contactNumber = $_POST["contactNo"];
    $idNumber = $_POST["idNo"];
    $password = $_POST["password"];

    // if the form fields are empty, show an error
    if($fullName == NULL || $contactNumber == NULL || $idNumber == NULL || $password == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'This field is mandatory'
        ];
        echo json_encode($res);
        return;
    }
    // else insert farmer details into the database
    $query = "INSERT INTO farmers(FullName, ContactNumber, IDNumber, Password)VALUES(?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $fullName, $contactNumber, $idNumber, $password);

    $query_run = $stmt->execute();

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Farmer Created Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Farmer Not Created'
        ];
        echo json_encode($res);
        return;
    }
}

// View the farmer
if(isset($_GET['farmer_id']))
{
    $farmer_id = $_GET['farmer_id'];

    $sql = $conn->prepare("SELECT * FROM farmers WHERE FarmerID= ?");
    $sql->bind_param("i", $farmer_id);
    $sql->execute();

    $result = $sql->get_result();
    if ($result->num_rows > 0)
    {
        $farmer = $result->fetch_assoc();

        $res = [
            'status' => 200,
            'message' => 'Farmer fetched successfully by id',
            'data' => $farmer
        ];
        echo json_encode($res);
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'Farmer Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

// DELETE THE FARMER
if(isset($_POST['delete_farmer']))
{
    $farmer_id = $_POST['farmer_id'];

    $stmt = $conn->prepare("DELETE FROM farmers WHERE FarmerID= ?");
    $stmt->bind_param("i", $farmer_id);
    $query_run = $stmt->execute();

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Farmer Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Farmer Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

// EDIT THE FARMER
if(isset($_POST['update_farmer']))
{
    $farmer_id = $_POST['farmer_id'];

    $editName = $_POST["editName"];
    $editContact = $_POST["editContact"];
    $editId = $_POST["editId"];
    $editPassword = $_POST["editPassword"];

    if($editName == NULL || $editContact == NULL || $editId == NULL || $editPassword == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = $conn->prepare("UPDATE farmers SET FullName = ?, ContactNumber = ?, IDNumber = ?, Password = ? 
    WHERE FarmerID = ?");
    $query->bind_param("ssssi", $editName, $editContact, $editId, $editPassword, $farmer_id);
    $query_run = $query->execute();
    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Farmer Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Farmer Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}


// EMPLOYEES FORM PROCESSING
// Add the employee
if(isset($_POST['save_employee']))
{
    $fullName = $_POST["fname"];
    $contactNumber = $_POST["contactNo"];
    $idNumber = $_POST["idNo"];
    $password = $_POST["password"];

    // if the form fields are empty, show an error
    if($fullName == NULL || $contactNumber == NULL || $idNumber == NULL || $password == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'This field is mandatory'
        ];
        echo json_encode($res);
        return;
    }
    // else insert farmer details into the database
    $query = "INSERT INTO employees(FullName, ContactNumber, IDNumber, Password)VALUES(?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $fullName, $contactNumber, $idNumber, $password);

    $query_run = $stmt->execute();

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Employee Created Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Employee Not Created'
        ];
        echo json_encode($res);
        return;
    }
}

// View the employee
if(isset($_GET['employee_id']))
{
    $employee_id = $_GET['employee_id'];

    $sql = $conn->prepare("SELECT * FROM employees WHERE EmpID= ?");
    $sql->bind_param("i", $employee_id);
    $sql->execute();

    $result = $sql->get_result();
    if ($result->num_rows > 0)
    {
        $employee = $result->fetch_assoc();

        $res = [
            'status' => 200,
            'message' => 'Employee fetched successfully by id',
            'data' => $employee
        ];
        echo json_encode($res);
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'Employee Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

// Edit the employee
if(isset($_POST['update_employee']))
{
    $employee_id = $_POST['employee_id'];

    $editName = $_POST["editName"];
    $editContact = $_POST["editContact"];
    $editId = $_POST["editId"];
    $editPassword = $_POST["editPassword"];

    if($editName == NULL || $editContact == NULL || $editId == NULL || $editPassword == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = $conn->prepare("UPDATE employees SET FullName = ?, ContactNumber = ?, IDNumber = ?, Password = ? 
    WHERE EmpID = ?");
    $query->bind_param("ssssi", $editName, $editContact, $editId, $editPassword, $employee_id);
    $query_run = $query->execute();
    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Employee Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Employee Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}

// DELETE THE FARMER
if(isset($_POST['delete_employee']))
{
    $employee_id = $_POST['employee_id'];

    $stmt = $conn->prepare("DELETE FROM employees WHERE EmpID= ?");
    $stmt->bind_param("i", $employee_id);
    $query_run = $stmt->execute();

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Employee Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Employee Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}


// CREATE DELIVERY
if(isset($_POST['create_delivery']))
{
    $farmer_id = $_POST["farmer_id"];
    $quantity = $_POST["quantity"];
    $date = $_POST["date"];
    $empId = $_POST["empId"];

    // if the form fields are empty, show an error
    if($farmer_id == NULL || $quantity == NULL || $date == NULL || $empId == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'This field is mandatory'
        ];
        echo json_encode($res);
        return;
    }
    // else insert farmer details into the database
    $query = "INSERT INTO delivery(FarmerID, EmpID, Quantity, Date)VALUES(?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $farmer_id, $empId, $quantity, $date);

    $query_run = $stmt->execute();

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Delivery Created Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Delivery Not Created'
        ];
        echo json_encode($res);
        return;
    }
}


?>