<?php

session_start();
$connection=new mysqli("localhost","root","","restaurant");
if ($connection->connect_error)
    {
        echo "Error 404";}
else{
    $Name=$_POST['txtName'];
    $password=$_POST['Password'];
    $Address=$_POST['Address'];
    $Phone=$_POST['Phone'];    
    if ($Name==""|| $password==""||$Phone==""||$Address==""){
       
        header('Location:Login.html');
    }
    else{
      
            $query="INSERT INTO customer( Name, Phone, Address, Password) VALUES ('$Name','$Phone','$Address','$password')";    
            $RESULTS=mysqli_query($connection,$query);
           if($RESULTS)
            {   
            
                $query="SELECT * FROM `customer` WHERE  `Name`='$Name' AND  `Password`='$password' ";
                $RESULTS=mysqli_query($connection,$query);
                $Row=mysqli_fetch_array($RESULTS);
                if($Row['Name']==$Name && $Row['Password']==$password)
                {
                    $_SESSION["C_ID"] = $Row["C_ID"];
                    header('Location:Ordering.php');
                }
                else{
                    header('Location:Register.html');
                }
            }
            else{            
                header('Location:Register.html');
            }
}
}


?>