<?php

    $connection = mysqli_connect("localhost","root","","mmdbsystem");

    if(!$connection){
        die('Connection Failed'. mysqli_connect_error());
    }    
    
?>