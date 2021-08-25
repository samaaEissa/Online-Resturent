<?php
session_start();
   $connection=new mysqli("localhost","root","","restaurant");
    $sql = "SELECT * FROM meal"; 
    $result = mysqli_query( $connection, $sql);
?>
<HTML>
<HEAD>
<title>Make Order</title>
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

       <a href="Home.html">Home</a>
       <a href="Login.html" >Log Out</a>
      
       <p> <img src="imag/Restaurant-logo.png" style="width: 100px;height: 100px;"> </p>
   </div>
   <!-- header end-->
   <!-- menue begin-->
<div id="menue" >

<h1 class="text-center" >Menu</h1>
 <!-- single-item begin-->
<div class="row">
  <div class="single-item"  id="ParentDiv">
<?php 
 
	while($row = mysqli_fetch_array($result)) {
    ?>
		<div class="single-item-text col-lg-6">
 <h2 ><img src="imageView.php?M_ID=<?php echo $row["M_ID"]; ?>" />
    <?php echo $row["Name"]; ?>  <input type="checkbox" id="Order"  name="Order" value="<?php echo $row["M_ID"]; ?>"></h2>
    <input type="hidden" id="C_ID" name="C_ID" value="<?php echo $_SESSION["C_ID"]; ?>">
    <input type="hidden" id="M_ID" name="M_ID" value="<?php echo $row["M_ID"]; ?>">
    <input type="hidden" id="price" name="price" value="<?php echo $row["Price"]; ?>">
    <input type="hidden" id="ItemName" name="ItemName" value="<?php echo $row["Name"]; ?>">
    <div  class="price"> <h2 class="text-uppercase   " > <?php echo $row["Price"]; ?>. LE</h2>  </div>
    <!-- single-item end-->
  <!-- single-item delete begin-->
 
    </div>
    
<!-- single-item delete end-->   
<?php		
	}
    mysqli_close($connection);
?>
<a class="  btn  btn-danger text-capitalize bell" href="#myModal"  data-toggle="modal">Order</a>
    <div id="myModal" class="modal fade">   
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">&#xE5CD;</i>
				</div>				
				<h4 class="modal-title">Order Bell</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body" style="color:black; display:inline;">
      
        
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button id="btn_save" class="btn-info btn    text-capitalize bi bi-cart " onclick="saveOrder();">  <i class="bi bi-cart"></i> Order</button>
			</div>
		</div>
	</div>
</div>  
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
var Orders='';
var customerId=''
  // on clik trash icon    
$('.bell').click(function(){
  showTotalPrice();
})

function showTotalPrice()
{
Orders='';
customerId='';
var items = $('#ParentDiv').children('.single-item-text');
var totalPrice=0;
$("#myModal .modal-body").html('');
for(var i=0;i<items.length;i++){
var item=items[i];
var checkbox= $(item).find('#order');

if($(checkbox).prop("checked") ){ 
      customerId=$(item).find('#C_ID').val();   
      var MealID= $(item).find('#M_ID').val();       
      var itemprice= $(item).find('#price').val();    
      var itemName= $(item).find('#itemName').val(); 
      var modalContent=  $("#myModal .modal-body").html(); 
      $("#myModal .modal-body").html(modalContent + '<h1> Name : '+ itemName +'&nbsp;&nbsp; Price : ' + itemprice +'</h1>')
      if(Orders.length==0)
      {
        Orders=MealID;
      }
      else
      {
       Orders=Orders +',' + MealID
      }
	    totalPrice=totalPrice +parseInt(itemprice)
    } 
}
var modalContent=  $("#myModal .modal-body").html();
console.log(Orders)
console.log(customerId)
$("#myModal .modal-body").html(modalContent + '<h1> Total Price = '+ totalPrice +'</h1>');
}
function saveOrder()
{
  $.ajax({
    type: 'POST', // the method (could be GET btw)
    url: 'MakeOrder.php', // The file where my php code is
    data: {
        'C_ID':customerId,
        'OrdersIds': Orders // all variables i want to pass. In this case, only one.
    },
    success: function(data) { // in case of success get the output, i named data
      $("#myModal").modal('hide');
    }
});
}
</script>
</HTML>