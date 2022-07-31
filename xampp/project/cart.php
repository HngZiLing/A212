<?php

     require 'connection.php';
     require 'navbar_cust.php';

     session_start();
     $custID = $_SESSION['custID'];

     if (!isset($_SESSION['custID'])) {
          echo "<script> alert('Session not available. Please login');</script>";
          echo "<script> window.location.replace('login_cust.php')</script>";
     }

     if(isset($_POST['update_update_btn'])){
          $update_quantity = $_POST['update_quantity'];
          $LaptopID = $_POST['LaptopID'];
          $update_quantity_query = mysqli_query($connection, "UPDATE `cart` SET quantity = '$update_quantity' WHERE LaptopID=$LaptopID AND custID=$custID");
          if($update_quantity_query){
               header('location:cart.php');
          };
     };

     if(isset($_GET['remove'])){
          $LaptopID = $_GET['remove'];
          mysqli_query($connection, "DELETE FROM `cart` WHERE LaptopID=$LaptopID AND custID=$custID");
          header('location:cart.php');
     };

     if(isset($_GET['delete_all'])){
          mysqli_query($connection, "DELETE FROM `cart` WHERE custID=$custID");
          header('location:cart.php');
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

    <title>Shopping Cart</title>
</head>

<body style="background-color: #eaece6">
     <div class="container" style="padding:50px">
          <h3 class="mb-3 text-center">Shopping Cart</h3><br>
          <div class="row justify-content-center">
               <div class="col-md-11">
                    <form action="checkout.php" method="POST">
                         <table class="table table-bordered table-striped" style="background-color:white">

                              <thead>

                                   <tr align="center" style="background: #d8dbcb">
                                        <th>Laptop</th>
                                        <th>Brand</th>
                                        <th>Model</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th style="width:220px"></th>
                                   </tr>

                              </thead>

                              <tbody>

                              <?php 
                              $select_cart = mysqli_query($connection, "SELECT * FROM `cart` WHERE custID=$custID");
                              $total_amount = 0;

                              if(mysqli_num_rows($select_cart) > 0)
                              {
                                   while($fetch_cart = mysqli_fetch_assoc($select_cart))
                                   {?>
                                   <tr class="text-center" style="vertical-align: middle">
                                        <td><img height="150" width="150" src='laptopImg/<?php echo $fetch_cart['LaptopImg']; ?>' onerror="this.style.display = 'none'"></td>
                                        <td><?php echo $fetch_cart['Brand']; ?></td>
                                        <td><?php echo $fetch_cart['Model']; ?></td>
                                        <td>RM <?php echo number_format($fetch_cart['Price']); ?></td>
                                        <td>
                                             <form action="" method="post">
                                                  <div align="center">
                                                  <input type="hidden" name="LaptopID" value="<?php echo $fetch_cart['LaptopID']; ?>" >
                                                  
                                                  <input class="smallBtn text-center" style="cursor:default; bckground-color:white" type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['Quantity']; ?>" >
                                                  
                                                  <input type="submit" class="smallBtn custBtn"value="update" name="update_update_btn" formaction="cart.php">
                                   </div>
                                             </form>   
                                        </td>
                                        <td>RM <?php echo number_format($sub_total = (int)($fetch_cart['Price'] * $fetch_cart['Quantity'])); ?></td>
                                        <td><div class="row justify-content-center"><a role="button" href="cart.php?remove=<?php echo $fetch_cart['LaptopID']; ?>" onclick="return confirm('remove item from cart?')" class="smallBtn custBtn">Remove</a></div></td>
                                   </tr>
                                   <?php
                                   $total_amount += (int)$sub_total;  
                                   };
                              }
                              else
                                   {?>
                                        <tr  class="text-center">
                                             <td colspan="7">Your cart is empty.</td>
                                        </tr><?php
                                   };
                              ?>

                              <tr class="text-center" style="background: #d8dbcb; vertical-align: middle"">
                                   <td colspan="5" class="text-end"><b>Total Amount &nbsp;</b></td>
                                   <td class="text-center"><b>RM <?php echo number_format($total_amount); ?></b></td>
                                   <td><div class="row justify-content-center"><input type="submit" class="center smallBtn impBtn <?= ($total_amount > 1)?'':'disabled'; ?>" style="width:200px" value="Proceed To Checkout" name="order"></div></td>
                              </tr>

                              </tbody>
                         </table><br>

                         <div class="text-center">
                         <div class="row justify-content-center">
                              <a role="button" href="retrieve_computer.php" class="smallBtn adminBtn" style="width:250px">< Continue Shopping</a></td>
                              
                              &nbsp;&nbsp;&nbsp;

                              <a role="button" href="cart.php?delete_all" onclick="return confirm('Are you sure you want to delete all?');" class="smallBtn adminBtn" style="width:250px">Delete All</a></td>

                         <div>
                         </div>
                    </form>
               </div>
          </div>
     </div>

     <!-- custom js file link  -->
     <script src="js/script.js"></script>

</body>
</html>