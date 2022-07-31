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

        <title>Computer Category Report</title>

        <link rel="stylesheet" href="style.css">
    </head>
    
<body>

<br>

<h3 class="mb-3 text-center">Computer Category Report</h3>
  
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr align="center" style="background: #deebf2">
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
                                    <tr align="center">
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