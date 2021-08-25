<?php
 session_start();
$connection=new mysqli("localhost","root","","restaurant");

if ($connection->connect_error)
    {
        echo "Error 404";}
else{

    $Name=$_POST['txtName'];
    $password=$_POST['Password'];
   
    if ($Name==""|| $password==""){
        header('Location:Login.html');
    }
    else{
        $query="SELECT * FROM `admin` WHERE  `Name`='$Name' AND  `Password`='$password' ";

        $RESULTS=mysqli_query($connection,$query);
        $Row=mysqli_fetch_array($RESULTS);
        if($Row['Name']==$Name&& $Row['Password']==$password)
        {
            header('Location:view.php');
        }
        else{
            $query="SELECT * FROM `customer` WHERE  `Name`='$Name' AND  `Password`='$password' ";

            $RESULTS=mysqli_query($connection,$query);
            $Row=mysqli_fetch_array($RESULTS);
            if($Row['Name']==$Name && $Row['Password']==$password)
            {
                $_SESSION["C_ID"] = $Row["C_ID"];
                header('Location:Ordering.php');
            }
            else{
                header('Location:Login.html');
            }
}}

}
?>