<?php
session_start();
if (!$_SESSION['admin_id'] ||  !($_SESSION['type'] =='Adminstrator')) {
	header("location: logout.php");
}
else{
$con = mysqli_connect("localhost","root","","meskel_flower_production") or die("Connection could not be Established");
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Ethio Gambia | Production Entry</title>
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
<script type="text/javascript" src="js/chart.min.js"></script>
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

<!--pie-chart--->
<script src="js/pie-chart.js" type="text/javascript"></script>
 <script type="text/javascript">

        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#3bb2d0',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#fbb03b',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ed6498',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

           
        });

    </script>

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
			<!--form class=" navbar-left-right">
              <input type="text"  value="Search..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search...';}">
              <input type="submit" value="" class="fa fa-search">
            </form-->
            <div class="clearfix"> </div>
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
                <?php include 'admin_nav.php'; ?>
            </div>
			</div>
        </nav>
		 <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">

 	<!--banner-->
		   <div class="banner">
		    	<h2>
				<a href="#">Admin</a>
				<i class="fa fa-angle-right"></i>
				<span>Reset</span>
				</h2>
		    </div>
		<!--//banner-->
 	<!--grid-->
    <div class="content-top">
            
            
        <div class="col-md-4 ">
   
                <!-- <div class="content-top-1">
              



                <div class="col-md-6 top-content1">    
                    <div id="demo-pie-3" class="pie-title-center" data-percent="75"> <span class="pie-value"></span> </div>
                </div>
                 <div class="clearfix"> </div>
                </div> -->
        </div>

    <div class="col-md-12">

        <div class="col-md-8 content-top-1">
              <div class="col-md-4 top-content">
                    <h5>Stock Reset</h5>   
                    <form action="reset.php" method="POST">
                    <label><button type="submit" name="reset_stock"  class="btn btn-info">Reset</button></label></form>
                  </form>
                    <?php
                      if(isset($_POST['reset_stock'])){
                        $update = "UPDATE stock SET available_product = 0, damaged_product = 0 WHERE 1";
                        $run_stock_update = mysqli_query($con,$update);
                          if ($run_stock_update) {
                               echo "<script>alert('Reseted successfuliy!')</script>";

                                }}
                       

                    ?>
                </div>
               <div class="col-md-4 top-content">
                    <h5> Resting the avaliable products and damaged products</h5>   
                    
                    
                </div> 

        </div>
          <div class="col-md-8 content-top-1">
              <div class="col-md-4 top-content">
                    <h5>Reset Production Entries</h5>   
                    <form action="dashboard.php" method="POST">
                    <label><button type="submit" name="reset_production_entri"  class="btn btn-info">Reset</button></label></form>
                    <?php


                    if(isset($_POST['reset_production_entri'])){
                      $sel = "SELECT * from production_entry";
                        $run = mysqli_query($con, $sel);
                        $i = 0;
                         while ($row=mysqli_fetch_array($run)) {
                              $production_id =$row['production_id'];
                              $employee_name = $row['employee_name'];
                              $shift = $row['shift'];
                              $activity_date = $row['activity_date'];
                              $machine_id = $row['machine_id'];
                              $cup_id =$row['cup_id'];
                              $preform_id = $row['preform_id'];
                              $product_code = $row['product_code'];
                              $damaged_qty = $row['damaged_qty'];
                              $refrence_no = $row['refrence_no'];
                              $type =$row['type'];
                              $edit = $row['edit'];
                              $production_id_edited = $row['production_id_edited'];
                              $sup_username = $row['sup_username'];
                               $i++;

                               $insert_to_backup="INSERT INTO production_entry_backup(production_id,employee_name,shift,activity_date,machine_id,cup_id,preform_id,product_code,damaged_qty,refrence_no,type,edit,production_id_edited,sup_username) VALUES ('$production_id','$employee_name','$shift','$activity_date','$machine_id','$cup_id','$preform_id','$product_code','$damaged_qty','$refrence_no','$type','$edit','$production_id_edited','$sup_username')";

                                $run_backup = mysqli_query($con, $insert_to_backup);   

                             }
                             if($run_backup){
                                $updates = "DELETE from production_entry where edit = 0";
                              // $update = "UPDATE production_entry SET product_qty = 0";
                               $run_production_entri_update = mysqli_query($con,$updates);
                                 if ($run_production_entri_update) {
                               echo "<script>alert('Reseted successfuliy!')</script>";

                                }
                                else{
                                  echo "<script>alert('Not Reseted successfuliy!')</script>";
                                }

                             }
                                
                      //$update = "DELETE * FROM production_entry WHERE activity_date < DATE_SUB(NOW(), INTERVAL 1 WEEK";
                       
                              
}

                    ?>
                </div>
               <div class="col-md-4 top-content">
                    <h5> Resets production Entries that are More than 2 months old</h5>   
                    
                    
                </div> 

        </div>
          <div class="col-md-8 content-top-1">
              <div class="col-md-4 top-content">
                    <h5>Reset Sold</h5>   
                    <form action="dashboard.php" method="POST">
                    <label><button type="submit" name="reset_sold"  class="btn btn-info">Reset</button></label></form>
                    <?php

                    if (isset($_POST['reset_sold'])){
                        $update_sold = "UPDATE sold SET qty = 0 WHERE 1";
                        $run_sold_update = mysqli_query($con,$update_sold);
                          if ($run_sold_update) {
                               echo "<script>alert('Reset successfull!')</script>";
                                }
                       }

                    ?> 

                   
                </div>
               <div class="col-md-4 top-content">
                    <h5> Resetting the quantity of sold products</h5>   
                    
                    
                </div> 

        </div>
              <div class="col-md-8 content-top-1">
              <div class="col-md-4 top-content">
                    <h5>Reset Sales Entry</h5>   
                    <form action="dashboard.php" method="POST">
                    <label><button type="submit" name="reset_sales_entri"  class="btn btn-info">Reset</button></label></form>
                    <?php

                    if(isset($_POST['reset_sales_entri'])){
                      $sel = "SELECT * from sales_entri";
                        $run = mysqli_query($con, $sel);
                        $i = 0;
                         while ($row=mysqli_fetch_array($run)) {
                              $customer_name =$row['customer_name'];
                              $reference_no = $row['reference_no'];
                              $qty = $row['qty'];
                              $product_name = $row['product_name'];
                              $product_code = $row['product_code'];
                              // $sold_product =$row['sold_product'];
                              $remaining_product = $row['remaining_product'];
                              $status = $row['status'];
                              
                               $i++;

                               $insert_to_backup="INSERT INTO sales_entri_backup(customer_name,reference_no,qty,product_name,product_code,remaining_product,status) VALUES ('$customer_name','$reference_no','$qty','$product_name','$product_code','$remaining_product','$status')";

                                $run_backup = mysqli_query($con, $insert_to_backup);   

                             }
                             if($run_backup){
                                $update = "DELETE from sales_entri where status = 1 || status = 0";
                                //$update = "UPDATE sales_entri SET qty = 0";
                               
                               $run_sales_entri_update = mysqli_query($con,$update);
                                 if ($run_sales_entri_update) {
                               echo "<script>alert('Reseted successfuliy!')</script>";

                                }
                                else{
                                  echo "nop";
                                }

                             }
                                
                      //$update = "DELETE * FROM production_entry WHERE activity_date < DATE_SUB(NOW(), INTERVAL 1 WEEK";
                       
                              
}

                    ?> 

                   
                </div>
            </div>
               <div class="col-md-4 top-content">
                    <!-- <h5> Resetting the Sales Entry</h5>    -->
                    
                    
                </div> 

        </div>
        </div>
 	<div class="clearfix"> </div>
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
