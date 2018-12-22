<?php
session_start();
$con = mysqli_connect("localhost","root","","meskel_flower_production") or die("Connection could not be Established");
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Ethio Gambia | Signin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Ethio Gambia" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"> </script>
</head>
<body>
  <div style="float:right;
  padding: 1em;"><a href="admin/index.php"><img src="images/if_administrator_43663.png" alt="Admin Page" style="size:cover;
  width: 4em; height: 4em;">
    </a>
</div>
	<div class="login">
		<h1><a href="index.php">Ethio Gambia</a></h1>
		<div class="login-bottom">
			<h2>Sign In</h2>
			<form action="index.php" method="post">
			<div class="col-md-12">
				<div class="login-mail">
					<input type="text" name="employee_id" placeholder="ID No." required="">
					<i class="fa fa-user"></i>
				</div>						
			</div>
			<div class="col-md-6 col-md-offset-3 login-do">
				<label class="hvr-shutter-in-horizontal login-sub">
					<input type="submit" name="login" value="Login">
				</label>
			</div>
			<div class="clearfix"> </div>
			</form>
			<?php

               if (isset($_POST['login'])) {
                 $employee_id = mysqli_real_escape_string($con,$_POST['employee_id']) ;
                 $sel = "SELECT * FROM employee WHERE employee_id='$employee_id'";
                 $run = mysqli_query($con,$sel);
                 $check = mysqli_num_rows($run);

                 if ($check==0) {
                  ?><br><div><?php echo "<div class=\"alert alert-danger\" role=\"alert\">
        <strong>Error! </strong>Employee does not exist. Please enter a valid <strong>ID No.</strong></div>"; ?></div><?php
                   exit();
                 }
                
                 else{
                 $_SESSION['employee_id']= $employee_id;
                 
                  echo "<script> window.open('dashboard.php','_self')</script>";
                 
                 }

               }

               ?>
              
               
			
		</div>
	</div>
<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
</body>
</html>

