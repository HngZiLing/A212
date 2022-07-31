<?php
    require 'connection.php';
    
    session_start();
    $custID = $_SESSION['custID'];

    if (!isset($_SESSION['custID'])) {
        echo "<script> alert('Session not available. Please login');</script>";
        echo "<script> window.location.replace('login.php')</script>";
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

        <title>Customer Home</title>

        <link rel="stylesheet" href="style.css">
    </head>
    
<body>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #d8dbcb">
    <div class="container-fluid">
      <a class="navbar-brand" href="home_cust.php">Home</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="profile.php">Profile</a>
            </li>

            <li class="nav-item">
              <a class="nav-link " href="retrieve_computer.php">Product</a>
            </li>

            <li class="nav-item">
              <a class="nav-link " href="cart.php">Cart</a>
            </li>

            <li class="nav-item">
              <a class="nav-link " href="computer_order.php">Order</a>
            </li>

            <li class="nav-item">
              <a class="nav-link " href="logout_cust.php">Logout</a>
            </li>

          </ul>
        </span>
      </div>
    </div>
  </nav>

  

  <div style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), 
    rgba(0, 0, 0, 0.5)), url('balloon.jpg');
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
      <h2>Do the impossible</h2>
      <p>Take learning as a kind of living habits</p>
    </div>
  </div>

</body>

</html>
