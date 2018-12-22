<?php
session_start();
$con = mysqli_connect("localhost","root","","meskel_flower_production") or die("Connection could not be Established");
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Ethio Gambia | Admin Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="EthioGambia" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet">
<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"> </script>
</head>
<body>
	<div class="login">
		<h1><a href="index.php">Ethio Gambia Admin</a></h1>
		<div class="login-bottom">
			<h2>Login</h2>
			<form action="index.php" method="post">
			<div class="col-md-6">
				<div class="login-mail">
					<input type="text" name="username" placeholder="Username" required="">
					<i class="fa fa-user"></i>
				</div>
				<div class="login-mail">
					<input type="password" name="password" placeholder="Password" required="">
					<i class="fa fa-lock"></i>
				</div>
				   <!--a class="news-letter " href="#">
						 <label class="checkbox1"><input type="checkbox" name="checkbox" ><i> </i>Forget Password</label>
					   </a-->


			</div>
			<div class="col-md-6 login-do">
				<label class="hvr-shutter-in-horizontal login-sub">
					<input type="submit" name="login" value="login">
					</label>
					<p>Not an admin?</p>
				<a href="../index.php" class="hvr-shutter-in-horizontal">Go Back</a>
			</div>

			<div class="clearfix"> </div>
			</form>
			<?php
			 if (isset($_POST['login'])) {
                 $username = mysqli_real_escape_string($con,$_POST['username']) ;
                 $password = mysqli_real_escape_string($con,$_POST['password']) ;

                 $sel = "SELECT * FROM admin WHERE username='$username' AND password = '$password'";
                 $run = mysqli_query($con,$sel);
                 $check = mysqli_num_rows($run);
								 $row = mysqli_fetch_assoc($run);
								$admin_id= $row["admin_id"];
								$type= $row["type"];

                 if ($check==0) {
                  ?><br><div><?php echo "<div class=\"alert alert-danger\" role=\"alert\">
        <strong>Error! </strong>Incorrect Username or Password. Please Input Correct Credentials</div>"; ?></div><?php
                   exit();
                 } else{
                 	if ($row["type"]=="Adminstrator") {
                 		$_SESSION['admin_id']= $admin_id;
                 		$_SESSION['type']= $type;
                  		echo "<script> window.open('dashboard.php','_self')</script>";
                 	}
                 	elseif($row["type"]=="Supervisor"){
                 	$_SESSION['admin_id']= $admin_id;
                 	$_SESSION['type']= $type;
                  	echo "<script> window.open('super_dashboard.php','_self')</script>";
                 }
                 

               }
			?>
		</div>
	</div>
		<!---->

<!---->
<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
</body>
</html>
<?php } ?>