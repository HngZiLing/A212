<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Navigation Bar</title>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #d8dbcb">
      <div class="container-fluid">
        <a class="navbar-brand" href="home_cust.php">Home</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="profile.php"><b>Profile</b></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="retrieve_computer.php"><b>Product</b></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="cart.php"><b>Cart</b></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="order_history.php"><b>Order</b></a>
            </li>
            </ul>

            <ul class="navbar-nav ml-auto"> 
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="logout_cust.php"><b>Logout</b></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </body>
</html>