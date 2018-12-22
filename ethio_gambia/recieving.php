<?php
session_start();
if (!$_SESSION['employee_id']) {
	header("location: index.php");
}
else{


$con = mysqli_connect("localhost","root","","meskel_flower_production") or die("Connection could not be Established");
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Ethio Gambia | Recieving Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Ethio Gambia" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!--<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />--> 
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"> </script>
  
<!-- Mainly scripts -->
<script src="js/jquery.metisMenu.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<link href="css/custom.css" rel="stylesheet">
<script src="js/custom.js"></script>
<script src="check_reference_no.js"></script>
<script src="js/screenfull.js"></script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});
			

			
		});
		</script>

<!----->

</head>
<body>
<div id="wrapper">
        <!----->
        <nav class="navbar-default navbar-static-top" role="navigation">
             <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <h1> <a class="navbar-brand" href="production_entry.php">Ethio Gambia</a></h1>         
			   </div>
			 <div class=" border-bottom">
        	<div class="full-left">
        	  <section class="full-top">
				<button id="toggle"><i class="fa fa-arrows-alt"></i></button>	
			</section>
			
            <div class="clearfix"> </div>
           </div>
     
       
            <!-- Brand and toggle get grouped for better mobile display -->
		 
		   <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="drop-men" >
		        <ul class=" nav_1">
					<li class="dropdown">
		              <a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><span class=" name-caret">
		              <?php
		              $sel = "SELECT * FROM employee WHERE employee_id=".$_SESSION['employee_id'];
                 	  $run = mysqli_query($con,$sel);
		                #echo $_SESSION['employee_id'];
		                while($row = mysqli_fetch_assoc($run)) {
        				echo   $row["employee_name"];
        			}
		              ?>

		              	<i class="caret"></i></span><img src="images/usersm.png"></a>
		              <ul class="dropdown-menu " role="menu">
		                <li><a href="logout.php"><i class="fa fa-user"></i>Log Out</a></li>
		              </ul>
		            </li>
		           
		        </ul>
		     </div><!-- /.navbar-collapse -->
			<div class="clearfix">
       
     </div>
	  
		    <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                <?php include 'user_nav.php'; ?>
            </div>
			</div>
        </nav>
		 <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
 
 	<!--banner-->	
		   <div class="banner">
		    	<h2>
				<a href="#">Meskel Flower</a>
				<i class="fa fa-angle-right"></i>
				<span>Receiving Product Form</span>
				</h2>
		    </div>
		<!--//banner-->
 	<!--grid-->

 	<div class="validation-system">
 		
 		<div class="validation-form">
 	<!---->
  <h4 align="center">Receiving Product Form</h4><hr>
  	    
        <form action="recieving.php" method="post">
         	<div class="vali-form">
            <div class="col-md-6 form-group1">
              <label class="control-label">
              	<?php
                 	  $run = mysqli_query($con,$sel);
		                while($row = mysqli_fetch_assoc($run)) {
        				echo   $row["employee_occupation"];
        			}
		              ?>
              </label>
              
              <?php
             
                 	  $run = mysqli_query($con,$sel);
		                #echo $_SESSION['employee_id'];
		                while($row = mysqli_fetch_assoc($run)) {        				
        			 echo '<input type="text" disabled="" placeholder="', htmlspecialchars($row['employee_name'], ENT_QUOTES, 'UTF-8'), '" value="', htmlspecialchars($row['employee_name'], ENT_QUOTES, 'UTF-8'), '" />'; }?>
            </div>

             <div class="col-md-6 form-group1 group-mail">
              <label class="control-label">Date</label>
                <input style="font-size: 0.9em; color: #999; font-family: 'Muli-Regular'; 
                border: 1px solid #E9E9E9; font-size: 0.9em; padding: 0.5em 1em; color: #999;
                margin-top: 0.5em; width : 100%; font-family: 'Muli-Regular'; line-height: inherit" type="date" id="user_date" name="user_date" required="">
             
            </div>
            
            <div class="col-md-6 form-group1 group-mail">
              <label class="control-label">Reference no</label>
            <input type="text" id="refrence_no" name="refrence_no" placeholder="Reference no" required="">  
              
              <div id="status"></div>
            </div>
                
             
            <div class="col-md-6 form-group2 group-mail">
              <label class="control-label">Station</label>

             <input style="font-size: 0.9em; color: #999; font-family: 'Muli-Regular'; 
                border: 1px solid #E9E9E9; font-size: 0.9em; padding: 0.5em 1em; color: #999;
                margin-top: 0.5em; width : 100%; font-family: 'Muli-Regular'; line-height: inherit" list="list_station" 
                type="text" name="station" required="" />
                <datalist id="list_station">
              
        <?php
                  $sel = "SELECT * FROM station";
                    $run = mysqli_query($con,$sel);
                    while($row = mysqli_fetch_assoc($run)) {
                echo "<option value='".$row['station']."'>" .$row['station']."</option>";
              }
                  ?>
                </datalist>
            </div>

           


            <div class="col-md-6 form-group2 group-mail">
              <label class="control-label">
             Poduct Name</label>
           
                    <input style="font-size: 0.9em; color: #999; font-family: 'Muli-Regular'; 
                border: 1px solid #E9E9E9; font-size: 0.9em; padding: 0.5em 1em; color: #999;
                margin-top: 0.5em; width : 100%; font-family: 'Muli-Regular'; line-height: inherit" list="list_product_name" 
                type="text" name="product_name" required="" />
                <datalist id="list_product_name">
      
        <?php
                  $sel = "SELECT * FROM product";
                    $run = mysqli_query($con,$sel);
                    while($row = mysqli_fetch_assoc($run)) {
                echo "<option value='".$row['product_name']."'>" .$row['product_name']."</option>";
              }
                  ?>
    </datalist>

            </div>
<div class="col-md-6 form-group1 group-mail">
              <label class="control-label">Quantity</label>
                <input type="text" id="qty" name="qty" placeholder="Quantity" required="">
              <div id="status"></div>

            </div>



            <div class="clearfix"> </div><br>
            <div class="col-md-6 col-md-offset-5 form-group">
              <button type="submit" name="submit" class="btn btn-danger">Submit</button>
              <button type="reset" class="btn btn-default">Reset</button>
            </div>
          <div class="clearfix"> </div>
        </form>

        <?php
        if (isset($_POST['submit'])) {

                  $selemp = "SELECT * FROM employee WHERE employee_id=".$_SESSION['employee_id'];
                    $run = mysqli_query($con,$selemp);
                    while($row = mysqli_fetch_assoc($run)) {
                $employee_name =   $row["employee_name"];
              }
                  
          
          $activity_date =  date('Y-m-d H:i:s');
         // $receive_from = mysqli_real_escape_string($con,$_POST['receive_from']);
          $product_name = mysqli_real_escape_string($con,$_POST['product_name']);
          //$product_type = mysqli_real_escape_string($con,$_POST['product_type']);
          $qty = mysqli_real_escape_string($con,$_POST['qty']);
          $refrence_no = mysqli_real_escape_string($con,isset($_POST['refrence_no']));
          $station = mysqli_real_escape_string($con,$_POST['station']);
          $user_date = mysqli_real_escape_string($con,$_POST['user_date']);
          $insert = "INSERT INTO receive(employee_name,activity_date,product_name,qty,refrence_no,station,user_date) VALUES ('$employee_name','$activity_date','$product_name','$qty','$refrence_no','$station','$user_date')";
          
           $run_insert = mysqli_query($con,$insert);
          if ($run_insert) {
            $query ="SELECT * FROM preform_stock WHERE product_name ='$product_name'";
            $run = mysqli_query($con, $query);
            $i = 0;
            while ($row=mysqli_fetch_array($run)) {
     
              $available_product = $row['available_product'];
            }
          
              $final_stock_qty = $available_product + $qty;
              $update_stock = "UPDATE preform_stock SET available_product = '$final_stock_qty' WHERE product_name ='$product_name'"; 
              $run_update_stock = mysqli_query($con,$update_stock);
              if ($run_update_stock) {
                echo "<script>alert('Success!')</script>";
                echo "<script>window.open('recieving.php','_self')</script>";
              }
           // echo "<script>alert('You have successfully made an entry!')</script>";
           // echo "<script>window.open('recieving.php','_self')</script>";
          }

        }
        ?>
    
 	<!---->
 </div>

</div>
  <div class="validation-system">
    
    <div class="validation-form">
  <!---->
  <h4 align="center">Recent Activity</h4><hr>
        
        
        <?php
        $selemp = "SELECT * FROM employee WHERE employee_id=".$_SESSION['employee_id'];
                    $run = mysqli_query($con,$selemp);
                    while($row = mysqli_fetch_assoc($run)) {
                $employee_name =   $row["employee_name"];
              }
                  
          // $select_entries = "SELECT * FROM production_entry WHERE employee_name=$employee_name ORDER BY activity_date DESC LIMIT 5;"
              $select_entries = "SELECT * FROM receive WHERE employee_name='$employee_name' ORDER BY activity_date DESC LIMIT 2";
          $runn = mysqli_query($con, $select_entries);
          ?>

           <table class="table table-responsive table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">Product Name</th>
      <th scope="col">Qty</th>
      <th scope="col">Activity Date</th>
      <th scope="col">Reference Number</th>
      
      <th scope="col">Employee Name</th>  
      <th scope="col">Station</th>  

    </tr>
  </thead>
  <?php
  $i = 0;

  while ($row=mysqli_fetch_array($runn)) {
      $id =$row['receive_id'];
      $activity_date = $row['activity_date'];
      $product_name = $row['product_name'];
      $qty = $row['qty'];
      
      $employee_name = $row['employee_name'];
      $station = $row['station'];
      $refrence_no = $row['refrence_no'];
      $i++;
    
  ?>
  <tbody>
    <tr>
      <td><?php echo $product_name;?></td>
      <td><?php echo $qty;?></td>
      <td><?php echo $activity_date;?></td>
      
      <td><?php echo $refrence_no;?></td>
      <td><?php echo $employee_name;?></td>
      <td><?php echo $station;?></td>
      
    </tr>
   <?php } ?>
  </tbody>
</table>
    
  <!---->
 </div>

</div>
 	<!--//grid-->
		<!---->
<div class="copy">
            <p> &copy;  Ethio Gambia.</p>	    </div>
		</div>
		</div>
		<div class="clearfix"> </div>
       </div>
     
<!---->
<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
</body>
</html>
<?php
}
?>