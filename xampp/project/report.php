<?php
    require 'connection.php';
    require 'navbar_admin.php';

    session_start();
    $adminID = $_SESSION['adminID'];

    if (!isset($_SESSION['adminID'])) {
        echo "<script> alert('Session not available. Please login');</script>";
        echo "<script> window.location.replace('login_admin.php')</script>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css">

  <title>Report</title>
</head>

<body style="background-color: #dee2e6">
<br><br>
<div class="container-fluid" >
<h3 class="text-center"><b>REPORT</b></h3>
<div class="row justify-content-center">
    <div class="col-md-6">
    <div class="welcome">
        <form
        action=""
        class="mt-4 border p-4 shadow center"
        style="background-color: white;"
        style="margin:auto"
        novalidate
        >

            <!-- Header -->
            <div class="text-center">

                <a type="button" class="btn adminBtn nav-link mb-4" href="report_info.php" id="salesinfo">Computer Sales Info</a>

                <a type="button" class="btn adminBtn nav-link mb-4" href="report_category.php" id="category" >Computer Category</a>

                <a type="button" class="btn adminBtn nav-link" href="report_order.php" " id="order" >Computer Order</a>

            </div>
        </form>


</body>
</html>