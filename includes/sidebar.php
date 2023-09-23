<?php
include_once __DIR__ . "/header.php";?>

<style>
    <?php include "css/style.css"?>
</style>

<div class="row flex-nowrap">
    <div class="bg-dark col-auto col-md-4 col-lg-2 p-0 min-vh-100 d-flex flex-column justify-content-between sidebar" id="sidebar">
        <div class="bg-dark p-2">
            <a href="#" class="d-flex text-decoration-none mt-1 align-items-center text-white">
                <span class="fs-4 d-none d-sm-inline ms-3">Admin Dashboard</span>
            </a>
            <ul class="nav nav-pills flex-column mt-4">
                <li class="nav-item py-2 py-sm-0">
                    <a href="adminDashboard.php?page=Create-accounts" class="nav-link text-white">
                        <span class="fs-4 d-sm-inline">Create Accounts</span>
                        </a>
                </li>
                <br>
                <br>
                <br>
                       
                <li class="nav-item py-2 py-sm-0">
                    <a href="adminDashboard.php?page2=view traders" class="nav-link text-white">
  <span class="fs-4 d-sm-inline">View Traders </span> 
                        </a>
                </li>
              
               
            </ul>
        </div>
        <div class="dropdown open p-3">
            <button class="btn border-none dropdown-toggle text-white" type="button" id="triggerId" aria-expanded="false" data-bs-toggle="dropdown">
                <i class="fa-solid fa-user"></i><span class="ms-2">Admin</span>
            </button>
            <!-- Does'nt work currently because there is no login session for the admin -->
            <div class="dropdown-menu" aria-labelledby="triggerId">
                <a class="dropdown-item" href="adminLogout.php">Logout</a>
            </div>
        </div>    
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
