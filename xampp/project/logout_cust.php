<?php
   require 'connection.php';
   require 'navbar_cust.php';

session_start();
unset($_SESSION["custID"]);
unset($_SESSION["custPassword"]);
header("Location:welcome.php");
?>