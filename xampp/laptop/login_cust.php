<?php

    require 'connection.php';
    session_start();
    $_SESSION["sessionid"]=session_id();

    if (isset($_POST['login'])) {
      include 'connection.php';
      $custName = $_POST['custName'];
      $custPassword = $_POST['custPassword'];
      $sqllogin = "SELECT * FROM customer WHERE custName = '$custName' AND custPassword='$custPassword'";
      $result = mysqli_query($connection, $sqllogin);
      $number_of_rows = mysqli_num_rows($result);
      
      if ($number_of_rows != 0) {
          
        $select = mysqli_query($connection, "SELECT custID FROM customer where custName = '$custName' AND custPassword='$custPassword'");
        $custID = mysqli_fetch_assoc($select)['custID'];

          $_SESSION['custID'] = "$custID" ;
          echo "<script>alert('Login Success');</script>";
          echo "<script> window.location.replace('home_cust.php')</script>";
        } else {
          echo "<script>alert('Login Failed');</script>";
          echo "<script> window.location.replace('login_cust.php')</script>";
        }
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Customer Login</title>

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="style.css">
  </head>

  <body style="background-color: #e7ecda;">
    <!-- Bootstrap JS -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>

  <!-- Login Form -->

  <br><br><br><br>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-10 mx-auto">
        <div class="login-form">
          <form
            action=""
            method="POST"
            enctype="multipart/form-data"
            class="mt-7 border p-4 shadow needs-validation"
            style="background-color: #f6f4f1;"
            novalidate
        >

            <!-- Header -->
            <h3 class="mb-3 text-center">CUSTOMER LOGIN</h3>

            <!-- Login Form -->
            <div class="mb-3 col-auto">
                <i class="material-icons">person</i> Name <span class="text-danger">*</span>
                <input
                type="text"
                class="form-control"
                id="custName"
                name="custName"
                pattern="[A-Za-z]+"
                required
            />
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">
              Please enter valid name : Only capital or small letters.
            </div>
            </div>

            <br>

            <div class="mb-3 col-auto">
                <label for="custPassword" class="form-label"
                ><i class="material-icons">lock</i> Password <span class="text-danger">*</span></label
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
                    <input type="checkbox" name="checkbox" id="checkbox" onclick="showPassword()" />
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
            

            <div class="text-center">
            <button
                type="button"
                name="back"
                class="btn"
                onclick="location.href='welcome.php';"  
                value="back"
                id="back"
              >Back
              </button>
              
              &nbsp; &nbsp; &nbsp;

              <button
                type="submit"
                name="login"
                class="btn"
                value="Login"
                id="login"
              >Login
              </button>
            </div>

            <p class="mt-3 text-secondary text-center">
              No account? <a href="registration.php">Register Now</a>
            </p>
        </form>    

            
        
        <!-- Show password by checking the box -->
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

      function showPassword() {
              if (checkbox.checked === true) {
                  custPassword.type = "text";
                } else {
                  custPassword.type = "password";
                }
            }
        </script>
        </div>
        </div>
        </div>
        </div>
</html>