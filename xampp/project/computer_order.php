<?php
    require 'connection.php';
    require 'navbar_admin.php';

    session_start();
    $adminID = $_SESSION['adminID'];

    if (!isset($_SESSION['adminID'])) {
        echo "<script> alert('Session not available. Please login');</script>";
        echo "<script> window.location.replace('login_admin.php')</script>";
    }

    $sql = "SELECT * FROM order_list";
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

    <title>Order</title>

</head>

<body style="background-color: #dee2e6">


    <br><br>
    <div class="container-fluid">       
        <div class="row justify-content-center">
            <div class="col-md-11">        
                <form method="post" action="" enctype="multipart/form-data"
                    class="border needs-validation"
                    novalidate>

                    <h3 class="text-center"><b>LIST OF ORDER</b></h3>
    
                    <div class="container mt-4">
                        <div class="row">
                            <div class="col-md-12">
                            

                            <table class="table table-bordered table-striped" style="background-color:white">
                                <thead>
                                    <tr style="background: #deebf2">
                                        <th scope="col" class="text-center">Order ID</th>
                                        <th scope="col" class="text-center">Customer ID</th>
                                        <th scope="col" class="text-center">Laptop ID</th>
                                        <th scope="col" class="text-center">Price (RM)</th> 
                                        <th scope="col" class="text-center">Quantity</th> 
                                        <th scope="col" class="text-center">Status</th>
                                        <th scope="col" class="text-center"></th>    
                                    </tr>
                                </thead>

                                <tbody>
                                <?php 
                                    foreach ($result as $row):;
                                ?>
                                    <tr>
                                        <td class="text-center"><?php echo $row["OrderID"]; ?></td>
                                        <td class="text-center"><?php echo $row["custID"]; ?></td>
                                        <td class="text-center"><?php echo $row["LaptopID"]; ?></td>
                                        <td class="text-center"><?php echo number_format($row["Price"]); ?></td>
                                        <td class="text-center"><?php echo $row["Quantity"]; ?></td>
                                        <td class="text-center"><?php echo $row["OrderStatus"]; ?></td>
                                        
                                        <td class="text-center" style="width:120px"><a class="thinBtn adminBtn" href="update_order.php?OrderID=<?php echo $row["OrderID"]; ?>">Update</a></td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table> 

                            </div>               
                        </div>         
                    </div> 
                </form>
            </div>
        </div>
    </div>

</body>      
</html>