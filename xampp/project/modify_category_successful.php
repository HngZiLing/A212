<?php

    require 'connection.php';
    require 'navbar_admin.php';

    session_start();
    $adminID = $_SESSION['adminID'];

    if (!isset($_SESSION['adminID'])) {
        echo "<script> alert('Session not available. Please login');</script>";
        echo "<script> window.location.replace('login_admin.php')</script>";
    }
  
    $result = mysqli_query($connection,"SELECT Brand FROM laptop WHERE Brand='" . $_GET['Brand'] . "'");
        $row= mysqli_fetch_array($result);

    if(count($_POST)>0) {
        $Brand = $row['Brand'];
        $updateBrand = $_POST['updateBrand'];

        $query_run = mysqli_query($connection,"UPDATE laptop set Brand='$updateBrand' WHERE Brand='$Brand'");

        if($query_run){
            echo '<script> alert("Information Modified Successfully."); </script>';
            echo "<script> window.location.replace('modify_category.php')</script>";
            }
            else
            {
                echo '<script> alert("Data Not Saved. Please try again."); </script>';
                echo "<script> window.location.replace('modify_category.php')</script>";
            }
        }
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

    <br><br>
        <div class="container-fluid">       
        <h3 class="text-center"><b>MODIFY COMPUTER CATEGORY</b></h3><br>
            <div class="row justify-content-center">
                <div class="col-md-6"> 
                    <div class= "text-center"></div>       
                    
                    <form method="post" action="" enctype="multipart/form-data"
                        class="mt-10 border p-5 bg-white shadow needs-validation"
                        novalidate>

                        <br>

                        <table style="margin-left:30px;">
                            <tbody>
                                <!--Brand-->
                                <tr style="height: 50px;">
                                    <td style="width: 200px;"><label for="updateBrand" class="form-label"><b>Brand</b></label></td>
                                    <td><input type="text" class="form-control" id="updateBrand" name="updateBrand" value="<?php echo $row['Brand']; ?>"></td>
                                </tr>
                            </tbody>
                        </table>

                        <br>

                        <!-- Back and Submit Button -->
                        <div class="text-center">
                            <div class="row justify-content-center">
                                <a class="smallBtn adminBtn" role="button" href="modify_category.php">< Back</a>
                                &nbsp;&nbsp;&nbsp;
                                <button type="submit" name="insertcategory" class="smallBtn impBtn" value="submit" id="submit">Submit </button>
                            </div>
                        </div>
                    </form>
                </div>               
            </div>         
        </div> 
    <br><br>

</body>      
</html>