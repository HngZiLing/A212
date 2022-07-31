<?php
    require 'connection.php';
    require 'navbar_admin.php';

    session_start();
    $adminID = $_SESSION['adminID'];

    if (!isset($_SESSION['adminID'])) {
        echo "<script> alert('Session not available. Please login');</script>";
        echo "<script> window.location.replace('login_admin.php')</script>";
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

  <title>Category</title>

</head>

<body style="background-color: #dee2e6">           
<br><br>
  <div class="container-fluid">
     <h3 class="text-center"><b>COMPUTER CATEGORY</b></h3>
       <div class="row justify-content-center">
          <div class="col-md-6">        
             <form
               action="computer_salesinfo.php"
               method="POST"
               enctype="multipart/form-data"
               class="mt-4 border p-4 bg-white shadow needs-validation"
               novalidate
             >
             <div class="text-center">
               <p class="fw-normal mb-4">Please choose your task</p>
               
               <a class="btn adminBtn mb-4" href="add_newcategory.php" role="button">Add New Computer Category</a>
            
               <a class="btn adminBtn mb-4" href="modify_category.php" role="button">Modify Computer Category</a>
            
               <a class="btn adminBtn" href="view_category.php" role="button">View All Computer Category</a>
              </div>
              <br>
        
          </div>
       </div>
  </div>


</body>
</html>