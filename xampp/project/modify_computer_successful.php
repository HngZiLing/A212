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

    if(isset($_POST['insertsales_info'])) {
        $updateBrand = mysqli_real_escape_string($connection, $_POST['Brand']);
        $updateModel = mysqli_real_escape_string($connection, $_POST['Model']);
        $updateSeries = mysqli_real_escape_string($connection, $_POST['Series']);
        $updateProcessor = mysqli_real_escape_string($connection, $_POST['Processor']);
        $updateProcessor_Gen = mysqli_real_escape_string($connection, $_POST['Processor_Gen']);
        $updateRAM = mysqli_real_escape_string($connection, $_POST['RAM']);
        $updateHard_Disk_Capacity = mysqli_real_escape_string($connection, $_POST['Hard_Disk_Capacity']);
        $updateOS = mysqli_real_escape_string($connection, $_POST['OS']);
        $updateRating = mysqli_real_escape_string($connection, $_POST['Rating']);
        $updatePrice = mysqli_real_escape_string($connection, $_POST['Price']);

        $updateLaptopImg = $_FILES['updateLaptopImg']['name'];
        $updateLaptopImgTempName = $_FILES['updateLaptopImg']['tmp_name'];
        $LaptopImgFolder = 'laptopImg/'.$updateLaptopImg;
        $target = 'laptopImg/'.$updateLaptopImg;

        if(!empty($updateBrand) || !empty($updateModel) || !empty($updateSeries) || !empty($updateProcessor) ||
            !empty($updateProcessor_Gen) || !empty($updateRAM) || !empty($updateHard_Disk_Capacity) || !empty($updateOS) ||
            !empty($updateRating) || !empty($updatePrice))
        {

        $laptop_query = "UPDATE laptop set Brand='$updateBrand', Model='$updateModel', Series='$updateSeries',
                    Processor='$updateProcessor', Processor_Gen='$updateProcessor_Gen', RAM='$updateRAM', Hard_Disk_Capacity='$updateHard_Disk_Capacity',
                    OS=' $updateOS', Rating='$updateRating', Price='$updatePrice' WHERE LaptopID='$LaptopID'";
        
        $laptop_query_run = mysqli_query($connection, $laptop_query)or die('query failed');
        
        if(!empty($updateLaptopImg)){
            $img_query = "UPDATE laptop  SET LaptopImg = '$updateLaptopImg' WHERE LaptopID='$LaptopID'";
            $img_query_run = mysqli_query($connection, $img_query);
            if($img_query_run){
              move_uploaded_file($updateLaptopImgTempName, $LaptopImgFolder);
            }
        }

        if($laptop_query_run){
            echo '<script> alert("Information Modified Successfully."); </script>';
            echo "<script> window.location.replace('modify_computer.php')</script>";
            }
            else
            {
                echo '<script> alert("Data Not Saved. Please try again."); </script>';
                echo "<script> window.location.replace('modify_computer.php')</script>";
            }
        }
    }
    
    $result = mysqli_query($connection,"SELECT * FROM laptop WHERE LaptopID=$LaptopID");

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);}

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

    <title>Modify Computer Information</title>
</head>

<body style="background-color: #dee2e6">
        <div class="container-fluid">
            <br><br>
        <h3 class="text-center"><b>MODIFY COMPUTER INFORMATION</b></h3><br>     
            <div class="row justify-content-center">
                <div class="col-md-6">
                        <form
                        method="post"
                        action=""
                        enctype="multipart/form-data"
                        class="mt-10 border p-5 bg-white shadow needs-validation"
                        novalidate>
                        <table style="margin-left:30px">
                            <tbody>
                                <!--Laptop id-->
                                <tr style="height: 50px;">                            
                                    <td style="width: 200px;"><label for="LaptopID" class="form-label"><b>Laptop ID</b></label></td>
                                    <td><input type="text" class="form-control" name="LaptopID" value="<?php echo $row['LaptopID']; ?>" disabled></td>
                                </tr>

                                <!--Brand-->
                                <tr style="height: 50px;">
                                    <td><label for="Brand" class="form-label"><b>Brand</b></label></td>
                                    <td><input type="text" class="form-control"name="Brand" value="<?php echo $row['Brand']; ?>"></td>
                                </tr>

                                <!--Model-->
                                <tr style="height: 50px;">
                                    <td><label for="Model" class="form-label"><b>Model</b></label></td>
                                    <td><input type="text" class="form-control"name="Model" value="<?php echo $row['Model']; ?>"></td>
                                </tr>

                                <!--Series-->
                                <tr style="height: 50px;">
                                    <td><label for="Series" class="form-label"><b>Series</b></label></td>
                                    <td><input type="text" class="form-control"name="Series" value="<?php echo $row['Series']; ?>"></td>
                                </tr>

                                <!--Processor-->
                                <tr style="height: 50px;">
                                    <td><label for="Processor" class="form-label"><b>Processor</b></label></td>
                                    <td><input type="text" class="form-control"name="Processor" value="<?php echo $row['Processor']; ?>"></td>
                                </tr>

                                <!--Processor Generation-->
                                <tr style="height: 50px;">
                                    <td><label for="Processor_Gen" class="form-label"><b>Processor Generation</b></label></td>
                                    <td><input type="text" class="form-control"name="Processor_Gen" value="<?php echo $row['Processor_Gen']; ?>"></td>
                                </tr>

                                <!--RAM-->
                                <tr style="height: 50px;">
                                    <td><label for="RAM" class="form-label"><b>RAM</b></label></td>
                                    <td><input type="text" class="form-control"name="RAM" value="<?php echo $row['RAM']; ?>"></td>
                                </tr>

                                <!--Hard Disk Capacity-->
                                <tr style="height: 50px;">
                                    <td><label for="Hard_Disk_Capacity" class="form-label"><b>Hard Disk Capacity</b></label></td>
                                    <td><input type="text" class="form-control"name="Hard_Disk_Capacity" value="<?php echo $row['Hard_Disk_Capacity']; ?>"></td>
                                </tr>

                                <!--Operating System-->
                                <tr style="height: 50px;">
                                    <td><label for="OS" class="form-label"><b>Operating System</b></label></td>
                                    <td><input type="text" class="form-control"name="OS" value="<?php echo $row['OS']; ?>"></td>
                                </tr>

                                <!--Rating-->
                                <tr style="height: 50px;">
                                    <td><label for="Rating" class="form-label"><b>Rating</b></label></td>
                                    <td><input type="text" class="form-control"name="Rating" value="<?php echo $row['Rating']; ?>"></td>
                                </tr>

                                <!--Price-->
                                <tr style="height: 50px;">
                                    <td><label for="Price" class="form-label"><b>Price</b></label></td>
                                    <td><input type="text" class="form-control"name="Price" value="<?php echo $row['Price']; ?>"></td>
                                </tr>

                                <!--Image-->
                                    <img
                                        <?php $LaptopImg = $row['LaptopImg'];?>
                                        height="200"
                                        width="200"
                                        class="rounded mx-auto d-block"
                                        src="laptopImg/<?php echo $LaptopImg; ?>"
                                        onerror="this.src='img/placeholder.png';"
                                        style="object-fit: cover"
                                        id="updateLaptopImgDisplay"
                                        onclick="triggerClick()"
                                    />
                                    <label for="updateLaptopImg"></label>
                                    <input
                                        type="file"
                                        name="updateLaptopImg"
                                        onchange="displayLaptopImg(this);"
                                        id="updateLaptopImg"
                                        accept="image/jpg, image/jpeg, image/png"
                                        style="display: none"
                                    />
                                    </div>
                            </tbody>
                        </table>  
                    <br>

                    <!-- Back and Submit Button -->
                    <div class="text-center">
                        <div class="row justify-content-center">

                            <a class="smallBtn adminBtn" role="button" href="modify_computer.php">< Back</a>
                            &nbsp;&nbsp;&nbsp;
                            <button type="submit" name="insertsales_info" class="smallBtn impBtn" value="submit" id="submit" >Submit </button>
                        </div>
                    </div>
                    </form>
                </div>               
            </div>         
        </div> 
    <br><br>

</body>

<script>

    function triggerClick() {
        document.querySelector("#updateLaptopImg").click();
    }

    function displayLaptopImg(e) {
              if (e.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                  document
                    .querySelector("#updateLaptopImgDisplay")
                    .setAttribute("src", e.target.result);
                };
                reader.readAsDataURL(e.files[0]);
              }
            }

</script>
</html>