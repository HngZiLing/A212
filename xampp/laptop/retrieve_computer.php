<?php
    require 'connection.php';
    require 'navbar_cust.php';
    
    session_start();
    $custID = $_SESSION['custID'];

    if (!isset($_SESSION['custID'])) {
        echo "<script> alert('Session not available. Please login');</script>";
        echo "<script> window.location.replace('login.php')</script>";
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

        <title>Computer</title>

        <link rel="stylesheet" href="style.css">
    </head>
    
<body>

<br>

<h3 class="mb-3 text-center">Product</h3>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <span style="float:left;">
                    <form action="" method="GET" name="form">
                        <div class="input-group">
                            <input type="text" name="search" id="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>" class="form-control" placeholder="Search..."/>
                            <button type="submit" name="submit" id="submit" class="btn border" style="color:#3b3c3a">Search 
                                <i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </span>
                <span style="float:right;">
                    <form action="" method="GET" name="form">
                        <div class="input-group">
                            <button type="submit" name="all" id="all" class="btn border" style="color:#3b3c3a" onsubmit="displayAll()">Display All 
                                <i class="fa fa-refresh"></i></button>
                        </div>
                    </form>
                </span>
                

                <br><br><br>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr align="center" style="background: #e7ecda">
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Series</th>
                            <th>Processor</th>
                            <th>Processor Generation</th>
                            <th>RAM</th>
                            <th>Hard Disk Capacity</th>
                            <th>Operating System</th>
                            <th>Rating</th>
                            <th>Price</th>
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
                            <tr align="center">
                                <td><?= $laptop['Brand']; ?></td>
                                <td><?= $laptop['Model']; ?></td>
                                <td><?= $laptop['Series']; ?></td>
                                <td><?= $laptop['Processor']; ?></td>
                                <td><?= $laptop['Processor_Gen']; ?></td>
                                <td><?= $laptop['RAM']; ?></td>
                                <td><?= $laptop['Hard_Disk_Capacity']; ?></td>
                                <td><?= $laptop['OS']; ?></td>
                                <td><?= $laptop['Rating']; ?></td>
                                <td><?= $laptop['Price']; ?></td>
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
                            foreach($query_run as $items)
                            {?>
                                <tr align="center">
                                    <td><?= $items['Brand']; ?></td>
                                    <td><?= $items['Model']; ?></td>
                                    <td><?= $items['Series']; ?></td>
                                    <td><?= $items['Processor']; ?></td>
                                    <td><?= $items['Processor_Gen']; ?></td>
                                    <td><?= $items['RAM']; ?></td>
                                    <td><?= $items['Hard_Disk_Capacity']; ?></td>
                                    <td><?= $items['OS']; ?></td>
                                    <td><?= $items['Rating']; ?></td>
                                    <td><?= $items['Price']; ?></td>
                                </tr><?php
                            }
                        }
                        else
                        {?>
                            <tr>
                                <td colspan="10">No Record Found</td>
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
                        <td><?= $laptop['Brand']; ?></td>
                        <td><?= $laptop['Model']; ?></td>
                        <td><?= $laptop['Series']; ?></td>
                        <td><?= $laptop['Processor']; ?></td>
                        <td><?= $laptop['Processor_Gen']; ?></td>
                        <td><?= $laptop['RAM']; ?></td>
                        <td><?= $laptop['Hard_Disk_Capacity']; ?></td>
                        <td><?= $laptop['OS']; ?></td>
                        <td><?= $laptop['Rating']; ?></td>
                        <td><?= $laptop['Price']; ?></td>
                    </tr><?php
                }?>
            </tbody>
        }
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>