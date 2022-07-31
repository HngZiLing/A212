<?php
    require 'connection.php';

    $id = $_GET['LaptopID'];
    //var_dump($id);  
    if (deleteComputer($id) > 0){    //2_ada masukkan javascript
        echo "<script>
            alert('Success delete record');
            document.location.href='../project/modify_computer.php';
            </script>";
    }else{
        echo "Failure to delete record";
    }

?>