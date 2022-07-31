<?php

    require 'connection.php';

        if(isset($_POST['insertcustomer']))
        {
              $custImg = $_FILES['custImg']['name'];
              $custImgSize = $_FILES['custImg']['size'];
              $custImgTempName = $_FILES['custImg']['tmp_name'];
              $custImgFolder = 'customerImg/'.$custImg;
              $custName = $_POST['custName'];
              $custPhoneNo = $_POST['custPhoneNo'];
              $custAddress = $_POST['custAddress'];
              $custPassword = $_POST['custPassword'];

              $target = 'customerImg/' . $custImg;

              $query = "INSERT INTO customer (custID, custImg, custName, custPhoneNo, custAddress, custPassword)
                      VALUES (null, '$custImg', '$custName', '$custPhoneNo', '$custAddress', '$custPassword')";
              $query_run = mysqli_query($connection, $query);
              
              // Check connection
              if ($query_run)
              {
                  move_uploaded_file($custImgTempName, $custImgFolder);
                  echo '<script> alert("Data Saved. Login Now."); </script>';
                  echo "<script> window.location.replace('login_cust.php')</script>";
                }
              else
              {
                  echo '<script> alert("Data Not Saved. Please try again."); </script>';
                  echo "<script> window.location.replace('registration.php')</script>";
                }

            }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>User Registration</title>

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

  <body style="background-color: #ebddda;">
    <h1></h1>

    <!-- Bootstrap JS -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>

  <!-- Registration Form -->

<br>

  <div class="container">
    <div class="row mx-auto" style="height:480px">
      <div class="col-lg9 col-md-10 mx-auto">
        <div class="registration-form">
          <form
            action=""
            method="POST"
            enctype="multipart/form-data"
            class="border p-4 shadow needs-validation"
            style="background-color: #f6f4f1;"
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
                accept="image/jpg, image/jpeg, image/png"
                style="display: none"
                required
              />
              <p id="imgmsg" class="text-danger text-center"></p>
            </div>

            <!-- Customer Name -->
            <div class="row mb-3 col-auto">
              <label for="custName" class="col-sm-3 col-form-label"
                ><i class="material-icons">person</i> Name <span class="text-danger">*</span></label
              >
              <div class="col-sm-9">
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
            </div>

            <!-- Customer Phone Number -->
            <div class="row mb-3 col-auto">
              <label for="custPhoneNo" class="col-sm-3 col-form-label"
                ><i class="material-icons">phone</i> Phone Number <span class="text-danger">*</span></label
              >
              <div class="col-sm-9">
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
                Please enter valid phone number : Only numeric values with 10 digit.
              </div>
            </div>
            </div>

            <!-- Customer Address -->
            <div class="row mb-3 col-auto">
              <label for="custAddress" class="col-sm-3 col-form-label"
                ><i class="material-icons">location_city</i> Address <span class="text-danger">*</span></label
              >
              <div class="col-sm-9">
              <input
                type="text"
                class="form-control"
                id="custAddress"
                name="custAddress"
                required
              />
              <div class="valid-feedback"></div>
              <div class="invalid-feedback">Please enter your address.</div>
            </div>
            </div>

            <!-- Customer Password -->
            <div class="row mb-3 col-auto">
              <label for="custPassword" class="col-sm-3 col-form-label"
                ><i class="material-icons">lock</i> Password <span class="text-danger">*</span></label
              >
              <div class="col-sm-9">
              <input
                type="password"
                class="form-control"
                id="custPassword"
                name="custPassword"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                required
              />

              <div class="form-group row col-auto">
                <div class="col-4">
                  <input type="checkbox" name="checkbox" id="checkbox" onclick="showPassword()" />
                  Show Password
                </div>
              </div>

                <div class="valid-feedback"></div>
                <div class="invalid-feedback">
                  Please enter valid password : Must contain at least 1 number and
                  1 uppercase and lowercase letter, and at least 8 or more
                  characters.
                </div>
                
              </div>

              
            </div>

            <!-- Confirm Customer Password -->
            <div class="row mb-3 col-auto">
              <label for="confirmPassword" class="col-sm-3 col-form-label"
                ><i class="material-icons">vpn_key</i> Confirm Password <span class="text-danger">*</span></label
              >
              <div class="col-sm-9">
              <input
                type="password"
                class="form-control"
                id="confirmPassword"
                name="confirmPassword"
                onchange="checkPassword()"
                onchange="checkValidity()"
                required
              />

              <div class="valid-feedback"></div>
                    <div class="invalid-feedback">
                      Please confirm your password.
                </div>

              <div class="row mb-3">
                <div id="matchmsg" class="text-success"></div>
                <div id="notmatchmsg" class="text-danger"></div>
            </div>
            </div>

            <br>

            <!-- Submit Button -->
            <div class="text-center mb-3">
              <button
                type="submit"
                name="insertcustomer"
                class="btn"
                value="submit"
                id="insertcustomer"
                onclick="checkImg(); checkPassword()"
              >
                Register
              </button>
            </div>

                <!-- If the user is already registered, click the link to login -->
              <p class="text-secondary text-center">
                Already registered? <a href="login_cust.php">Login Now</a>
              </p>
          </form>

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
          </script>

          <!-- click the picture to upload image -->
          <script>
            function triggerClick() {
              document.querySelector("#custImg").click();
            }

            function displayImg(e) {
              if (e.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                  document
                    .querySelector("#custImgDisplay")
                    .setAttribute("src", e.target.result);
                };
                reader.readAsDataURL(e.files[0]);
              }
            }
          </script>

          <!-- Check if customer image has been uploaded -->
          <script>
            function checkImg() {
              let custImg = document.getElementById("custImg").value;
              let insertcustomer =
                document.getElementById("insertcustomer").click;

              if(custImg == "") {
                imgmsg.textContent = "Please insert your profile picture";
              } else {
                imgmsg.textContent = "";
              }
            }

          </script>

          <!-- Check if the confirmation password is the same as the customer password -->
          <script>
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
              }
            }
          </script>

          <!-- Show password by checking the box -->
          <script>
            function showPassword() {
              if (checkbox.checked === true) {
                if (custPassword.type == "password")
                  custPassword.type = "text";
                } else {
                  custPassword.type = "password";
                }
            }
          </script>



        </div>

        <div class="container" style="height: 32px;"></div>

      </div>
    </div>
  </div>

</html>