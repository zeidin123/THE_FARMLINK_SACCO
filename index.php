<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Farmlink SACCO</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Add custom CSS styles here */
        body {
            background-color: #79BD8D; /* Farm green background color */
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white container */
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .logo {
            max-width: 200px;
            margin-bottom: 20px;
        }
        h1 {
            color: #333;
        }
        p {
            color: #555;
        }
        .btn-role {
            margin: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <img class="logo" src="farmlinklogo.png" alt="Farmlink SACCO Logo">
        <h1>Welcome to Farmlink SACCO</h1>
        <p>Harvesting Prosperity Together</p>
        <hr>
        <p>Discover the best maize at Farmlink SACCO.</p>
        <hr>
        <a href="traderform.html" class="btn btn-primary btn-lg">Sign Up as a Trader</a>
        <button class="btn btn-success btn-role" onclick="location.href='AdminLogin.php'">Log In as Admin</button>
        <button class="btn btn-info btn-role" onclick="location.href='farmerloginform.php'">Log In as Farmer</button>
        <button class="btn btn-warning btn-role" onclick="location.href='saccoemplogin.php'">Log In as SACCO Employee</button>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
