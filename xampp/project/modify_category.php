<?php
    require 'connection.php';
    require 'navbar_admin.php';

    session_start();
    $adminID = $_SESSION['adminID'];

    if (!isset($_SESSION['adminID'])) {
        echo "<script> alert('Session not available. Please login');</script>";
        echo "<script> window.location.replace('login_admin.php')</script>";
    }

    $sql = "SELECT DISTINCT Brand FROM laptop";
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

    <title>Modify Computer Category</title>

</head>

<body style="background-color: #dee2e6">

    <div class="container">
    <br><br>
        <h3 class="text-center"><b>MODIFY COMPUTER CATEGORY</b></h3><br>
    
            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped" style="background : white">
                            <thead>
                                <tr style="background: #deebf2">
                                    <th scope="col" class="text-center">No.</th>
                                    <th scope="col" class="text-center">Brand</th>
                                    <th scope="col" class="text-center"></th>
                                    <th scope="col" class="text-center"></th>
                                </tr>
                            </thead>

                    
                            <tbody>
                                <?php 

                                    $no = 1 ; 
                                    if($result > 0)
                                    {
                                        foreach($result as $laptop)
                                        {
                                ?>

                                <tr>
                                    <td class="text-center"><?= $no; $no++?></td>
                                    <td class="text-center"><?= $laptop['Brand']; ?></td> 

                                    <td class="text-center" style="width:150px"><a class="thinBtn adminBtn" href="modify_category_successful.php?Brand=<?php echo $laptop['Brand']; ?>">Update</a></td>

                                    <td class="text-center" style="width:150px"><a class="thinBtn impBtn" href="delete_category.php?Brand=<?php echo $laptop['Brand']; ?>">Delete</a></td>
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
            <div class="text-center mb-5" style="width:30%">
                        <a class="btn adminBtn" role="button" href="computer_category.php">< Back To Choose Another Task"</a>
                    </div>  
             
    </div>

</body>      
</html>