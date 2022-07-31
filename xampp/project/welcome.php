<?php
    require 'connection.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Customer Login</title>

<!-- Bootstrap CSS -->
<link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
    crossorigin="anonymous"
/>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="style.css">
</head>

<body style="background-color: #ebddda;">
<!-- Bootstrap JS -->
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"
></script>
</body>

<br><br><br><br><br><br>

<div class="container"" >
<div class="row">
    <div class="col-lg-6 col-md-10 mx-auto">
    <div class="welcome">
        <form
        action=""
        class="mt-7 border p-4 shadow center"
        style="background-color: #f6f4f1;"
        style="margin:auto"
        novalidate
        >

            <!-- Header -->
            <h3 class="mb-3 text-center"> I am ... </h3>
            <div class="text-center">

                <a type="button" class="btn btn-lg nav-link mb-3" href="login_admin.php" style="color: black; background-color: #bdd0da;" id="adminbtn"><b>Admin</b></a>

                <a type="button" class="btn btn-lg nav-link" href="login_cust.php" style="color: black ; background-color: #d8dbcb;" id="custbtn" ><b>Customer</b></a>

            </div>
        </form>    