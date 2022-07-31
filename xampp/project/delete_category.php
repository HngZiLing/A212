<?php
    require 'connection.php';
    require 'navbar_admin.php';
    
    $Brand=$_GET['Brand'];
    $sql= "SELECT * FROM `laptop` WHERE Brand='" . $_GET['Brand'] . "'";
    $detail = query( $sql)[0];

    session_start();
    $_SESSION["sessionid"]=session_id();
    $_SESSION['Brand'] = "$Brand" ;

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

    <title>Delete Computer Category</title>

</head>

<body style="background-color: #dee2e6">

    <div class="container-fluid">
        <br><br>    
        <h3 class="text-center"><b>DELETE COMPUTER CATEGORY</b></h3><br>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped" style="background-color:white">
                        <thead>
                            <tr style="background: #deebf2">
                                <th scope="col" class="text-center">LaptopID</th>
                                <th scope="col" class="text-center">Brand</th>  
                                <th scope="col" class="text-center">Model</th> 
                                <th scope="col" class="text-center">Series</th>
                                <th scope="col" class="text-center">Processor</th>
                                <th scope="col" class="text-center">Processor_Gen</th>
                                <th scope="col" class="text-center">RAM</th>
                                <th scope="col" class="text-center">Hard_Disk_Capacity</th>
                                <th scope="col" class="text-center">OS</th>
                                <th scope="col" class="text-center">Rating</th>
                                <th scope="col" class="text-center">Price</th>
                                <th scope="col" class="text-center">Image</th> 
                            </tr>
                        </thead>

                        <tbody> 
                            <tr>
                                <td class="text-center"><?php echo $detail['LaptopID']; ?></td>
                                <td class="text-center"><?php echo $detail['Brand']; ?></td>
                                <td class="text-center"><?php echo $detail['Model']; ?></td>
                                <td class="text-center"><?php echo $detail['Series']; ?></td>
                                <td class="text-center"><?php echo $detail['Processor']; ?></td>
                                <td class="text-center"><?php echo $detail['Processor_Gen']; ?></td>
                                <td class="text-center"><?php echo $detail['RAM']; ?></td>
                                <td class="text-center"><?php echo $detail['Hard_Disk_Capacity']; ?></td>
                                <td class="text-center"><?php echo $detail['OS']; ?></td>
                                <td class="text-center"><?php echo $detail['Rating']; ?></td>
                                <td class="text-center"><?php echo $detail['Price']; ?></td>
                                <td class="text-center"><?php echo $detail['LaptopImg']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <form class="text-center" action="delete_category_successful.php" method="GET">
            <div class="row justify-content-center">
                <input type="hidden" name="Brand" value="<?php echo $result['Brand']; ?>">
                
                <a class="smallBtn adminBtn" role="button" href="modify_category.php">< Back</a>
                &nbsp;&nbsp;&nbsp;
                <button type="submit" name="delBtn" class="smallBtn impBtn" value="Delete" onclick="return confirm ('Confirm Delete Record?')">Delete </button>
            </div>
        </form>

        <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"
        ></script>
    </div>

</body>
</html>