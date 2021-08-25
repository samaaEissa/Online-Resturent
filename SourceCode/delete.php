<?php
$connection=new mysqli("localhost","root","","restaurant");

if ($connection->connect_error)
    {echo "Error 404";}
else
{   
    echo"enter";
   
    $id = $_GET['M_ID'];

    $query="DELETE FROM `meal` WHERE M_ID=".$id;

    $RESULTS=mysqli_query($connection,$query);
   
    if($RESULTS)
{
   
    header('Location:view.php');
}
else{
    echo"error";
}
}


?>