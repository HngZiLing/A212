<?php
    require 'connection.php';
    require 'navbar_admin.php';

    session_start();
    $adminID = $_SESSION['adminID'];

    if (!isset($_SESSION['adminID'])) {
        echo "<script> alert('Session not available. Please login');</script>";
        echo "<script> window.location.replace('login_admin.php')</script>";
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

        <title>Computer Category Report</title>

        <link rel="stylesheet" href="style.css">
    </head>
    
<body style="background-color: #dee2e6">

<br>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <h3 class="mt-4 text-center"><b>COMPUTER CATEGORY REPORT</b></h3>
                <table class="mt-4 table table-bordered table-striped" style="background-color:white">
                    <thead>
                        <tr align="center" style="background: #deebf2; vertical-align: middle">
                            <th>No</th>
                            <th>Category</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php 
                            $query = "SELECT DISTINCT Brand FROM laptop";
                            $query_run = mysqli_query($connection, $query);

                            $no = 1;

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $laptop)
                                {
                        ?>
                                    <tr align="center" style="vertical-align: middle">
                                        <td><?= $no; $no++?></td>
                                        <td><?= $laptop['Brand']; ?></td>
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