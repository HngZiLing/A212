<?php

    require 'connection.php';
    require 'navbar_cust.php';
    session_start();
    $custID = $_SESSION['custID'];

    if (!isset($_SESSION['custID'])) {
        echo "<script> alert('Session not available. Please login');</script>";
        echo "<script> window.location.replace('login.php')</script>";
    }

    if(isset($_POST['update'])){

        $updateImg = $_FILES['updateImg']['name'];
        $updateImgSize = $_FILES['updateImg']['size'];
        $updateImgTempName = $_FILES['updateImg']['tmp_name'];
        $updateImgFolder = 'customerImg/'.$updateImg;
        
        $target = 'customerImg/' . $updateImg;

        $updateName = mysqli_real_escape_string($connection, $_POST['updateName']);
        $updatePhoneNo = mysqli_real_escape_string($connection, $_POST['updatePhoneNo']);
        $updateAddress = mysqli_real_escape_string($connection, $_POST['updateAddress']);
        $updatePassword = mysqli_real_escape_string($connection, $_POST['confirmNewPassword']);

        if(!empty($updateName) || !empty($updatePhoneNo) || !empty($updateAddress) || !empty($updatePassword)){
          mysqli_query($connection, " UPDATE customer set custName = '$updateName', custPhoneNo = '$updatePhoneNo', custAddress = '$updateAddress', custPassword = '$updatePassword'  WHERE custID = '$custID' ")or die('query failed');
          
          if(!empty($updateImg)){
            $img_query = "UPDATE customer SET custImg = '$updateImg' WHERE custID = '$custID'";
            $img_query_run = mysqli_query($connection, $img_query);
            if($img_query_run){
              move_uploaded_file($updateImgTempName, $updateImgFolder);
            }
        }
      }
    }?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>User Login</title>

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

  <body style='background-color: #eaece6'>
    <!-- Bootstrap JS -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>

  </body >

  <!-- Login Form -->

  <br>
  
  <div class="container">
    <div class="row mx-auto" style="height:480px" >
      <div class="col-lg-10 col-md-10 mx-auto">
        <div class="login-form">

          <?php
              $select = mysqli_query($connection, "SELECT * FROM customer where custID = '$custID'")
              or die('query failed');

              if(mysqli_num_rows($select) > 0){
                  $fetch = mysqli_fetch_assoc($select);}
          ?>

          <form
            action=""
            method="POST"
            enctype="multipart/form-data"
            class="border p-4 shadow needs-validation form-horizontal"
            style="background-color: #f9f9fa;"
            novalidate
        >

        <h3 class="mb-3 text-center"> PROFILE</h3>
        
        <div class="mb-3 col-auto">
              <img
                <?php $custImg = $fetch['custImg']; ?>
                height="200"
                width="200"
                class="rounded-circle mx-auto d-block"
                src="customerImg/<?php echo $custImg; ?>"
                style="object-fit: cover"
                id="updateImgDisplay"
                onclick="triggerClick()"
              />
              <label for="updateImg"></label>
              <input
                type="file"
                name="updateImg"
                onchange="displayImg(this);"
                id="updateImg"
                accept="image/jpg, image/jpeg, image/png"
                style="display: none"
                disabled
              />
            </div>
            <!-- Header -->
            
            <div class="row mb-3 col-auto">
              <label for="custID" class="col-sm-3 col-form-label"><i class="material-icons">info_outline</i> Customer ID </label>
              <div class="col-sm-9">
                <input
                  type="text"
                  class="form-control"
                  id="custID"
                  name="custID"
                  value="<?php echo $fetch['custID'] ?>"
                  disabled
                />
              </div>
            </div>

            <!-- Customer Name -->
            <div class="row mb-3 col-auto">
              <label for="updateName" class="col-sm-3 col-form-label"><i class="material-icons">person</i> Name </label>
              <div class="col-sm-9">
                <input
                  type="text"
                  class="form-control"
                  id="updateName"
                  name="updateName"
                  value="<?php echo $fetch['custName'] ?>"
                  disabled
                  required
                />
                  <div class="valid-feedback"></div>
                  <div class="invalid-feedback">
                    Please enter your name
                  </div>
              </div>
            </div>
              

            <!-- Customer Phone Number -->
            <div class="row mb-3 col-auto">
              <label for="updatePhoneNo" class="col-sm-3 col-form-label"><i class="material-icons">phone</i> Phone Number </label>
              <div class="col-sm-9">
                <input
                  type="text"
                  class="form-control"
                  id="updatePhoneNo"
                  name="updatePhoneNo"
                  value="<?php echo $fetch['custPhoneNo'] ?>"
                  pattern="[0-9]{10}"
                  disabled
                  required
                >
                  <div class="valid-feedback"></div>
                  <div class="invalid-feedback">
                    Please enter valid phone number : Must have 10 digits
                  </div>
                </div>
            </div>

            <div class="row mb-3 col-auto">
              <label for="updateAddress" class="col-sm-3 col-form-label"><i class="material-icons">location_city</i> Address </label>
              <div class="col-sm-9">
                <input
                  type="text"
                  class="form-control"
                  id="updateAddress"
                  name="updateAddress"
                  value="<?php echo $fetch['custAddress'] ?>"
                  disabled
                  required
                >
                  <div class="valid-feedback"></div>
                  <div class="invalid-feedback">
                  Please enter your address
                  </div>
                </div>
            </div>

            <div class="">
              <div class="row">
                  <label for="oldPasswsord" class="col-sm-3 col-form-label"><i class="material-icons">lock</i> Current Password</label>

                  <div class="col-sm-9">

                  <input type="hidden" name="oldPassword" id="oldPassword" value="<?php echo $fetch['custPassword']; ?>">

                  <input type="password" class="form-control" name="confirmOldPassword" id="confirmOldPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="box" value="<?php echo $fetch['custPassword']; ?>" onchange="checkOldPassword()"
                  onchange="checkValidity()" disabled required>
                  
                  <div class="valid-feedback"></div>
                    <div class="invalid-feedback">
                      Please enter currrent password
                    </div>
                  
                  <div class="row">
                      <div id="oldmatchmsg" class="text-success"></div>
                      <div id="oldnotmatchmsg" class="text-danger"></div>
                  </div>
              
              <div hidden id="oldCheckbox" class="form-group row mb-3 col-auto">
                    <div class="col-sm-9">
                      <input class="" type="checkbox" id="checkOld" onclick="showOldPassword()"/> Show Password</div>
                </div>
              </div></div></div>

            <div hidden class="" id="newPassword">
              <div class="row">
                  <label for="updatePassword" class="col-sm-3 col-form-label"><i class="material-icons">lock</i> New Password</label>
                
                <div class="col-sm-9">
                  <input type="password" class="form-control" name="updatePassword" id="updatePassword" value="" onchange="fillNewPassword()" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="box" placeholder="Please enter the current password if you don't want to change it.">
                  
                  <div class="valid-feedback"></div>
                  <div class="invalid-feedback">
                    Please enter valid password : Must contain at least 1 number and
                    1 uppercase and lowercase letter, and at least 8 or more
                    characters"
                  </div>
                </div>
              </div>
              
              <div id="newCheckbox" class="form-group row mb-3 col-auto">
                  <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                      <input class="" type="checkbox" id="checkNew" onclick="showNewPassword()"/> Show Password</div>
              </div>

            <div id="confirmPassword" class="form-group row mb-3 col-auto">
              <label for="confirmNewPassword" class="col-sm-3 col-form-label"><i class="material-icons">vpn_key</i> Confirm Password</label>
              <div class="col-sm-9">
                <input
                  type="password"
                  class="form-control"
                  id="confirmNewPassword"
                  name="confirmNewPassword"
                  onchange="checkNewPassword()"
                  onchange="checkValidity()"
                  disabled
                  required
                />

                <div class="valid-feedback"></div>
                    <div class="invalid-feedback">
                      Please confirm your new password
                    </div>
                
                
                <div class="row">
                    <div id="newmatchmsg" class="text-success"></div>
                    <div id="newnotmatchmsg" class="text-danger"></div>
                </div></div>
              </div>
            </div>

            <div class="row mt-3 col-auto">
            <div class="text-center">
              <button
                type="button"
                id="edit"
                class="btn"
                value="edit"
                onclick="editProfile()"
              >
                Edit Profile
              </button>
              
              &nbsp;
              
              <button hidden
                type="submit"
                id="update"
                class="btn"
                name="update"
                value="update"
                onclick="checkOldPassword(); checkNewPassword(); "
              >
                Update Profile 
              </button>
            </div>
            </div>
            </div>
            </div>
        </form>

        <div class="container" style="height: 32px;"></div>
      
        <!-- Verify input -->
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

        <!-- Edit Profile -->
        <script>
          function editProfile(){
            document.getElementById("updateImg").disabled = false;
            document.getElementById("updateName").disabled = false;
            document.getElementById("updatePhoneNo").disabled = false;
            document.getElementById("updateAddress").disabled = false;
            document.getElementById("confirmOldPassword").disabled = false;
            document.getElementById("confirmOldPassword").value = "";
            document.getElementById("oldCheckbox").hidden = false;
            document.getElementById("newPassword").hidden = false;
            document.getElementById("update").hidden = false;
            document.getElementById("edit").hidden = true;
          }
        </script>

        <script>
          function fillNewPassword(){
            if (document.getElementById("updatePassword").value != ""){
              document.getElementById("confirmNewPassword").disabled = false;
            }
            else{
              document.getElementById("confirmNewPassword").value = "";
              document.getElementById("confirmNewPassword").disabled = true;
              document.getElementById("newnotmatchmsg").textContent = "";
              document.getElementById("newmatchmsg").textContent = "";
            }
          }
        </script>

          <!-- Check Old Password -->
        <script>
            function checkOldPassword() {
              let custPassword = document.getElementById("oldPassword").value;
              let confirmOldPassword = document.getElementById("confirmOldPassword").value;
              console.log(custPassword, confirmOldPassword);
              let oldnotmatchmsg = document.getElementById("oldnotmatchmsg");
              let oldmatchmsg = document.getElementById("oldmatchmsg");

              if (confirmOldPassword.length != 0) {
                if (confirmOldPassword == custPassword) {
                  oldmatchmsg.textContent = "Password match";
                  oldnotmatchmsg.textContent = "";
                } else {
                  oldnotmatchmsg.textContent = "Old password do not match. Try again.";
                  oldmatchmsg.textContent = "";
                  document.getElementById("confirmOldPassword").value = null;
                }
              }
            }
          </script>

        <!-- Check Password -->
        <script>
          function checkNewPassword() {

            if (document.getElementById("confirmNewPassword").disabled == true){
                  newmatchmsg.textContent = "";
                  newnotmatchmsg.textContent = "";
            }
            else{
              let updatePassword = document.getElementById("updatePassword").value;
              let confirmNewPassword = document.getElementById("confirmNewPassword").value;
              console.log(updatePassword, confirmNewPassword);
              let newnotmatchmsg = document.getElementById("newnotmatchmsg");
              let newmatchmsg = document.getElementById("newmatchmsg");

              if (document.getElementById("confirmNewPassword").value != null) {
                if (confirmNewPassword == updatePassword) {
                  newmatchmsg.textContent = "Password match";
                  newnotmatchmsg.textContent = "";
                } else {
                  newnotmatchmsg.textContent = "New password do not match. Try again.";
                  newmatchmsg.textContent = "";
                  document.getElementById("confirmNewPassword").value = null;
                  }
                }
              }
            }
        </script>

        <!-- Show Password by checking box -->
        <script>
          function showOldPassword() {
              var oldPassword = document.getElementById("confirmOldPassword");
              var oldCheckBox = document.getElementById("checkOld");

                if (oldCheckBox.checked === true) {
                  oldPassword.type = "text";
                } else {
                  oldPassword.type = "password";
                }
              }

          function showNewPassword() {
              var updatePassword = document.getElementById("updatePassword");
              var newCheckBox = document.getElementById("checkNew");

              if (newCheckBox.checked === true) {
                  updatePassword.type = "text";
                } else {
                  updatePassword.type = "password";
                }
            }
        </script>

        <!-- Trigger Click Image -->
        <script>
            function triggerClick() {
              document.querySelector("#updateImg").click();
            }

            function displayImg(e) {
              if (e.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                  document
                    .querySelector("#updateImgDisplay")
                    .setAttribute("src", e.target.result);
                };
                reader.readAsDataURL(e.files[0]);
              }
            }
        </script>

        </div>
        </div>
        </div>
        </div>
</html>