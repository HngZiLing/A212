<?php

    require 'connection.php';
    require 'navbar_admin.php';

    session_start();
    $adminID = $_SESSION['adminID'];

    if (!isset($_SESSION['adminID'])) {
        echo "<script> alert('Session not available. Please login');</script>";
        echo "<script> window.location.replace('login_admin.php')</script>";
    }

    $OrderID=$_GET['OrderID'];
    $sql = "SELECT * FROM `order_list` WHERE OrderID = $OrderID";
    $row = query($sql)[0];

    if (isset($_POST['updateBtn'])){        
        //var_dump($_POST);   
        if (updateOrderStatus($_POST)> 0){    
            echo "<script>
                alert('Success update record');
                document.location.href='../project/computer_order.php';
                </script>";
        }else{
            echo "<script>alert('Please insert new delivery status');</script>";
        }
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

    <title>Update Order Status</title>

</head>

<body style="background-color: #dee2e6">

    <br><br>
        <div class="container-fluid">       
            <div class="row justify-content-center">
                <div class="col-md-6">  
    
                        <form method="POST" action="" 
                        class="mt-10 border p-5 bg-white shadow needs-validation"
                        novalidate>

                        
                        <br>
                        <h3 class="text-center" style="color: teal;">UPDATE ORDER STATUS</h3><br>

                        <table style="margin-left:30px;">
                            <tbody>
                                <!--order id-->
                                <input type="hidden" name="OrderID" value="<?php echo $row['OrderID']; ?>">
                                <tr style="height: 50px;">                            
                                    <td style="width: 200px;"><label for="OrderID" class="form-label"><b>Order ID</b></label></td>
                                    <td><input type="text" readonly class="form-control-plaintext" id="OrderID" value="<?php echo $row['OrderID']; ?>"></td>
                                </tr>

                                <!--custid-->
                                <tr style="height: 50px;">
                                    <td style="width: 200px;"><label for="custID" class="form-label"><b>Customer ID</b></label></td>
                                    <td><input type="text" readonly class="form-control-plaintext" id="custID" value="<?php echo $row['custID']; ?>"></td>
                                </tr>

                                <!--laptop id-->
                                <tr style="height: 50px;">
                                    <td style="width: 200px;"><label for="LaptopID" class="form-label"><b>Laptop ID</b></label></td>
                                    <td><input type="text" readonly class="form-control-plaintext" id="LaptopID" value="<?php echo $row['LaptopID']; ?>"></td>
                                </tr>

                                <!--Price-->
                                <tr style="height: 50px;">
                                    <td style="width: 200px;"><label for="Price" class="form-label"><b>Price</b></label></td>
                                    <td><input type="text" readonly class="form-control-plaintext" id="Price" value="<?php echo $row['Price']; ?>"></td>
                                </tr>

                                <!--Quantity-->
                                    <td style="width: 200px;"><label for="Quantity" class="form-label"><b>Quantity</b></label></td>
                                    <td><input type="text" readonly class="form-control-plaintext" id="Quantity" value="<?php echo $row['Quantity']; ?>"></td>
                                </tr>

                                <!--Order Status-->
                                <tr style="height: 50px;">
                                    <td><label for="OrderStatus" class="form-label"><b>Order Status</b></label></td>
                                    <td><input type="text" class="form-control"name="OrderStatus" value="<?php echo $row['OrderStatus']; ?>"></td>
                                </tr>
                            </tbody>
                        </table>  
                        <br>

                        <!-- Back and Submit Button -->
                        <div class="text-center">
                            <div class="row justify-content-center">
                                <a class="smallBtn adminBtn" role="button" href="computer_order.php">Back</a>
                                &nbsp;&nbsp;&nbsp;
                                <button type="submit" name="updateBtn" class="smallBtn impBtn" >Update </button>
                            </div>
                        </div>
                    </form>
                </div>               
            </div>         
        </div> 
    <br><br>

</body>      
</html>