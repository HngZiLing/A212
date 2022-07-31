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

    <title>Home</title>

</head>

<body style="background-color: #dee2e6">
   

<div style="background-image: url('img/bgAdmin.jpg');
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
      <h2>Get ready for a whole new world</h2>
      <p>A whole new way to work</p>
    </div>
  </div>
    
</body>
</html>