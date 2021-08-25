<?php
   session_start();
?>
<HTML>
<HEAD>
<title>Update Meal</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>	
        <link href="Add_Meal.css" rel="stylesheet" />


</HEAD>
<BODY>
  <!-- header begin-->
<div class="topnav">
       
       <a href="View.php">Menue</a>
       <a href="Add_Meal.html">Add Meal</a>
       <a href="Login.html" >Log Out</a>
 
   </div>
   <!-- header end-->
   <!-- menue begin-->
<div id="menue" >

<h1 class="text-center" >Update</h1>
 <!-- single-item begin-->
<div class="row"><div class="single-item">
<?php
$connection=new mysqli("localhost","root","","restaurant");
$sql = "SELECT * FROM meal WHERE M_ID=". $_GET['M_ID']; 
$result = mysqli_query( $connection, $sql);
    $row = mysqli_fetch_array($result);  
    $_SESSION["M_ID"] = $row["M_ID"];
    ?>
 
		<div class="single-item-text col-lg-6">
            <form enctype="multipart/form-data" action="updating.php" method="POST">
        <img src="imageView.php?M_ID=<?php echo $row["M_ID"]; ?>" />
        
   <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload" value="imageView.php?M_ID=<?php echo $row["M_ID"]; ?>"  >
   
    <input class="form-control" type="text" name="MName" value="<?php echo $row["Name"]; ?>">
    <input class="form-control" type="text" name="MPrice" value="<?php echo $row["Price"]; ?>">
    <button class="btn-info btn    text-capitalize"   value='update_meal'>update Meal</button>
<!--!<a class="btn-info btn    text-capitalize"   href="updating.php?M_ID=<?php echo $row["M_ID"]; ?>">update Meal</a>-->
</form>
  
<?php		
	
    mysqli_close($connection);
?>

</div></div></div></div>
<!-- menue end-->
<!-- footer begin-->
<footer class="bg-light text-center text-lg-start">
                        <div class="container p-4 pb-0">
                         <form action="">   <div class="row">
                              <div class="col-auto mb-4 mb-md-0">
                               <p class="pt-2"><strong>Sign up for our newsletter</strong></p>
                             </div>
                             <div class="col-md-5 col-12 mb-4 mb-md-0">
                             
                               <div class="form-outline mb-4">
                                 <input type="email" id="form5Example2" class="form-control" placeholder="Email address" />
                           </div> </div>
                             <div class="col-auto mb-4 mb-md-0"> 
                                   <button type="submit" class="btn btn-primary mb-4">Subscribe</button>
                             </div> </div> </form> </div>
                       <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2) ;height: 60px; padding: 20px;">
                         © 2020 Copyright: <a class="text-dark"> Samaa eissa</a>
                       </div>
                     
                     </footer>  
                     <!-- footer end-->            
</BODY>
</HTML>