<?php
include_once __DIR__ . "/header.php";
?>

<style>
    <?php include "css/style.css" ?>
</style>

<div class="row flex-nowrap">
    <div class="bg-dark col-auto col-md-4 col-lg-2 p-0 min-vh-100 d-flex flex-column justify-content-between sidebar" id="sidebar">
        <div class="bg-dark p-2">
            <a href="#" class="d-flex text-decoration-none mt-1 align-items-center text-white">
                <span class="fs-4 d-none d-sm-inline ms-3">Employee Dashboard</span>
            </a>
            <ul class="nav nav-pills flex-column mt-4">
                
                <li class="nav-item py-2 py-sm-0">
                    <a href="saccoempdashboard.php?page=ordersupdate" class="nav-link text-white">
                        <span class="fs-4 d-sm-inline">View Trader Orders</span>
                    </a>
                </li>

                <!-- Manage Deliveries drop down -->
                <li class="nav-item has-submenu dropdown py-2 py-sm-0">
                    <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown"> Manage Deliveries</a>
                    <ul class="submenu collapse dropdown-menu">
                        <li><a class="nav-link dropdown-item" href="saccoempdashboard.php?page=createDelivery">Create Delivery</a></li>
                        <li><a class="nav-link dropdown-item" href="saccoempdashboard.php?page=viewDelivery">View Deliveries</a></li>
                    </ul>
                </li>
            </ul>
            
        </div>


        <div class="dropdown open p-3">
            <button class="btn border-none dropdown-toggle text-white" type="button" id="triggerId" aria-expanded="false" data-bs-toggle="dropdown">
                <i class="fa-solid fa-user"></i><span class="ms-2">Employee</span>
            </button>
            <!-- Logout functionality -->
            <div class="dropdown-menu" aria-labelledby="triggerId">
                <a class="dropdown-item" href="employeeLogout.php">Log out</a>
            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

