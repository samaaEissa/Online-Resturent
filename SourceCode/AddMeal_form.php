<?php
$connection=new mysqli("localhost","root","","restaurant");

if ($connection->connect_error)
    {echo "Error 404";}
else
{   
    
 

    echo"enter";
   
    $MealName=$_POST['MName'];
    $price=$_POST['MPrice'];
    $imgData = addslashes(file_get_contents($_FILES['fileToUpload']['tmp_name']));

    if ($MealName==""|| $price==""){
        echo"$MealName";
    }
       # header('Location:Add_Meal.html')
    
    else{
        echo"$price";
    $query="insert into meal (Name , Price,Icon )  VALUES ('$MealName', '$price','$imgData')";

    $RESULTS=mysqli_query($connection,$query);
   
    if($RESULTS)
{
   
    header('Location:view.php');
}
else{
    echo"error";
}
}

}
?>