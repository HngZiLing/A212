<?php
    require 'connection.php';
    require 'navbar_cust.php';
    
    session_start();
    $custID = $_SESSION['custID'];
    
    if (!isset($_SESSION['custID'])) {
        echo "<script> alert('Session not available. Please login');</script>";
        echo "<script> window.location.replace('login_cust.php')</script>";
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

        <title>Order History</title>

        <link rel="stylesheet" href="style.css">
    </head>
    
<body style="background-color: #eaece6">

<br>

<h3 class="mb-3 text-center">Order History</h3>
  
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">

                <table class="table table-bordered table-striped" style="background-color:white">
                    <thead>
                        <tr align="center" style="background: #d8dbcb">
                            <th>Order ID</th>
                            <th>Laptop ID</th>
                            <th>Laptop Brand</th>
                            <th>Laptop Model</th>
                            <th>Price (RM)</th>
                            <th>Quantity</th>
                            <th>Total Price (RM)</th>
                            <th>Order Status</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php 
                            $query = "SELECT * FROM order_list, laptop WHERE order_list.LaptopID = laptop.LaptopID AND custID = $custID";
                            $query_run = mysqli_query($connection, $query);

                            $no = 1;

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $order)
                                {
                        ?>
                                    <tr align="center">
                                        <td><?= $order['OrderID']; ?></td>
                                        <td><?= $order['LaptopID']; ?></td>
                                        <td><?= $order['Brand']; ?></td>
                                        <td><?= $order['Model']; ?></td>
                                        <td><?= $order['Price']; ?></td>
                                        <td><?= $order['Quantity']; ?></td>
                                        <td><?= $order['Price']*$order['Quantity']; ?></td>
                                        <td><?= $order['OrderStatus']; ?></td>
                                    </tr>
                        <?php
                                }
                            }
                            else
                            {?>
                                <tr class="text-center">
                                    <td colspan="8">No Record Found</td>
                                </tr><?php
                            }
                        ?> 
                                
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>