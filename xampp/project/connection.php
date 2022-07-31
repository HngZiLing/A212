<?php

$connection = mysqli_connect("localhost","root","","mmdbsystem");

function connect(){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mmdbsystem";

    // Create connection
    return mysqli_connect($servername, $username, $password, $dbname);

    $connection = mysqli_connect("localhost","root","","mmdbsystem");

}

function query($sql){
    // Create connection
    $connection = mysqli_connect("localhost","root","","mmdbsystem");

    // Check connection
    if(!$connection){
        die('Connection Failed'. mysqli_connect_error());
    }

    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) { 
        // output data for each row
        
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;                    
        }
            $result=$rows;                          
        } else {                               
        echo "<h5> No Record Found </h5>";                       
        }
        
        
        return $result;                             
        mysqli_close($connection);
}  

        //add computer
        function addComputer($data){
            $connection=connect();
            $LaptopID= htmlspecialchars ($data['LaptopID']);
            $Brand= htmlspecialchars($data['Brand']);
            $Model= htmlspecialchars($data['Model']);            
            $Series= htmlspecialchars($data['Series']);
            $Processor= htmlspecialchars($data['Processor']);
            $Processor_Gen= htmlspecialchars($data['Processor_Gen']);
            $RAM= htmlspecialchars($data['RAM']);
            $Hard_Disk_Capacity= htmlspecialchars($data['Hard_Disk_Capacity']);
            $OS= htmlspecialchars($data['OS']);
            $Rating= htmlspecialchars($data['Rating']);
            $Price= htmlspecialchars($data['Price']);
            $LaptopImg= htmlspecialchars($data['LaptopImg']);

            
            $result = "INSERT INTO `laptop`(`LaptopID`, `Brand`, `Model`, `Series`, `Processor`, `Processor_Gen`, `RAM`, `Hard_Disk_Capacity`, `OS`, `Rating`, `Price`, `LaptopImg`) VALUES ('$LaptopID','$Brand','$Model','$Series','$Processor','$Processor_Gen','$RAM','$Hard_Disk_Capacity','$OS','$Rating','$Price','$LaptopImg')";

            mysqli_query($connection,$result);

            //remark te user
            echo mysqli_error($connection);
            return mysqli_affected_rows($connection);

        }


        //add category
        function addCategory($data){
            $connection=connect();
            $Brand= htmlspecialchars($data['Brand']);

            $result = "INSERT INTO `laptop`(`Brand`) VALUES ('$Brand')";

            mysqli_query($connection,$result);

            //remark te user
            echo mysqli_error($connection);
            return mysqli_affected_rows($connection);
        }
 


        //delete computer details
        function deleteComputer($id){  
            $connection=connect();
            $sql= "DELETE FROM `laptop` WHERE `LaptopID`= $id";
            mysqli_query($connection,$sql) or die(mysqli_error($connection));
            return mysqli_affected_rows($connection);
        }

        //update order status
        function updateOrderStatus($data){
            $connection=connect();
            $OrderID = $data['OrderID'];
            $OrderStatus= htmlspecialchars($data['OrderStatus']);

            try{
                $sql= "UPDATE `order_list` SET 
                        `OrderStatus`='$OrderStatus' 
                        WHERE `OrderID`=$OrderID";
            
            mysqli_query($connection,$sql);

            //remark the user
            echo mysqli_error($connection);
            return mysqli_affected_rows($connection);
            } catch (mysqli_sql_exception $e) { 
                var_dump($e);
                exit; 
            }
            
        }


?>