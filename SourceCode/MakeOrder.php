<?php
$connection=new mysqli("localhost","root","","restaurant");
if ($connection->connect_error){   
    echo "Error 404";}
else
{ 
    $OrdersIds = $_POST['OrdersIds'];    
    $C_ID=$_POST["C_ID"];
    $ids = explode(",", $OrdersIds);
    foreach ($ids as &$id) {
        if($id==',')
        {
            continue;
        }
        $query="INSERT INTO orders ( C_ID , M_ID ) VALUES ('$C_ID', '$id')";
        $RESULTS=mysqli_query($connection,$query);
    }
}
?>