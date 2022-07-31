<?php
    require 'connection.php';
    require 'navbar_admin.php';
    
session_start();
unset($_SESSION["adminID"]);
unset($_SESSION["adminPassword"]);
header("Location:welcome.php");
?>