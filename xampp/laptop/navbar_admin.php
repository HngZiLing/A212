<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navigation Bar</title>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #bdd0da">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Home</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Laptop</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="#">Category</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="#">Order</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown">Report</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="report_info.php">Computer Information</a></li>
                <li><a class="dropdown-item" href="report_category.php">Computer Category</a></li>
                <li><a class="dropdown-item" href="report_order">Order</a></li>
              </ul>
            </li>

          </ul>
        </span>
      </div>
    </div>
  </nav>
  
</body>
</html>