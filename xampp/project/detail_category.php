<?php

    require 'connection.php';
    require 'navbar_admin.php';
    
    session_start();
    $adminID = $_SESSION['adminID'];

    if (!isset($_SESSION['adminID'])) {
        echo "<script> alert('Session not available. Please login');</script>";
        echo "<script> window.location.replace('login_admin.php')</script>";
    }

    $laptop = mysqli_query($connection,"SELECT * FROM laptop WHERE Brand='" . $_GET['Brand'] . "'");
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

    <title>Details of Computer Category</title>
    
</head>

<body style="background-color: #dee2e6">
  


    <div class="container-fluid">
        <br><br>
        <h3 class="text-center"><b>DETAILS OF COMPUTER CATEGORY</b></h3><br>
        <div class="container-fluid">
            <div class="row justify-content-center" style="margin-left:10px">
                <div class="">

                <table class="table table-bordered table-striped" style ="background-color: white">
                    <thead>
                        <tr style="background: #deebf2">
                            <th scope="col" class="text-center">LaptopID</th>
                            <th scope="col" class="text-center">Brand</th>
                            <th scope="col" class="text-center">Model</th> 
                            <th scope="col" class="text-center">Series</th>
                            <th scope="col" class="text-center">Processor</th>
                            <th scope="col" class="text-center">Processor_Gen</th>
                            <th scope="col" class="text-center">RAM</th>
                            <th scope="col" class="text-center">Hard_Disk_Capacity</th>
                            <th scope="col" class="text-center">OS</th>
                            <th scope="col" class="text-center">Rating</th>
                            <th scope="col" class="text-center">Price</th>
                            <th scope="col" class="text-center">Image</th>        
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <?php
                            if(mysqli_num_rows($laptop) > 0)
                            {
                                foreach($laptop as $detail)
                                {
                            ?>
                            <tr align="center">
                                <td class="text-center"><?php echo $detail['LaptopID']; ?></td>
                                <td class="text-center"><?php echo $detail['Brand']; ?></td>
                                <td class="text-center"><?php echo $detail['Model']; ?></td>
                                <td class="text-center"><?php echo $detail['Series']; ?></td>
                                <td class="text-center"><?php echo $detail['Processor']; ?></td>
                                <td class="text-center"><?php echo $detail['Processor_Gen']; ?></td>
                                <td class="text-center"><?php echo $detail['RAM']; ?></td>
                                <td class="text-center"><?php echo $detail['Hard_Disk_Capacity']; ?></td>
                                <td class="text-center"><?php echo $detail['OS']; ?></td>
                                <td class="text-center"><?php echo $detail['Rating']; ?></td>
                                <td class="text-center"><?php echo $detail['Price']; ?></td>
                                <td class="text-center"><?php echo $detail['LaptopImg']; ?></td>
                            </tr>
                            <?php
                                }
                            }
                            ?>
                        </tr>
                    </tbody>
                </table>
                <br>
                <div class="text-center mb-5" style="width:40%">
                    <a class="btn adminBtn" role="button" href="view_category.php">< Back To View All Computer Category</a>
                </div>
                <br>
                </div>
            </div>
        </div>
        <br>
    </div>
</body>
</html>