<?php
include_once __DIR__ . "/header.php";?>

<style>
    <?php include "css/style.css"?>
</style>

<div class="row flex-nowrap">
    <div class="bg-dark col-auto col-md-4 col-lg-2 p-0 min-vh-100 d-flex flex-column justify-content-between sidebar" id="sidebar">
        <div class="bg-dark p-2">
            <a href="#" class="d-flex text-decoration-none mt-1 align-items-center text-white">
                <span class="fs-4 d-none d-sm-inline ms-3">Trader Dashboard</span>
            </a>
            <ul class="nav nav-pills flex-column mt-4">
                <li class="nav-item py-2 py-sm-0">
                <a href="traderDashboard.php?page=makesorders" class="nav-link text-white">
                <span class="fs-4 d-sm-inline"> Makes Orders </span> 
                </a>  
                </li> 

                <li class="nav-item py-2 py-sm-0">
                <a href="traderDashboard.php?page=viewOrders" class="nav-link text-white">
                <span class="fs-4 d-sm-inline"> View Orders </span> 
                </a>  
                </li> 
            </ul>
        </div>
        <div class="dropdown open p-3">
            <button class="btn border-none dropdown-toggle text-white" ty0pe="button" id="triggerId" aria-expanded="false" data-bs-toggle="dropdown">
                <i class="fa-solid fa-user"></i><span class="ms-2">Trader</span>
            </button>
            <!-- Does'nt work currently because there is no login session for the admin -->
            <div class="dropdown-menu" aria-labelledby="triggerId">
                <a class="dropdown-item" href="traderLogout.php">Logout</a>
            </div>
        </div>    
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
