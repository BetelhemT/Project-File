<?php
session_start();
if (!$_SESSION['admin_id']) {
  header("location: logout.php");
}
else{


$con = mysqli_connect("localhost","root","","meskel_flower_production") or die("Connection could not be Established");
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Ethio Gambia | Stock Confirmation </title>
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
               <h1> <a class="navbar-brand" href="dashboard.php">Ethio Gambia</a></h1>
			   </div>
			 <div class=" border-bottom">
        	<div class="full-left">
        	  <section class="full-top">
				<button id="toggle"><i class="fa fa-arrows-alt"></i></button>
			</section>

           </div>


            <!-- Brand and toggle get grouped for better mobile display -->

		   <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="drop-men" >
		        <ul class=" nav_1">
					<li class="dropdown">
		              <a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><span class=" name-caret">
		              <?php
                      $sel = "SELECT * FROM admin WHERE admin_id=".$_SESSION['admin_id'];
                      $run = mysqli_query($con,$sel);
                        #echo $_SESSION['employee_id'];
                        while($row = mysqli_fetch_assoc($run)) {
                        echo   $row["username"];
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
                <?php
                if (($_SESSION['type'] =='Adminstrator')) {

                include 'admin_nav.php';
                }else{
                  include 'super_nav.php';
                }
                ?>
            </div>
			</div>
        </nav>
		 <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">

 	<!--banner-->
		   <div class="banner" style="padding-bottom: 1em;">
		    	<h2>
        <a href="#">Admin</a>
        <i class="fa fa-angle-right"></i>
        <span>Unconfirmed Production Entries</span>
        </h2>

        <!-- <form action="view_product.php" method="POST">
                <div class="input-group input-group-in" style="padding-bottom: 0em;">
                    <input name="search" class="form-control2 input-search" placeholder="Search Product..." type="text">
                    <span class="input-group-btn">
                        <button  type="submit" class="btn btn-success" type="button"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form> -->
        </div>

		<!--//banner-->
 	<!--grid-->
 	<div class="validation-system">

 		<div class="validation-form">
 	<!---->
<h3>
        Unconfirmed Production Entries
        </h3>
        <hr>
  <?php 
  $sel = "SELECT * from production_entry WHERE confirmation = 0 ";
  $run = mysqli_query($con, $sel); ?>
     <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Shift</th>
      <th scope="col">Product Code</th>
      <th scope="col">Produced</th>
      <th scope="col">Damaged</th>
      <th scope="col">Confirm</th>
    </tr>
  </thead>
  <?php
  $i = 0;
  while ($row=mysqli_fetch_array($run)) {
   $id =$row['production_id'];
      $employee_name = $row['employee_name'];
      $shift = $row['shift'];
      $activity_date = $row['activity_date'];
      $machine_id = $row['machine_id'];
      $preform_id = $row['preform_id'];
      $product_code = $row['product_code'];
      $product_qty = $row['product_qty'];
      $damaged_qty = $row['damaged_qty'];
      $i++;
  ?>
  <tbody>
    <tr>      
      <td><?php echo $employee_name;?></td>
      <td><?php echo $shift;?></td>
      <td><?php echo $product_code;?></td>
      <td><?php echo $product_qty;?></td>
      <td><?php echo $damaged_qty;?></td>
     <!--  <td><form action="confirm_production.php" method="POST">
                        <button  type="submit" name="submit" class="btn btn-success" type="button">Confirm</button>
            </form></td> -->
      <td><a class="btn btn-xs btn-success warning_4" href="confirm_production.php?id=<?php echo $id;?>">Confirm</a></td>
      
    </tr>
   <?php } ?>
  </tbody>
</table>
<?php
if (isset($_GET['id'])) {
  $edit_id = $_GET['id'];
  $select = "select * from production_entry WHERE production_id='$edit_id'";
  $run = mysqli_query($con, $select);
  $row=mysqli_fetch_array($run);
      $id =$row['production_id'];
      $employee_name = $row['employee_name'];
      $shift = $row['shift'];
      $activity_date = $row['activity_date'];
      $machine_id = $row['machine_id'];
      $preform_id = $row['preform_id'];
      $product_code = $row['product_code'];
      $product_qty = $row['product_qty'];
      $damaged_qty = $row['damaged_qty'];
      $update = "UPDATE production_entry SET employee_name = '$employee_name',shift='$shift',activity_date = '$activity_date',machine_id='$machine_id',preform_id='$preform_id',product_code='$product_code',product_qty='$product_qty',damaged_qty='$damaged_qty',refrence_no='$refrence_no', confirmation=1 WHERE production_id='$edit_id'";
       $run_update = mysqli_query($con,$update);
          if ($run_update) {
          $query ="SELECT * FROM stock WHERE product_code ='$product_code'";
            $run = mysqli_query($con, $query);
            $i = 0;
            while ($row=mysqli_fetch_array($run)) {
     
              $available_product = $row['available_product'];
            }
          
              $final_stock_qty = $available_product + $product_qty;
              $update_stock = "UPDATE stock SET available_product = '$final_stock_qty' WHERE product_code ='$product_code'"; 
              $run_update_stock = mysqli_query($con,$update_stock);   
              if ($run_update_stock) {
                       echo "<script>alert('Confirm Successful!')</script>";
           echo "<script>window.open('confirm_production.php','_self')</script>";
                     }       

          }
          // echo "<script>alert('update successful!')</script>";
          //  echo "<script>window.open('confirm_production.php','_self')</script>";
      
}

?>
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
<!-- <?php
}
?> -->
