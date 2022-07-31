<?php

    require 'connection.php';
    require 'navbar_admin.php';

    session_start();
    $adminID = $_SESSION['adminID'];

    if (!isset($_SESSION['adminID'])) {
        echo "<script> alert('Session not available. Please login');</script>";
        echo "<script> window.location.replace('login_admin.php')</script>";
    }    
    
    if(isset($_POST['addBtn']))
        {
            $Brand = $_POST['Brand'];
            $Model = $_POST['Model'];
            $Series = $_POST['Series'];
            $Processor = $_POST['Processor'];
            $Processor_Gen = $_POST['Processor_Gen'];
            $RAM = $_POST['RAM'];
            $Hard_Disk_Capacity = $_POST['Hard_Disk_Capacity'];
            $OS = $_POST['OS'];
            $Rating = $_POST['Rating'];
            $Price = $_POST['Price'];
            $LaptopImg = $_FILES['LaptopImg']['name'];
            $LaptopImgTempName = $_FILES['LaptopImg']['tmp_name'];
            $LaptopImgFolder = 'laptopImg/'.$LaptopImg;

            $target = 'laptopImg/'.$LaptopImg;

            if(!empty($Brand) && !empty($Price)&& !empty($LaptopImg))
            {
                if(empty($Model)){$Model="";}
                if(empty($Series)){$Series="";}
                if(empty($Processor)){$Processor="";}
                if(empty($Processor_Gen)){$Processor_Gen="";}
                if(empty($RAM)){$RAM="";}
                if(empty($Hard_Disk_Capacity)){$Hard_Disk_Capacity="";}
                if(empty($OS)){$OS="";}
                if(empty($Rating)){$Rating="";}

                $query = "INSERT INTO laptop (LaptopID, Brand, Model, Series, Processor, Processor_Gen, RAM, Hard_Disk_Capacity, OS, Rating, Price, LaptopImg)
                        VALUES (null, '$Brand', '$Model', '$Series', '$Processor', '$Processor_Gen', '$RAM', '$Hard_Disk_Capacity', '$OS', '$Rating', '$Price', '$LaptopImg')";
                $query_run = mysqli_query($connection, $query);

                // Check connection
                if ($query_run)
                {
                    move_uploaded_file($LaptopImgTempName, $LaptopImgFolder);
                    echo '<script> alert("New information added successfully."); </script>';
                    echo "<script> window.location.replace('add_newcomputer.php')</script>";
                }
                else
                {
                    echo '<script> alert("Data Not Saved. Please try again."); </script>';
                    echo "<script> window.location.replace('add_newcomputer.php')</script>";
                }
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Add New Computer</title>

        <!-- Bootstrap CSS -->
        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous"
        />
        <link rel="stylesheet" href="style.css">

        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    </head>

    <body style="background-color: #dee2e6;">
        <h1></h1>

        <!-- Bootstrap JS -->
        <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"
        ></script>
    </body>
        <div class="container-fluid" style="padding:50px">  
        <h3 class="text-center"><b>ADD NEW COMPUTER</b></h3><br>
            <div class="row justify-content-center">
                <div class="col-md-6">  
                    <form action="" method="POST" enctype="multipart/form-data" class="mt-10 border p-5 bg-white shadow needs-validation" novalidate>
                        <br>
                        <table>
                            <tbody>
                                <!-- Laptop Image -->
                                <img height="200" width="200" class="rounded mx-auto d-block" src="img/placeholder.png" style="object-fit: cover" id="LaptopImgDisplay" onclick="triggerClick()" />
                                <label for="LaptopImg"></label>
                                <input type="file" name="LaptopImg" onchange="displayImg(this);" id="LaptopImg" accept="image/jpg, image/jpeg, image/png" style="display: none" required />
                                <div class="text-center">
                                    <label id="emptyLaptopImg" class="text-danger" style="height: 10px"></label>
                                </div>

                                <br>

                                <!--Brand-->
                                <tr style="height: 50px">                            
                                    <td style="width: 250px;"><label for="Brand" class="form-label"> Brand <span class="text-danger">*</span></label></td>
                                    <td style="width: 300px;"><input type="text" class="form-control" id="Brand" name="Brand" required></td>
                                </tr>
                                <tr>                            
                                    <td></td>
                                    <td style=" padding-bottom: 15px" id="emptyBrand" class="text-danger text-center"></td>
                                </tr>

                                <!--Model-->
                                <tr style="height: 50px">                            
                                    <td style="width: 250px; padding-bottom: 15px"><label for="Model" class="form-label"> Model </label></td>
                                    <td style="width: 300px; padding-bottom: 15px"><input type="text" class="form-control" id="Model" name="Model" ></td>
                                </tr>
                                
                                <!--Series-->
                                <tr style="height: 50px;">                            
                                    <td style="width: 250px; padding-bottom: 15px"><label for="Series" class="form-label"> Series </label></td>
                                    <td style="width: 300px; padding-bottom: 15px"><input type="text" class="form-control" id="Series" name="Series" ></td>
                                </tr>
                                
                                <!--Processor-->
                                <tr style="height: 50px" class="spacer">                            
                                    <td style="width: 250px; padding-bottom: 15px"><label for="Processor" class="form-label"> Processor </label></td>
                                    <td style="width: 300px; padding-bottom: 15px"><input type="text" class="form-control" id="Processor" name="Processor" ></td>
                                </tr>
                                
                                <!--Processor Generation-->
                                <tr style="height: 50px">                            
                                    <td style="width: 250px; padding-bottom: 15px"><label for="Processor_Gen" class="form-label"> Processor Generation </label></td>
                                    <td style="width: 300px; padding-bottom: 15px"><input type="text" class="form-control" id="Processor_Gen" name="Processor_Gen" ></td>
                                </tr>
                                
                                <!--RAM-->
                                <tr style="height: 50px">                            
                                    <td style="width: 250px; padding-bottom: 15px"><label for="RAM" class="form-label"> RAM </label></td>
                                    <td style="width: 300px; padding-bottom: 15px"><input type="text" class="form-control" id="RAM" name="RAM" ></td>
                                </tr>
                                                    
                                <!--Hard Disk Capacity-->
                                <tr style="height: 50px">                            
                                    <td style="width: 250px; padding-bottom: 15px"><label for="Hard_Disk_Capacity" class="form-label"> Hard Disk Capacity </label></td>
                                    <td style="width: 300px; padding-bottom: 15px"><input type="text" class="form-control" id="Hard_Disk_Capacity" name="Hard_Disk_Capacity" ></td>
                                </tr>
                                                    
                                <!--Operating System-->
                                <tr style="height: 50px">                            
                                    <td style="width: 250px; padding-bottom: 15px"><label for="OS" class="form-label"> Operating System </label></td>
                                    <td style="width: 300px; padding-bottom: 15px"><input type="text" class="form-control" id="OS" name="OS" ></td>
                                </tr>
                                                    
                                <!--Rating-->
                                <tr style="height: 50px">                            
                                    <td style="width: 250px; padding-bottom: 15px"><label for="Rating" class="form-label"> Rating </label></td>
                                    <td style="width: 300px; padding-bottom: 15px"><input type="text" class="form-control" id="Rating" name="Rating" ></td>
                                </tr>

                                <!--Price-->
                                <tr style="height: 50px">                            
                                    <td style="width: 250px;"><label for="Price" class="form-label"> Price <span class="text-danger">*</span></label></td>
                                    <td style="width: 300px;"><input type="text" class="form-control" id="Price" name="Price" required></td>
                                </tr>
                                <tr>                            
                                    <td></td>
                                    <td style=" padding-bottom: 15px" id="emptyPrice" class="text-danger text-center"></td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <div class="row justify-content-center">
                            <a class="smallBtn adminBtn" role="button" href="computer_salesinfo.php">< Back</a>
                            &nbsp;&nbsp;&nbsp;
                            <button type="reset" name="reset" id="reset" class="smallBtn adminBtn" value="clear">Clear</button>
                            &nbsp;&nbsp;&nbsp;
                            <button type="submit" name="addBtn" id="addBtn" class="smallBtn impBtn" value="submit" onclick="checkEmpty()">Submit</button>
                        </div>
                        </div>
                    </form>
                </div>               
            </div>         
        </div>
    </body>
    
    <script>
        // Disable form submissions if there are invalid fields
        (function ()
        {
            "use strict"; window.addEventListener("load", function ()
            {
                // Get the forms we want to add validation styles to
                var forms = document.getElementsByClassName("needs-validation");
                
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form)
                {
                    form.addEventListener("submit", function (event)
                    {
                        if (form.checkValidity() === false)
                        {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                    }, false );
                } );
            }, false );
        })();
    </script>

    <script>
        function triggerClick()
        {
            document.querySelector("#LaptopImg").click();
        }
    </script>

    <script>
        function displayImg(e)
        {
            if (e.files[0])
            {
                var reader = new FileReader();
                reader.onload = function (e)
                {
                    document.querySelector("#LaptopImgDisplay").setAttribute("src", e.target.result);
                };
                reader.readAsDataURL(e.files[0]);
            }
        }
    </script>

    <script>
        function checkImg()
        {
            let LaptopImg = document.getElementById("LaptopImg").value;

            if(LaptopImg == "")
            {
                emptyLaptopImg = "Please insert your profile picture";
            }

            else
            {
            emptyLaptopImg = "";
            }
        }            
    </script>

    <script>
        function checkEmpty()
        {
            let Brand = document.getElementById("Brand").value;
            let Price = document.getElementById("Price").value;
            let LaptopImg = document.getElementById("LaptopImg").value;

            if (Brand == "")
            {
                emptyBrand.textContent = "Please fill in the laptop BRAND.";
            }
            else
            {
                emptyBrand.textContent = "";
            }

            if (Price == "")
            {
                emptyPrice.textContent = "Please fill in the laptop PRICE.";
            }
            else
            {
                emptyPrice.textContent = "";
            }

            if (LaptopImg == "")
            {
                emptyLaptopImg.textContent = "Please insert the laptop IMAGE.";
            }
            else
            {
                emptyLaptopImg.textContent = "";
            }
        }
    </script>
</html>