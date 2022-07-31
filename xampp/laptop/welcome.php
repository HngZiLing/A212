<?php
    require 'connection.php';

    if(isset($_POST['insertcustomer']))
        {
            echo "<pre>", print_r($_FILES['custImg']['image']), "</pre>";

            $custImg = time() . '_' . $_FILES['custImg']['image'];
            $custName = $_POST['custName'];
            $custPhoneNo = $_POST['custPhoneNo'];
            $custAddress = $_POST['custAddress'];
            $custPassword = $_POST['custPassword'];

            $target = 'img/' . $custImg;

            $query = "INSERT INTO customer (custID, custImg, custName, custPhoneNo, custAddress, custPassword) VALUES (null, '$custImg', '$custName', '$custPhoneNo', '$custAddress', '$custPassword')";
            $query_run = mysqli_query($connection, $query);

            // Check connection
            if ($query_run)
            {
                function_alert("Data Saved");
                header('Location: welcome.php');
            }
            else
            {
                echo '<script> alert("Data Not Saved"); </script>';
            }
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
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

        <title>Welcome</title>

        <link rel="stylesheet" href="style.css">
    </head>
<body>

    <div class="mask rgba-black-strong h-100">
    <div class="container">
        <div class="row">
        <div class="col-lg-7 col-md-10 mx-auto">

        <br><br><br>
            
            <!-- Rotating card -->
            <div class="card-wrapper shadow">
            <div id="my-card" class="card card-rotating text-center">

                <!-- Front Side -->
                <div class="face front">
                <div class="card-body">

                <!-- Login -->
                <form
                    action="welcome.php"
                    method="POST"
                    enctype="multipart/form-data"
                    class="mt-7 p-4 needs-validation"
                    novalidate
                >

                    <!-- Header -->
                    <h3 class="mb-3 text-center"><i class="material-icons">forward</i> LOGIN</h3>

                    <!-- Login Form -->
                    <div class="md-form">
                        <i class="material-icons">person</i> Name <span class="text-danger">*</span>
                        <input
                        type="text"
                        class="form-control validate"
                        id="custNamelogin"
                        name="custNamelogin"
                        pattern="[A-Za-z\s]{,255}"
                        required
                        autofocus
                    />
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">
                        Please enter your name
                    </div>

                    <br>

                    <div class="md-form">
                        <i class="material-icons">lock</i> Password <span class="text-danger">*</span>
                        <input
                        type="password"
                        class="form-control"
                        id="custPasswordlogin"
                        name="custPasswordlogin"
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        required
                    />

                    <div class="row justify-content-end">
                        <div class="col-4">
                        <input type="checkbox" name="" onclick="showLoginPassword()" />
                        Show Password
                        </div>
                    </div>

                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">
                        Please enter valid password : Must contain at least 1 number and
                        1 uppercase and lowercase letter, and at least 8 or more
                        characters"
                    </div>
                    </div>
                    </div>

                    <div class="d-flex justify-content-between">

                    <!-- Triggering button -->
                    <a class="rotate-btn text-primary" tabIndex="-1" data-card="my-card">Create an account</a>
                    
                </div>

                    <div class="text-center">
                        <button type="submit" name="login" id="login" class="btn" onclick="login()" >Login</button>
                    </div>
                </form>
                <!-- Login End-->

                </div>
                </div>
                <!-- Front Side End-->

                <!-- Back Side -->
                <div class="face back">
                <div class="card-body">

                <form
                    action="welcome.php"
                    method="POST"
                    enctype="multipart/form-data"
                    class="mt-7 p-4 needs-validation"
                    novalidate
                >
                    <h3 class="mb-3 text-center"><i class="material-icons">add_circle</i> REGISTER</h3>

                    <!-- Customer Image -->
                    <div class="mb-3 col-auto">
                    <img
                        height="200"
                        width="200"
                        class="rounded-circle mx-auto d-block"
                        src="img/placeholder.png"
                        style="object-fit: cover"
                        id="custImgDisplay"
                        onclick="triggerClick()"
                    />
                    <label for="custImg"></label>
                    <input
                        type="file"
                        name="custImg"
                        onchange="checkImg(); displayImg(this);"
                        id="custImg"
                        style="display: none"
                        required
                    />
                    <p id="imgmsg" class="text-danger text-center"></p>
                    </div>

                    <!-- Customer Name -->
                    <div class="mb-3 col-auto">
                    <label for="custName" class="form-label"
                        ><i class="material-icons">person</i> Name <span class="text-danger">*</span></label
                    >
                    <input
                        type="text"
                        class="form-control"
                        id="custName"
                        name="custName"
                        pattern="[A-Za-z\s]{,255}"
                        required
                    />
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">
                        Please enter your name
                    </div>
                    </div>

                    <!-- Customer Phone Number -->
                    <div class="mb-3 col-auto">
                    <label for="custPhoneNo" class="form-label"
                        ><i class="material-icons">phone</i> Phone Number <span class="text-danger">*</span></label
                    >
                    <input
                        type="text"
                        class="form-control"
                        id="custPhoneNo"
                        name="custPhoneNo"
                        pattern="[0-9]{10}"
                        required
                    />
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">
                        Please enter valid phone number : Must have 10 digits
                    </div>
                    </div>

                    <!-- Customer Address -->
                    <div class="mb-3 col-auto">
                    <label for="custAddress" class="form-label"
                        ><i class="material-icons">location_city</i> Address <span class="text-danger">*</span></label
                    >
                    <input
                        type="text"
                        class="form-control"
                        id="custAddress"
                        name="custAddress"
                        required
                    />
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Please enter your address</div>
                    </div>

                    <!-- Customer Password -->
                    <div class="mb-3 col-auto">
                    <label for="custPassword" class="form-label"
                        ><i class="material-icons">lock</i> Password<span class="text-danger">*</span></label
                    >
                    <input
                        type="password"
                        class="form-control"
                        id="custPassword"
                        name="custPassword"
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        required
                    />

                    <div class="row justify-content-end">
                        <div class="col-4">
                        <input type="checkbox" name="" onclick="showPassword()" />
                        Show Password
                        </div>
                    </div>

                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">
                        Please enter valid password : Must contain at least 1 number and
                        1 uppercase and lowercase letter, and at least 8 or more
                        characters"
                    </div>
                    </div>

                    <!-- Confirm Customer Password -->
                    <div class="mb-3 col-auto">
                    <label for="confirmPassword" class="form-label"
                        ><i class="material-icons">vpn_key</i> Confirm Password <span class="text-danger">*</span></label
                    >
                    <input
                        type="password"
                        class="form-control"
                        id="confirmPassword"
                        name="confirmPassword"
                        onchange="checkPassword()"
                        onchange="checkValidity()"
                        required
                    />
                    <div class="row">
                        <div id="matchmsg" class="text-success"></div>
                        <div id="notmatchmsg" class="text-danger"></div>
                    </div>

                    <br>

                    <div class="d-flex justify-content-end">
                                <!-- Triggering button -->
                                <a class="rotate-btn text-primary" data-card="my-card" tabIndex="-3">back to login</a>
                            </div>

                    <br>

                    <!-- Submit Button -->
                    <div class="text-center">
                    <button
                        type="submit"
                        name="insertcustomer"
                        class="btn"
                        value="submit"
                        id="insertcustomer"
                        onclick="checkImg(); checkPassword();"
                    >
                        Submit
                    </button>
                    </div>
                </form>
          
                </div>
                </div>
                <!-- Back Side -->

            </div>
            </div>
            <!-- Rotating card -->

            
        </div>
        </div>
    </div>
    </div>

</body>

<script>
    // Disable form submissions if there are invalid fields
    (function () {
        "use strict";
        window.addEventListener(
        "load",
        function () {
            // Get the forms we want to add validation styles to
            var forms =
            document.getElementsByClassName("needs-validation");
            
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(
            forms,
            function (form) {
                form.addEventListener(
                "submit",
                function (event) {
                    if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    }
                    form.classList.add("was-validated");
                },
                false
                );
            }
            );
        },
        false
        );
    })();

//click the picture to upload image
    function triggerClick() {
    document.querySelector("#custImg").click();}

    function displayImg(e) {
    if (e.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
        document
            .querySelector("#custImgDisplay")
            .setAttribute("src", e.target.result);
        };
        reader.readAsDataURL(e.files[0]);

        checkForm();
    }
    }

// Check if customer image has been uploaded
    function checkImg() {
    let custImg = document.getElementById("custImg").value;
    let insertcustomer =
        document.getElementById("insertcustomer").click;

    if (custImg == "") {
        imgmsg.textContent = "Please insert your profile picture";
    } else {
        imgmsg.textContent = "";
    }
    }

// Check if the confirmation password is the same as the customer password
    function checkPassword() {
    let custPassword = document.getElementById("custPassword").value;
    let confirmPassword =
        document.getElementById("confirmPassword").value;
    console.log(custPassword, confirmPassword);
    let notmatchmsg = document.getElementById("notmatchmsg");
    let matchmsg = document.getElementById("matchmsg");

    if (confirmPassword.length != 0) {
        if (confirmPassword == custPassword) {
        matchmsg.textContent = "Password match";
        notmatchmsg.textContent = "";
        } else {
        notmatchmsg.textContent = "Password do not match. Try again.";
        matchmsg.textContent = "";
        document.getElementById("confirmPassword").value = null;
        }
    } else {
        notmatchmsg.textContent = "Please confirm your password";
        matchmsg.textContent = "";
    }
    }
    
    // Show password by checking the box
    function showLoginPassword() {
    var custPassword = document.getElementById("custPasswordlogin");
    if (custPassword.type === "password") {
        custPassword.type = "text";
    } else {
        custPassword.type = "password";
    }
    }

    // Show password by checking the box
    function showPassword() {
    var custPassword = document.getElementById("custPassword");
    if (custPassword.type === "password") {
        custPassword.type = "text";
    } else {
        custPassword.type = "password";
    }
    }

    function login(){
        $custName = $_POST['custNamelogin'];  
        $custPassword = $_POST['custPasswordlogin'];  

        //to prevent from mysqli injection  
        $custName = stripcslashes($custName);  
        $custPassword = stripcslashes($custPassword);  
        $custName = mysqli_real_escape_string($connection, $custName);  
        $custPassword = mysqli_real_escape_string($connection, $custPassword);  
    
        $sql = "SELECT * FROM customer where custName = '$custName' and custPassword = '$custPassword'";  
        $result = mysqli_query($connection, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  

        // if($count == 1){  
        //     echo "<h1><center> Login successful </center></h1>";  
        // }  
        // else{  
        //     echo "<h1> Login failed. Invalid username or password.</h1>";  
        // }
    }

</script>
</html>