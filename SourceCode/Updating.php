<?php
session_start();
$connection=new mysqli("localhost","root","","restaurant");
if ($connection->connect_error)
    {echo "Error 404";}
else
{   
    
    echo"enter";
   
    $MealName=$_POST['MName'];
    $price=$_POST['MPrice'];
    $M_ID=$_SESSION["M_ID"];
    $imgData =null;
    if (count($_FILES) > 0)
    {
        if (is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {
            $imgData = addslashes(file_get_contents($_FILES['fileToUpload']['tmp_name']));
        }
    }

    if ($MealName==""|| $price==""){
        echo"$MealName";
    }
       # header('Location:Add_Meal.html')
    
    else{
        echo"$price";
        $query="UPDATE meal SET Name= '$MealName', Price= '$price' where M_ID=". $_SESSION['M_ID'];
        if($imgData !=null)
        {
            $query="UPDATE meal SET Name= '$MealName', Price= '$price',Icon= '$imgData' where M_ID=". $_SESSION['M_ID'] ;
        }
       

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