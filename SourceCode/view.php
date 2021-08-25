<?php
   $connection=new mysqli("localhost","root","","restaurant");
    $sql = "SELECT * FROM meal"; 
    $result = mysqli_query( $connection, $sql);
?>
<HTML>
<HEAD>
<title>Meals</title>
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
<a href="View.php">Menu</a>
       <a href="Add_Meal.html">Add Meal</a>
     
       <a href="Login.html" >Log Out</a>
       <p> <img src="imag/Restaurant-logo.png" style="width: 100px;height: 100px;"> </p>
   </div>
   <!-- header end-->
   <!-- menue begin-->
<div id="menue" >

<h1 class="text-center" >Menu</h1>
 <!-- single-item begin-->
<div class="row"><div class="single-item">
<?php
	while($row = mysqli_fetch_array($result)) {
    ?>
		<div class="single-item-text col-lg-6">
 <h2 ><img src="imageView.php?M_ID=<?php echo $row["M_ID"]; ?>" />
    <?php echo $row["Name"]; ?></h2>
    <div  class="price"> <h2 class="text-uppercase   " > <?php echo $row["Price"]; ?>. LE</h2>  </div>
    <!-- single-item end-->
    <!-- single-item update begin-->
    <a class="btn-secondary btn    text-capitalize"   href="Update.php?M_ID=<?php echo $row["M_ID"]; ?>">update</a>
 <!-- single-item update end-->
  <!-- single-item delete begin-->
    <a class="  btn  btn-danger text-capitalize trash" href="#myModal" data-id="<?php echo $row["M_ID"]; ?>"  data-toggle="modal">delete</a></div>
    <div id="myModal" class="modal fade">   
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">&#xE5CD;</i>
				</div>				
				<h4 class="modal-title">Are you sure?</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>Do you really want to delete these records? This process cannot be undone.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<a id="btn_delete" class="btn-danger btn    text-capitalize "   href="delete.php?M_ID=<?php echo $row["M_ID"]; ?>"> Delete</a>
			</div>
		</div>
	</div>
</div>  
<!-- single-item delete end-->   
<?php		
	}
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

<script>

  // on clik trash icon    
$('.trash').click(function(){
    //get cover id
    var id=$(this).data('id');
    //set href for cancel button
    $('#btn_delete').attr('href','delete.php?M_ID='+id);
})
  </script>
</HTML>