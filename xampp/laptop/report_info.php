<?php
    require 'connection.php';
    require 'navbar_admin.php';
    session_start();
    $_SESSION["sessionid"]=session_id();
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <title>Computer Information Report</title>

        <link rel="stylesheet" href="style.css">
    </head>
    
<body>

<br>

<h3 class="mb-3 text-center">Computer Information Report</h3>
  
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr align="center" style="background: #deebf2">
                            <th>No</th>
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
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php 
                            $query = "SELECT * FROM laptop";
                            $query_run = mysqli_query($connection, $query);

                            $no = 1;

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $laptop)
                                {
                        ?>
                                    <tr align="center">
                                        <td><?= $no; $no++?></td>
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
                                    </tr>
                        <?php
                                }
                            }
                            else
                            {
                                echo "<h5> No Record Found </h5>";
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