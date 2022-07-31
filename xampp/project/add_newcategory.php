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
        if(addCategory($_POST) > 0) {
            echo "<script>
                alert ('Success and new record');
                document.location.href='../project/view_category.php';
                </script>";

        }else{
            echo "Failre to add record";
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

    <title>Add New Computer Category</title>

</head>

<body style="background-color: #dee2e6">


    <br><br>
        <div class="container-fluid">  
        <h3 class="text-center"><b>ADD NEW COMPUTER CATEGORY</b></h3><br>     
            <div class="row justify-content-center">
                <div class="col-md-6">        
                    <form
                        action="add_newcategory.php"
                        method="POST"
                        enctype="multipart/form-data"
                        class="mt-10 border p-5 bg-white shadow needs-validation"
                        novalidate
                    > 

                    <table style="margin-left:30px;">
                        <tbody>
                            <!--Brand-->
                            <tr style="height: 50px;">                            
                                <td style="width: 200px;"><label for="Brand" class="form-label"><b>Brand</b></label></td>
                                <td><input type="text" class="form-control" id="Brand" name="Brand" required></td>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Please fill out this field.</div>                          
                            </tr>
                        </tbody>
                    </table>

                    <br>
                    <!-- Cancel and Submit Button -->
                    <div class="text-center">
                    <div class="row justify-content-center">
                    <a class="smallBtn adminBtn" role="button" href="computer_category.php">< Back</a>
                        &nbsp;&nbsp;&nbsp;
                        <button type="reset" name="resetBtn" class="smallBtn adminBtn" value="Cancel">Clear</button>
                        &nbsp;&nbsp;&nbsp;
                        <button type="submit" name="addBtn" class="smallBtn impBtn">Submit </button>
                    </div></div>
                    </form>

                    <script>
                    // Disable form submissions if there are invalid fields
                    (function () {
                        "use strict"; window.addEventListener("load", function () {
                    // Get the forms we want to add validation styles to
                    var forms =
                    document.getElementsByClassName("needs-validation");
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function (form) {
                        form.addEventListener("submit", function (event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add("was-validated");
                        },false
                        );
                    }
                    );
                        },false
                        );
                    })();
                    </script>

                </div>
            </div>
        </div>
</body>
</html>