<?php
    require 'connection.php';
    require 'navbar_cust.php';
    
    session_start();
    $custID = $_SESSION['custID'];

    if (!isset($_SESSION['custID'])) {
        echo "<script> alert('Session not available. Please login');</script>";
        echo "<script> window.location.replace('login_cust.php')</script>";
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">

        <title>Home</title>
    </head>

 <body style='background-color: #eaece6'>


  <div style="background-image: url('img/bgCust.jpg');
    height: 50%;   
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
    padding: 175px">
    <div style="text-align: center;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;">
      <h1>Laptop</h1>
      <h2>A fast laptop at a fair price</h2>
      <p>Make your laptop stand out</p>
    </div>
  </div>
    </body>

</html>
