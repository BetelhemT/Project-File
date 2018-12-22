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
<title>Ethio Gambia | Cap Production Entry</title>
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
               <h1> <a class="navbar-brand" href="cap_entry.php">Ethio Gambia</a></h1>         
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
				<span>Cap Production Entry</span>
				</h2>
		    </div>
		<!--//banner-->
 	<!--grid-->
 	<div class="validation-system">
 		
 		<div class="validation-form">
 	<!---->
  <h4 align="center">Cap Production Entry</h4><hr>
  	    
        <form action="cap_entry.php" method="post">
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
            <div class="col-md-6 form-group1 form-last">
              <label class="control-label">Reference No.</label>
              <input type="text" id="refrence_no" name="refrence_no" placeholder="Reference No." required="">
              <div id="status"></div> 
               <!-- <?php
             		$sel = "SELECT * FROM employee WHERE employee_id=".$_SESSION['employee_id'];
                 	  $run = mysqli_query($con,$sel);
		               while($row = mysqli_fetch_assoc($run)) {    
		               if (($row['employee_occupation'])=="Supervisor") {
		                   					echo '<input type="text" name="refrence_no" placeholder="Reference No." required="">';
		                   				}  else{
		                   					echo '<input type="text" name="refrence_no" placeholder="Reference No." disabled="">';
		                   				}  				
        			 }?> -->
              
            </div>
            <div class="clearfix"> </div>
            </div>
            
            <div class="col-md-6 form-group2 group-mail">
              <label class="control-label">Shift</label>
            <select name="shift" required="">
              <option value="">---Select Shift---</option>
              <option value="Day">Day</option>
              <option value="Night">Night</option>
            </select>
            </div>
            <div class="col-md-6 form-group2 group-mail">
              <label class="control-label">Machine ID</label>
               <input style="font-size: 0.9em; color: #999; font-family: 'Muli-Regular'; 
                border: 1px solid #E9E9E9; font-size: 0.9em; padding: 0.5em 1em; color: #999;
                margin-top: 0.5em; width : 100%; font-family: 'Muli-Regular'; line-height: inherit" list="list_machine" 
                type="text" name="machine_id" required="" />
            <datalist id="list_machine">
  <?php
                  $sel = "SELECT * FROM machine WHERE machine_type = 'BLOW' ORDER BY machine_name";
                    $run = mysqli_query($con,$sel);
                    while($row = mysqli_fetch_assoc($run)) {
                echo "<option value='".$row['machine_code']."'>".$row['machine_code']. " &nbsp; | &nbsp; " .$row['machine_name']."</option>";
              }
                  ?>
            </datalist>
            </div>


             <div class="clearfix"> </div>
              <div class="col-md-6 form-group2 group-mail">
              <label class="control-label">Product Code</label>
              <input style="font-size: 0.9em; color: #999; font-family: 'Muli-Regular'; 
                border: 1px solid #E9E9E9; font-size: 0.9em; padding: 0.5em 1em; color: #999;
                margin-top: 0.5em; width : 100%; font-family: 'Muli-Regular'; line-height: inherit" list="list_product_code" 
                type="text" name="product_code" required="" />
                <datalist id="list_product_code">
	<?php
		              $sel = "SELECT * FROM product WHERE product_type = 'CAPS CLOSER' OR product_type = 'CUPS'  ORDER BY product_name";
                 	  $run = mysqli_query($con,$sel);
		                while($row = mysqli_fetch_assoc($run)) {
        				echo "<option value='".$row['product_code']."'>".$row['product_code']. " &nbsp; | &nbsp; " .$row['product_name']."</option>";
        			}
		              ?>
    
</datalist>
            </div>
          <div class="col-md-6 form-group has-error">
        <label class="control-label" for="inputError1">Damaged QTY</label>
        <input type="number" min="0" name="damaged_qty" class="form-control1" id="inputError1" placeholder="0" required="">
      </div>
            <div class="clearfix"> </div>
            <div class="form-group has-success col-md-6">
        <label class="control-label" for="inputSuccess1">Produced QTY</label>
        <input type="number" min="0" name="product_qty" placeholder="0" class="form-control1" id="inputSuccess1" required="">
      </div>
           <div class="col-md-6 form-group1 group-mail">
              <label class="control-label">Date</label>
                <input style="font-size: 0.9em; color: #999; font-family: 'Muli-Regular'; 
                border: 1px solid #E9E9E9; font-size: 0.9em; padding: 0.5em 1em; color: #999;
                margin-top: 0.5em; width : 100%; font-family: 'Muli-Regular'; line-height: inherit" type="date" id="user_date" name="user_date" required="">
             
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
                  
          
          $shift = mysqli_real_escape_string($con,$_POST['shift']);
          $activity_date =  date('Y-m-d H:i:s');
          $machine_id = mysqli_real_escape_string($con,$_POST['machine_id']);
          $cap_id = mysqli_real_escape_string($con,$_POST['cap_id']);
          $product_code_n_name = mysqli_real_escape_string($con,$_POST['product_code']);
          $resultexplode= explode('|', $product_code_n_name);
          $product_code = $resultexplode[0];
          //$product_name = $resultexplode[0];
          $product_qty = mysqli_real_escape_string($con,$_POST['product_qty']);
          $damaged_qty = mysqli_real_escape_string($con,$_POST['damaged_qty']);
          $refrence_no = mysqli_real_escape_string($con,isset($_POST['refrence_no']));
          $user_date = mysqli_real_escape_string($con,$_POST['user_date']);

      

          $insert = "INSERT INTO production_entry(employee_name,shift,activity_date,machine_id,cup_id,product_code,product_qty, damaged_qty,refrence_no, type,user_date) VALUES ('$employee_name','$shift','$activity_date','$machine_id','$cap_id','$product_code','$product_qty','$damaged_qty','$refrence_no', 'cap', '$user_date')";
          $run_insert = mysqli_query($con,$insert);
          if ($run_insert) { 
            // $sel = "SELECT * FROM product WHERE product_type = 'CAPS CLOSER' OR product_type = 'CUPS' ORDER BY product_name";
            //         $run = mysqli_query($con,$sel);
            //         while($row = mysqli_fetch_assoc($run)) {
            //           $product_name=$row['product_name'];
            //    // echo "<option value='".$row['product_code']."'>".$row['product_code']. " &nbsp; | &nbsp; $product_name</option>";
            //   }
            // $query ="SELECT * FROM stock WHERE product_name ='$product_name'";
            // $run = mysqli_query($con, $query);
            // $i = 0;
            // while ($row=mysqli_fetch_array($run)) {
     
            //   $available_product = $row['available_product'];
            // }
          
            //   $final_stock_qty = $available_product + $product_qty;
            //   $update_stock = "UPDATE stock SET available_product = '$final_stock_qty' WHERE product_name ='$product_name'"; 
            //   $run_update_stock = mysqli_query($con,$update_stock);
            //   if ($run_update_stock) {
                echo "<script>alert(' You have successfully made an entry !')</script>";
                echo "<script>window.open('dashboard.php','_self')</script>";
              // }
               
           // echo "<script>alert('You have successfully made an entry!')</script>";
           // echo "<script>window.open('cap_entry.php','_self')</script>";
          }
        }
        ?>
        
    
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