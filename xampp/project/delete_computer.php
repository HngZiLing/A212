<?php
    require 'connection.php';
    require 'navbar_admin.php';
    
    $LaptopID=$_GET['LaptopID'];
    
    $sql = "SELECT * FROM laptop where LaptopID= $LaptopID";
    $result = query( $sql)[0];

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

    <title>Delete Computer Details</title>

</head>

<body style="background-color: #dee2e6">

    <div class="container-fluid">
        <br><br>
        <h3 class="text-center"><b>DELETE COMPUTER DETAILS</b></h3><br>

        <div class="container mt-4">
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
                            <td class="text-center"><?php echo $result['LaptopID']; ?></td>
                            <td class="text-center"><?php echo $result['Brand']; ?></td>
                            <td class="text-center"><?php echo $result['Model']; ?></td>
                            <td class="text-center"><?php echo $result['Series']; ?></td>
                            <td class="text-center"><?php echo $result['Processor']; ?></td>
                            <td class="text-center"><?php echo $result['Processor_Gen']; ?></td>
                            <td class="text-center"><?php echo $result['RAM']; ?></td>
                            <td class="text-center"><?php echo $result['Hard_Disk_Capacity']; ?></td>
                            <td class="text-center"><?php echo $result['OS']; ?></td>
                            <td class="text-center"><?php echo $result['Rating']; ?></td>
                            <td class="text-center"><?php echo $result['Price']; ?></td>
                            <td class="text-center"><?php echo $result['LaptopImg']; ?></td>
                        </tr>

                    </tbody>
                </table>
                </div>
            </div>
        </div>

        <br>

        <!---Delete and Back Button--->
        <form class="text-center" action="delete_computer_successful.php" method="GET">
            <div class="row justify-content-center">

                <input type="hidden" name="LaptopID" value="<?php echo $result['LaptopID']; ?>">
                
                <a class="smallBtn adminBtn" role="button" href="modify_computer.php">< Back</a>
                &nbsp;&nbsp;&nbsp;
                <button type="submit" name="delBtn" class="smallBtn impBtn" value="Delete" onclick="return confirm ('Confirm Delete Record?')" >Delete </button>
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

