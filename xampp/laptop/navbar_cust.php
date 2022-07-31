<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
              <a class="nav-link active" aria-current="page" href="profile.php">Profile</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="retrieve_computer.php">Product</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="cart.php">Cart</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="#">Order</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="logout_cust">Logout</a>
            </li>

          </ul>
        </span>
      </div>
    </div>
  </nav>
  
</body>
</html>