<?php

    require 'connection.php';
    require 'navbar_admin.php';

    session_start();
    $adminID = $_SESSION['adminID'];

    if (!isset($_SESSION['adminID'])) {
        echo "<script> alert('Session not available. Please login');</script>";
        echo "<script> window.location.replace('login_admin.php')</script>";
    }

    $sql = "SELECT * FROM laptop";
    $result = query($sql);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
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

  <title>View All Computer</title>

</head>

<body style="background-color: #dee2e6">
 

  <div class="container">
    <br><br>
    <h3 class="text-center"><b>LIST OF COMPUTER</b></h3><br>
    
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <table class="table table-bordered table-striped" style="background: white">
              <thead>
                <tr align="center" style="background: #deebf2">
                  <th scope="col" class="text-center">No.</th>
                  <th scope="col" class="text-center">LaptopID</th>
                  <th scope="col" class="text-center">Brand</th>
                  <th scope="col" class="text-center">Model</th>
                  <th scope="col" class="text-center"></th>          
                </tr>
              </thead>

              <tbody>
              <?php $i=1;
                  foreach ($result as $laptop):;
              ?>

              <tr>
                <td class="text-center"><?= $i++;  ?></td>
                <td class="text-center"><?= $laptop['LaptopID']; ?></td>
                <td class="text-center"><?= $laptop['Brand']; ?></td>
                <td class="text-center"><?= $laptop['Model']; ?></td>
                <td class="text-center" style="width:250px"><a class="thinBtn adminBtn" href="detail_computer.php?LaptopID=<?php echo $laptop['LaptopID']; ?>"> View Details </a></td>        
              </tr>

              <?php endforeach;?>
              </tbody>
            </table>
          </div>
        </div>
          <div class="text-center mb-5" style="width:30%">
            <a class="btn adminBtn" role="button" href="computer_salesinfo.php">< Back To Choose Another Task</a>
        </div>
      </div>

</body>
</html>