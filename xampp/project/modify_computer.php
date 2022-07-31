<?php
    require 'connection.php';
    require 'navbar_admin.php';

    session_start();
    $adminID = $_SESSION['adminID'];

    if (!isset($_SESSION['adminID'])) {
        echo "<script> alert('Session not available. Please login');</script>";
        echo "<script> window.location.replace('login_admin.php')</script>";
    }

    $sql = "SELECT * FROM laptop";
    $result = query($sql);
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

    <title>Modify Computer Information</title>

</head>

<body style="background-color: #dee2e6">

    <div class="container">
        <br><br>
        <h3 class="text-center"><b>MODIFY COMPUTER INFORMATION</b></h3><br>

            <div class="row">
                <div class="col-md-10">

                    <table class="table table-bordered table-striped" style="background-color:white">
                        <thead>
                            <tr style="background: #deebf2; vertical-align: middle">
                                <th scope="col" class="text-center">LaptopID</th>
                                <th scope="col" class="text-center">Brand</th>
                                <th scope="col" class="text-center">Model</th> 
                                <th scope="col" class="text-center">Series</th>
                                <th scope="col" class="text-center">Processor</th>
                                <th scope="col" class="text-center">Processor_Gen</th>
                                <!-- <th scope="col" class="text-center">RAM</th> -->
                                <th scope="col" class="text-center">Hard_Disk_Capacity</th>
                                <th scope="col" class="text-center">OS</th>
                                <!-- <th scope="col" class="text-center">Rating</th> -->
                                <th scope="col" class="text-center">Price</th>
                                <!-- <th scope="col" class="text-center">Image</th> -->
                                <th scope="col" class="text-center"></th>
                                <th scope="col" class="text-center"></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                                foreach ($result as $row):;
                            ?>
                            <tr style="vertical-align: middle">
	                            <td class="text-center"><?php echo $row["LaptopID"]; ?></td>
		                        <td class="text-center"><?php echo $row["Brand"]; ?></td>
		                        <td class="text-center"><?php echo $row["Model"]; ?></td>
		                        <td class="text-center"><?php echo $row["Series"]; ?></td>
		                        <td class="text-center"><?php echo $row["Processor"]; ?></td>
                                <td class="text-center"><?php echo $row["Processor_Gen"]; ?></td>
                                <!-- <td class="text-center"><?php echo $row["RAM"]; ?></td> -->
                                <td class="text-center"><?php echo $row["Hard_Disk_Capacity"]; ?></td>
                                <td class="text-center"><?php echo $row["OS"]; ?></td>
                                <!-- <td class="text-center"><?php echo $row["Rating"]; ?></td> -->
                                <td class="text-center"><?php echo $row["Price"]; ?></td>
                                <!-- <td class="text-center"><?php echo $row["LaptopImg"]; ?></td> -->
                                
		                        <td class="text-center">
                                    <a class="thinBtn adminBtn" style="width:70px" href="modify_computer_successful.php?LaptopID=<?php echo $row["LaptopID"]; ?>">Update</a>
                                </td>

                                <td class="text-center">
                                    <a class="thinBtn impBtn" style="width:70px" href="delete_computer.php?LaptopID=<?php echo $row["LaptopID"]; ?>">Delete</a>
                                </td>                               
                            </tr>

                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>               
            </div>
            <div class="text-center mb-5" style="width:30%">
                        <a class="btn adminBtn" role="button" href="computer_salesinfo.php">< Back To Choose Another Task</a>
                    </div>     
    </div>
    
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"
    ></script>

</body>      
</html>