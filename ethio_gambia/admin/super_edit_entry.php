<?php
session_start();
if (!$_SESSION['admin_id'] ||  !($_SESSION['type'] =='Supervisor')) {
  header("location: logout.php");
}
else{


$con = mysqli_connect("localhost","root","","meskel_flower_production") or die("Connection could not be Established");
if (isset($_GET['id'])) {
  $edit_id = $_GET['id'];
  $select = "SELECT * from production_entry WHERE production_id='$edit_id'";
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
      
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Ethio Gambia | Blow Production Entry</title>
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
               <h1> <a class="navbar-brand" href="super_dashboard.php">Ethio Gambia</a></h1>         
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
                      $adsel = "SELECT * FROM admin WHERE admin_id=".$_SESSION['admin_id'];
                      $run = mysqli_query($con,$adsel);
                        #echo $_SESSION['employee_id'];
                        while($row = mysqli_fetch_assoc($run)) {
                        $sup_username=$row["username"];
                        echo   $sup_username;
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
                <?php include 'super_nav.php'; ?>
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
				<span>Blow Production Entry</span>
				</h2>
		    </div>
		<!--//banner-->
 	<!--grid-->
 	<div class="validation-system">
 		
 		<div class="validation-form">
 	<!---->
  <h4 align="center">Blow Production Entry</h4><hr>
  	    
        <form action="super_edit_entry.php?id=<?php echo $id; ?>" method="POST">
         	<div class="vali-form">
            <div class="col-md-6 form-group1">
              <label class="control-label">
              	Employee Name
		              
              </label>
              <input type="text" disabled="" placeholder="<?php echo $employee_name ?>" value="<?php echo $employee_name ?>" name="">
              
            </div>
            <div class="col-md-6 form-group1 form-last">
              <label class="control-label">Reference No.</label>
              <input type="text" placeholder="Reference No." value="0" disabled="">
               
              
            </div>
            <div class="clearfix"> </div>
            </div>
            
            <div class="col-md-6 form-group2 group-mail">
              <label class="control-label">Shift</label>
            <select name="shift" required="">
              <option value="<?php echo $shift;?>"><?php echo $shift;?></option>
              <option value="day">Day</option>
              <option value="night">Night</option>
            </select>
            </div>
            <div class="col-md-6 form-group2 group-mail">
              <label class="control-label">Machine ID</label>
            <select name="machine_id" required="">
              <option value = "<?php echo $machine_id;?>"><?php echo $machine_id;?></option>
	<?php
		              $sel = "SELECT * FROM machine ORDER BY machine_name";
                 	  $run = mysqli_query($con,$sel);
		                while($row = mysqli_fetch_assoc($run)) {
        				echo "<option value='".$row['machine_code']."'>".$row['machine_code']. " &nbsp; | &nbsp; " .$row['machine_name']."</option>";
        			}
		              ?>
            </select>
            </div>

             <div class="clearfix"> </div>
              <div class="col-md-6 form-group2 group-mail">
              <label class="control-label">Preform ID</label>
            <select name="preform_id" required="">
	<option value = "<?php echo $preform_id;?>"><?php echo $preform_id;?></option>
	<?php
		              $sel = "SELECT * FROM preform ORDER BY preform_name";
                 	  $run = mysqli_query($con,$sel);
		                while($row = mysqli_fetch_assoc($run)) {
        				echo "<option value='".$row['preform_code']."'>".$row['preform_code']. " &nbsp; | &nbsp; " .$row['preform_name']."</option>";
        			}
		              ?>
    
</select>
            </div>
            <div class="col-md-6 form-group2 group-mail">
              <label class="control-label">Product ID</label>

<select name="product_code" required="">
	<option value = "<?php echo $product_code;?>"><?php echo $product_code;?></option>
	<?php
		              $sel = "SELECT * FROM product ORDER BY product_name";
                 	  $run = mysqli_query($con,$sel);
		                while($row = mysqli_fetch_assoc($run)) {
        				echo "<option value='".$row['product_code']."'>".$row['product_code']. " &nbsp; | &nbsp; " .$row['product_name']."</option>";
        			}
		              ?>
    
</select>
            
            </div>
            <div class="clearfix"> </div>
            <div class="form-group has-success col-md-6">
        <label class="control-label" for="inputSuccess1">Produced QTY</label>
        <input type="number" name="product_qty" min="0" value="<?php echo $product_qty;?>" class="form-control1" id="inputSuccess1" required="">
      </div>
            <div class="col-md-6 form-group has-error">
        <label class="control-label" for="inputError1">Damaged QTY</label>
        <input type="number" name="damaged_qty" min="0" class="form-control1" id="inputError1" value="<?php echo $damaged_qty;?>" required="">
      </div>
            <div class="clearfix"> </div><br>
            <div class="col-md-6 col-md-offset-5 form-group">
              <button type="submit" name="update" class="btn btn-danger">Update</button>
              <button type="submit" name="cancel_edit" class="btn btn-default">Cancel Edit</button>
            </div>
          <div class="clearfix"> </div>
        </form>
        <?php
        if (isset($_POST['update'])) {
                  $selemp = "SELECT * from production_entry WHERE production_id='$edit_id'";
                  // $selemp = "SELECT * FROM employee WHERE employee_id='$edit_id'";
                    $run = mysqli_query($con,$selemp);
                    while($row = mysqli_fetch_assoc($run)) {
                $employee_name =   $row["employee_name"];
              }          
          $shift = mysqli_real_escape_string($con,$_POST['shift']);
          $activity_date =  date('Y-m-d H:i:s');
          $machine_id = mysqli_real_escape_string($con,$_POST['machine_id']);
          $preform_id = mysqli_real_escape_string($con,$_POST['preform_id']);
          $product_code = mysqli_real_escape_string($con,$_POST['product_code']);
          $product_qty = mysqli_real_escape_string($con,$_POST['product_qty']);
          $damaged_qty = mysqli_real_escape_string($con,$_POST['damaged_qty']);
          $refrence_no = mysqli_real_escape_string($con,isset($_POST['refrence_no']));
                    $insert = "INSERT INTO production_entry(production_id_edited,employee_name,shift, activity_date,machine_id,cup_id, preform_id, product_code,product_qty,damaged_qty,refrence_no,type,edit,sup_username) VALUES ('$edit_id','$employee_name','$shift','$activity_date','$machine_id','Null','$preform_id', '$product_code','$product_qty','$damaged_qty', '$refrence_no','blow','1','$sup_username')";
          
         $run_insert = mysqli_query($con,$insert);
          if ($run_insert) {
           echo "<script>alert('update successful!')</script>";
           echo "<script>window.open('super_bottle_production.php','_self')</script>";

          }
      }
      if (isset($_POST['cancel_edit'])) {
         echo "<script>window.open('super_bottle_production.php','_self')</script>";
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