<?php

    require 'connection.php';
    require 'navbar_admin.php';

    session_start();
    $adminID = $_SESSION['adminID'];

    if (!isset($_SESSION['adminID'])) {
        echo "<script> alert('Session not available. Please login');</script>";
        echo "<script> window.location.replace('login_admin.php')</script>";
    }

    $LaptopID = $_GET['LaptopID'];
    
    // query only the selected laptopid
    $sql = "SELECT * FROM laptop where LaptopID=$LaptopID";
    $detail = query($sql)[0];
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

    <title>View All Computer</title>

</head>

<body style="background-color: #dee2e6">
 
    <br><br>
        <div class="container-fluid">
        <h3 class="text-center"><b>DETAILS OF COMPUTER</b></h3><br>
      
            <div class="row justify-content-center">
                <div class="col-md-6">  
                    <div class= "text-center">

                    </div>      
                        <form method="post" action="" enctype="multipart/form-data"
                        class="mt-10 border p-5 bg-white shadow needs-validation"
                        novalidate>

                        <img
                            <?php $LaptopImg = $detail['LaptopImg'];?>
                            height="200"
                            width="200"
                            class="rounded mx-auto d-block"
                            src="laptopImg/<?php echo $LaptopImg; ?>"
                            onerror="this.src='img/placeholder.png';"
                            style="object-fit: cover"
                            id="updateLaptopImgDisplay"
                        />

                        <table class='table striped bordered'>
                            <tr><th>Laptop ID</th><td><?php echo $detail['LaptopID']; ?><td></tr>
                            <tr><th>Brand</th><td><?php echo $detail['Brand']; ?><td></tr>
                            <tr><th>Model</th><td><?php echo $detail['Model']; ?><td></tr>
                            <tr><th>Series</th><td><?php echo $detail['Series']; ?><td></tr>
                            <tr><th>Processor</th><td><?php echo $detail['Processor']; ?><td></tr>
                            <tr><th>Processor_Gen</th><td><?php echo $detail['Processor_Gen']; ?><td></tr>
                            <tr><th>RAM</th><td><?php echo $detail['RAM']; ?><td></tr>
                            <tr><th>Hard_Disk_Capacity</th><td><?php echo $detail['Hard_Disk_Capacity']; ?><td></tr>
                            <tr><th>OS</th><td><?php echo $detail['OS']; ?><td></tr>
                            <tr><th>Rating</th><td><?php echo $detail['Rating']; ?><td></tr>
                            <tr><th>Price</th><td><?php echo $detail['Price']; ?><td></tr>
                        </table>
                    <br>

                    <!-- Back and Submit Button -->
                    <div class="text-center">
                    <div class="row justify-content-center">

                        <a class="smallBtn adminBtn" role="button" href="view_computer.php">< Back</a>
                    </div></div>
                    </form>
                </div>               
            </div>         
        </div> 
    <br><br>

</body>
</html>