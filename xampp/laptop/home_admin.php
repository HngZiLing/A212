<?php

    session_start();
    if (!isset($_SESSION['sessionid'])) {
        echo "<script> alert('Session not available. Please login');</script>";
        echo "<script> window.location.replace('login_admin.php')</script>";
    }

    $custID = $_SESSION['adminID'];

    echo "Your session is running $adminID";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<!--Navigation bar-->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #bdd0da">
        <div class="container-fluid">
            <a class="navbar-brand" href="home_admin.php">Home</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="computer_salesinfo.php"><b>Laptop</b></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="computer_category.php"><b>Category</b></a>
            </li>

            <li class="nav-item">
                <a class="nav-link active" href="computer_order.php"><b>Order</b></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><b>Report</b></a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="report_info.php">Computer Information</a></li>
                    <li><a class="dropdown-item" href="report_category.php">Computer Category</a></li>
                    <li><a class="dropdown-item" href="report_order">Order</a></li>
                </ul>
            </li>
            </ul>

            <ul class="navbar-nav ml-auto"> 
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="#"><b>Logout</b></a>
                </li>
            </ul>
            
        </div>
        </div>
    </nav>, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>