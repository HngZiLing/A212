<?php
   require 'connection.php';
   require 'navbar_cust.php';

     session_start();
     $custID = $_SESSION['custID'];

     if(!isset($_SESSION['custID'])){
          echo "<script> alert('Session not available. Please login');</script>";
          echo "<script> window.location.replace('login_cust.php')</script>";
     }

     $custInfo = mysqli_query($connection, "SELECT * FROM customer where custID = '$custID'")
     or die('query failed');

     if(mysqli_num_rows($custInfo) > 0){
         $fetch = mysqli_fetch_assoc($custInfo);
      }

      $cart_query = mysqli_query($connection, "SELECT * FROM `cart` WHERE custID=$custID");

      if(mysqli_num_rows($cart_query) == 0){
         echo "<script> alert('Your cart is empty.');</script>";
         echo "<script> window.location.replace('cart.php')</script>";
      }

      date_default_timezone_set('Asia/Kuala_Lumpur');
      $day = date('ydm', time());
      $time = date('His', time());

      if(isset($_POST['checkout'])){

         $custName = $_POST['custName'];
         $custPhoneNo = $_POST['custPhoneNo'];
         $custAddress = $_POST['custAddress'];
         $paymentMethod = $_POST['paymentMethod'];
         $OrderID = $_POST['OrderID'];
         $totalAmount = number_format($_POST['totalAmount']);

         $price_total = 0;
         if(mysqli_num_rows($cart_query) > 0){
            while($product_item = mysqli_fetch_assoc($cart_query)){
               $LaptopID[] = $product_item['LaptopID'];
               $Brand[] = ''.$product_item['Brand'].'';
               $Model[] = ''.$product_item['Model'].'';
               $Price[] = 'RM '.number_format($product_item['Price']).'';
               $Quantity[] = ''.$product_item['Quantity'].'';
               $OrderStatus="Preparing";
               $symbol1[] = "-";
               $symbol2[] = ":";
               $symbol3[] = "x";
            }

            $orderedLaptopID = implode("<br>", $LaptopID);
            $orderedBrand = implode("<br>", $Brand);
            $orderedModel = implode("<br>", $Model);
            $orderedPrice = implode("<br>", $Price);
            $orderedQuantity = implode("<br>", $Quantity);
            $orderedsymbol1 = implode("<br>", $symbol1);
            $orderedsymbol2 = implode("<br>", $symbol2);
            $orderedsymbol3 = implode("<br>", $symbol3);

            $cartorder_query = mysqli_query($connection, "INSERT INTO order_list (custID, LaptopID, Price, Quantity)
                        SELECT custID, LaptopID, Price, Quantity FROM cart WHERE custID=$custID");
            $update_query = mysqli_query($connection, "UPDATE order_list SET OrderID='$OrderID', OrderStatus='$OrderStatus' WHERE OrderID=''");
            
            if ($cartorder_query && $update_query){
               mysqli_query($connection, "DELETE FROM cart WHERE custID = $custID");
               echo "
               <div class='mx-auto justify-content-center'>
               <div class='container checkout-container'>
                  <div class=' container message-container shadow p-4' style='background-color:#f6f4f1'>
                     <div style='text-align: center'><h3><b>Thank you for Shopping !</b></h3></div>
                     <br>
                     <div class='row'>
                        <div class='column' style='width: 35%'>
                           <table class='table' style='border-color:#d8c1a9; border-style:solid'>
                              <tr class='text-center' style='background-color: #d8c1a9'><th colspan='2'>Customer Details</th><td></td></tr>
                              <tr><th>Name</th><td>$custName<td></tr>
                              <tr><th>Phone No</th><td>$custPhoneNo<td></tr>
                              <tr><th style='width:30%'>Address</th><td>$custAddress<td></tr>
                           </table>
                        </div>

                        <div class='column' style='width: 65%'>
                           <table class='table' style='border-color:#d8c1a9; border-style:solid'>
                              <tr class='text-center' style='background-color: #d8c1a9'><th colspan='2'>Order Details</th><td></td></tr>
                              <tr><th>Order ID</th><td>$OrderID<td></tr>
                              <tr><th style='width:25%'>Order</th>
                                 <td style='width:75%'>
                                    <div class='row'><div class='column' style='width:20%'>$orderedBrand</div>
                                    <div class='column' style='width:1%'>$orderedsymbol1</div>
                                    <div class='column' style='width:20%'>$orderedModel</div>
                                    <div class='column' style='width:1%'>$orderedsymbol2</div>
                                    <div class='column' style='width:30%'>$orderedPrice</div>
                                    <div class='column' style='width:1%'>$orderedsymbol3</div>
                                    <div class='column' style='width:5%'>$orderedQuantity</div>
                                 </td>
                              </tr>
                              <tr><th>Total Amount</th><td>RM $totalAmount<td></tr>
                              <tr><th style='width:30%'>Payment Method</th><td>$paymentMethod<td></tr>
                           </table>
                        </div>
                     </div>
                     <div style='text-align: center' class='row justify-content-center'><a href='retrieve_computer.php' class='smallBtn impBtn' style='width:250px'>Continue Shopping</a></div>
                  </div>
                  </div>
               </div>";
            }
         };

      }
?>

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

      <!-- Bootstrap JS -->
      <script
         src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
         integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
         crossorigin="anonymous"
      ></script>
      <title>Checkout</title>

   </head>

   <body style="background-color: #eaece6">
      <div class="container" style="padding:30px">
      <h4 class="text-center"> Checkout Now </h4>
         <form action="" method="post" class="border p-4 shadow needs-validation form-horizontal rounded " style="background-color:white">
            <table style="width:100%">
               <tbody>
                  <tr>
                     <td style="float:left; width: 28%" >
                        <p><h5 class="text-center"><b class="rounded">&nbsp;&nbsp;Your Order&nbsp;&nbsp;</b></h5></p>
                        <div class="container rounded text-center" style="background-color:#eaece6; padding-top:20px; padding-bottom:5px">
                           <?php

                           $select_cart = mysqli_query($connection, "SELECT * FROM `cart` WHERE custID=$custID");
                           $total = 0;
                           $totalAmount = 0;

                           if(mysqli_num_rows($select_cart) > 0){
                              while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                                 $total_price = (int)($fetch_cart['Price'] * $fetch_cart['Quantity']);
                                 $totalAmount = $total += (int)$total_price;
                           ?>
                           <p><span><b><?= $fetch_cart['Brand']; ?> : <?= $fetch_cart['Model']; ?></b><br>RM <?= number_format($fetch_cart['Price']); ?> x <?= $fetch_cart['Quantity']; ?> = RM<?= number_format($fetch_cart['Price']*$fetch_cart['Quantity']); ?><br></span></p>
                              <?php
                              }
                           }else{
                              echo "<div class='display-order'><span>your cart is empty!</span></div>";
                           }
                           ?>

                           <p><span class="totalAmount text-danger"><b> Total Amount :<br> RM <?= number_format($totalAmount); ?></b></span></p>
                           
                           <input type="hidden" name="totalAmount" value="<?php echo $totalAmount?>">
                        
                        </div>
                     </td>

                     <td style="float:right; width: 70%">
                        <p><h5 class="text-center"><b class="rounded">&nbsp;&nbsp;Your Delivery Information&nbsp;&nbsp;</b></h5></p>
                        <div class="container rounded" style="background-color:#eaece6; padding-left:50px; padding-right:50px; padding-top:30px; padding-bottom:10px">
                           <div class="row mb-4">
                              <div class="" style="width: 25%"><label for="custName">Name</label></div>
                              <div class="" style="width: 75%"><input style="background-color:white" class="form-control" type="text" value="<?php echo $fetch['custName']?>" disabled></div>
                              <input type="hidden" name="custName" value="<?php echo $fetch['custName']?>">
                           </div>

                           <div class="row mb-4">
                              <div class="" style="width: 25%"><label for="custPhoneNo">Phone Number</label></div>
                              <div class="" style="width: 75%"><input style="background-color:white" class="form-control" type="text" value="<?php echo $fetch['custPhoneNo']?>" disabled></div>
                              <input type="hidden" name="custPhoneNo" value="<?php echo $fetch['custPhoneNo']?>">
                           </div>

                           <div class="row mb-4">
                              <div class="" style="width: 25%"><label for="custAddress">Address</label></div>
                              <div class="" style="width: 75%"><input style="background-color:white" class="form-control" type="text" value="<?php echo $fetch['custAddress']?>" disabled></div>
                              <input type="hidden" name="custAddress" value="<?php echo $fetch['custAddress']?>">
                           </div>
                           
                           <div class="row mb-4">
                              <div class="" style="width: 25%"><label for="paymentMethod">Payment Method</label></div>
                              <div class="" style="width: 75%">
                                 <select name="paymentMethod" style="border-radius:5px; height:30px; width: 100%">
                                    <option value="Cash On Delivery" selected>&nbsp; Cash On Delivery</option>
                                    <option value="Credit Cart">&nbsp; Credit Card</option>
                                    <option value="PayPal">&nbsp; PayPal</option>
                                 </select>
                              </div>
                           </div>

                           <div>
                              <input type="hidden" name="OrderID" value="<?php echo (int)(''.$custID.''.$day.''.$time.'')?>">
                           </div>

                        </div>
                     </td>
                  </tr>
               </tbody>
            </table>

            <div class="mt-3 text-center row justify-content-center">
               <input class="smallBtn impBtn" type="submit" value="Order Now" name="checkout" class="btn">
            </div> 

         </form>
      </div>
   </body>
</html>