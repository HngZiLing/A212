<?php
    require 'connection.php';
    require 'navbar_cust.php';
    
    session_start();
    $custID = $_SESSION['custID'];

    if (!isset($_SESSION['custID'])) {
        echo "<script> alert('Session not available. Please login');</script>";
        echo "<script> window.location.replace('login_cust.php')</script>";
    }

    if(isset($_POST['add_to_cart'])){

        $LaptopID = $_POST['LaptopID'];
        $Brand = $_POST['Brand'];
        $Model = $_POST['Model'];
        $Price = $_POST['Price'];
        $LaptopImg = $_POST['LaptopImg'];
        $Quantity = 1;
     
        $cart = "SELECT * FROM `cart` WHERE custID = $custID AND LaptopID = '$LaptopID'";
        $select_laptop = mysqli_query($connection, $cart);
        $num_row = mysqli_num_rows($select_laptop);
     
        if($num_row == 0){
           mysqli_query($connection, "INSERT INTO `cart`(custID, LaptopID, Brand, Model, Price, LaptopImg, Quantity)
           VALUES('$custID', '$LaptopID', '$Brand', '$Model', '$Price', '$LaptopImg', '$Quantity')");
           echo '<script> alert("Product added to cart succesfully"); </script>';
           echo "<script> window.location.replace('retrieve_computer.php')</script>";
        }else{
            echo '<script> alert("Product already added to cart"); </script>';
            echo "<script> window.location.replace('retrieve_computer.php')</script>";
        }
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">

        <title>Computer</title>
    </head>
    
<body style='background-color: #eaece6'>

<br>

<h3 class="mb-3 text-center">Product</h3>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <span style="float:left;">
                    <form action="" method="GET" name="form">
                        <div class="input-group">
                            <input type="text" name="search" style="width:200px"id="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>" class="form-control text-center" placeholder="Search"/>
                            <button type="submit" name="submit" id="submit" class="smallBtn custBtn border" style="width:50px; margin-top:0px"> 
                                <i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </span>
                <span style="float:right;">
                    <form action="" method="GET" name="form">
                        <div class="input-group">
                            <button type="submit" name="all" id="all" class="smallBtn border custBtn"onsubmit="displayAll()">Display All 
                                <i class="fa fa-refresh"></i></button>
                        </div>
                    </form>
                </span>
                

                <br><br><br>

                <table class="table table-bordered table-striped" style="background-color: white">
                    <thead>
                        <tr align="center" style="background: #d8dbcb; vertical-align: middle"">
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Series</th>
                            <th>Processor</th>
                            <th>Processor Generation</th>
                            <th>RAM</th>
                            <th>Hard Disk Capacity</th>
                            <th>Operating System</th>
                            <th>Rating</th>
                            <th>Price (RM)</th>
                            <th>Image</th>
                            <th>Add To Cart</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php 
                    if(isset($_GET['search']) == "")
                    {
                        $query = "SELECT * FROM laptop";
                        $query_run = mysqli_query($connection, $query);

                        foreach($query_run as $laptop)
                        {?>
                            <tr align="center" style="vertical-align: middle">
                                <td><?= $laptop['Brand']; ?></td>
                                <td><?= $laptop['Model']; ?></td>
                                <td><?= $laptop['Series']; ?></td>
                                <td><?= $laptop['Processor']; ?></td>
                                <td><?= $laptop['Processor_Gen']; ?></td>
                                <td><?= $laptop['RAM']; ?></td>
                                <td><?= $laptop['Hard_Disk_Capacity']; ?></td>
                                <td><?= $laptop['OS']; ?></td>
                                <td><?= $laptop['Rating']; ?></td>
                                <td><?= number_format($laptop['Price']); ?></td>
                                <td><img height="100" width="100" src='laptopImg/<?php echo $laptop['LaptopImg']; ?>' onerror="this.style.display = 'none'"></td>
                                <td>
                                    <form action="retrieve_computer.php" method="POST">
                                        <input type="hidden" name="LaptopID" value="<?php echo $laptop['LaptopID']; ?>">
                                        <input type="hidden" name="Brand" value="<?php echo $laptop['Brand']; ?>">
                                        <input type="hidden" name="Model" value="<?php echo $laptop['Model']; ?>">
                                        <input type="hidden" name="Price" value="<?php echo $laptop['Price']; ?>">
                                        <input type="hidden" name="LaptopImg" value="<?php echo $laptop['LaptopImg']; ?>">
                                        <button class="btn fa fa-shopping-cart" type="submit" name="add_to_cart" href="add_cart.php?LaptopID=<?php echo $items['LaptopID']; ?>" style="color:#3b3c3a; background-color:#d8dbcb"></button>
                                    </form>
                                </td>
                            </tr><?php
                        }
                    }?>

                    <?php
                    if(isset($_GET['search']))
                    {
                        $filtervalues = $_GET['search'];
                        
                        $query = "SELECT * FROM laptop WHERE CONCAT(Brand, Model, Series, Processor, Processor_Gen, RAM, Hard_Disk_Capacity, OS, Rating, Price) LIKE '%$filtervalues%' ";
                        $query_run = mysqli_query($connection, $query);
                        
                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $laptop)
                            {?>
                                <tr align="center">
                                    <td hidden><?= $laptop['LaptopID']; ?></td>
                                    <td><?= $laptop['Brand']; ?></td>
                                    <td><?= $laptop['Model']; ?></td>
                                    <td><?= $laptop['Series']; ?></td>
                                    <td><?= $laptop['Processor']; ?></td>
                                    <td><?= $laptop['Processor_Gen']; ?></td>
                                    <td><?= $laptop['RAM']; ?></td>
                                    <td><?= $laptop['Hard_Disk_Capacity']; ?></td>
                                    <td><?= $laptop['OS']; ?></td>
                                    <td><?= $laptop['Rating']; ?></td>
                                    <td><?= number_format($laptop['Price']); ?></td>
                                    <td><img height="100" width="100" src='laptopImg/<?php echo $laptop['LaptopImg']; ?>' onerror="this.style.display = 'none'"></td>
                                    <td><form action="" method="POST"><button class="btn custBtn fa fa-shopping-cart" type="submit" name="add_to_cart" href="add_cart.php?LaptopID=<?php echo $items['LaptopID']; ?>" style="color:#3b3c3a; background-color:#d8dbcb"></button></form></td>
                                </tr><?php
                            }
                        }
                        else
                        {?>
                            <tr  class="text-center">
                                <td colspan="12">No Record Found</td>
                            </tr><?php
                        }
                    }?>

                        

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function displayAll()
        {
            <tbody><?php 
                $query = "SELECT * FROM laptop";
                $query_run = mysqli_query($connection, $query);
                
                foreach($query_run as $laptop)
                {?>
                    <tr align="center">
                        <td hidden><?= $laptop['LaptopID']; ?></td>
                        <td><?= $laptop['Brand']; ?></td>
                        <td><?= $laptop['Model']; ?></td>
                        <td><?= $laptop['Series']; ?></td>
                        <td><?= $laptop['Processor']; ?></td>
                        <td><?= $laptop['Processor_Gen']; ?></td>
                        <td><?= $laptop['RAM']; ?></td>
                        <td><?= $laptop['Hard_Disk_Capacity']; ?></td>
                        <td><?= $laptop['OS']; ?></td>
                        <td><?= $laptop['Rating']; ?></td>
                        <td><?= number_format($laptop['Price']); ?></td>
                        <td><img height="100" width="100" src='laptopImg/<?php echo $laptop['LaptopImg']; ?>' onerror="this.style.display = 'none'"></td>
                        <td><button class="custBtn fa fa-shopping-cart" type="submit" name="add_to_cart" style="width:50%" href="add_cart.php?LaptopID=<?php echo $laptop['LaptopID']; ?>"></button></td>
                    </tr><?php
                }?>
            </tbody>
        }
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>