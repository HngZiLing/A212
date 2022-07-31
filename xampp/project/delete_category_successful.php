<?php
    require 'connection.php';

    session_start();
    $Brand = $_SESSION['Brand'];

    //var_dump($id);  
    if (mysqli_query($connection, "DELETE FROM laptop WHERE Brand='".$Brand."'")){
        echo "<script>
            alert('Success delete record');
            document.location.href='../project/modify_category.php';
            </script>";
    }else{
        echo "Failure to delete record";
    }

?>