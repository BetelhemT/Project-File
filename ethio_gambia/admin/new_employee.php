<?php
session_start();
if (!$_SESSION['admin_id']) {
	header("location: index.php");
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
               <h1> <a class="navbar-brand" href="index.php">Ethio Gambia</a></h1>
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
                <ul class="nav" id="side-menu">

                    <li>
                        <a href="dashboard.php" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Dashboard</span> </a>
                    </li>
                    <li>
                        <a href="gallery.html" class=" hvr-bounce-to-right"><i class="fa fa-picture-o nav_icon"></i> <span class="nav-label">Bottle</span> </a>
                    </li>
                      <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-desktop nav_icon"></i> <span class="nav-label">Manage Employees</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="404.html" class=" hvr-bounce-to-right"> <i class="fa fa-info-circle nav_icon"></i>Add Employee</a></li>
                            <li><a href="faq.html" class=" hvr-bounce-to-right"><i class="fa fa-question-circle nav_icon"></i>View & Edit Employee</a></li>
                            <li><a href="blank.html" class=" hvr-bounce-to-right"><i class="fa fa-file-o nav_icon"></i>Blank</a></li>
                       </ul>
                    </li>
                     <li>
                        <a href="layout.html" class=" hvr-bounce-to-right"><i class="fa fa-th nav_icon"></i> <span class="nav-label">Grid Layouts</span> </a>
                    </li>

                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-list nav_icon"></i> <span class="nav-label">Forms</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="forms.html" class=" hvr-bounce-to-right"><i class="fa fa-align-left nav_icon"></i>Basic forms</a></li>
                            <li><a href="validation.html" class=" hvr-bounce-to-right"><i class="fa fa-check-square-o nav_icon"></i>Validation</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-cog nav_icon"></i> <span class="nav-label">Settings</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="index.php" class=" hvr-bounce-to-right"><i class="fa fa-sign-in nav_icon"></i>Signin</a></li>
                            <li><a href="signup.html" class=" hvr-bounce-to-right"><i class="fa fa-sign-in nav_icon"></i>Singup</a></li>
                        </ul>
                    </li>
                </ul>
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
				<span>Add New Employee</span>
				</h2>
		    </div>
		<!--//banner-->
 	<!--grid-->
 	<div class="validation-system">
		<div class="validation-form">
			<h3>New Employee</h3>
			<form method="post" action="new_employee.php">
				<div class="vali-form">
					<div class="col-md-6 form-group1">
						<label class="control-label">Firstname</label>
						<input type="text" placeholder="Firstname" name="firstname" required="">
					</div>
					<div class="col-md-6 form-group1 form-last">
						<label class="control-label">Lastname</label>
						<input type="text" placeholder="Lastname" name="lastname" required="">
					</div>
					<div class="clearfix"> </div>
					</div>
					<div class="vali-form">
						<div class="col-md-6 form-group1">
							<label class="control-label">Phone No.</label>
							<input type="text" placeholder="Phone No." name="phone" required="">
						</div>
						<div class="col-md-6 form-group1 form-last">
							<label class="control-label">Id No.</label>
							<input type="number" placeholder="Id No." name="id" min="0" required="">
						</div>
						<div class="clearfix"> </div>
						</div>
						<div class="vali-form">
							<div class="col-md-6 form-group1 form-last">
								<label class="control-label">Gender</label>
								<input type="text" placeholder="Lastname" required="">
							</div>
							<div class="col-md-6 form-group1">
								<label class="control-label">Occupation</label>
							<select name="occpation">
								<option value="operator">Machine Operator</option>
								<option value="supervisor">Supervisor</option>
								<option value="counter">Counter</option>
							</select>
							</div>

							<div class="clearfix"> </div>
							</div>


					 <div class="clearfix"> </div>
						<div class="col-md-12 form-group2 group-mail">
						<label class="control-label">Language</label>
					<select>
						<option value="">English</option>
						<option value="">Japanese</option>
						<option value="">Russian</option>
						<option value="">Arabic</option>
						<option value="">Spanish</option>
					</select>
					</div>
					 <div class="clearfix"> </div>
					<div class="col-md-12 form-group1 ">
						<label class="control-label">Your Comment</label>
						<textarea  placeholder="Your Comment..." required="">Your Comment.....</textarea>
					</div>
					 <div class="clearfix"> </div>
					<div class="vali-form">
					<div class="col-md-6 form-group1">
						<label class="control-label">Phone Number</label>
						<input type="text" placeholder="Phone Number" required="">
					</div>
					<div class="col-md-6 form-group1 form-last">
						<label class="control-label">Mobile Number</label>
						<input type="text" placeholder="Mobile Number" required="">
					</div>
					<div class="clearfix"> </div>
					</div>
					 <div class="vali-form vali-form1">
					<div class="col-md-6 form-group1">
						<label class="control-label">Create a password</label>
						<input type="password" placeholder="Create a password" required="">
					</div>
					<div class="col-md-6 form-group1 form-last">
						<label class="control-label">Repeated password</label>
						<input type="password" placeholder="Repeated password" required="">
					</div>
					<div class="clearfix"> </div>
					</div>
					 <div class="col-md-12 form-group1 group-mail">
						<label class="control-label">Number</label>
						<input type="text" placeholder="Number" required="">
						 <p class=" hint-block">Numeric values from 0-***</p>
					</div>
					 <div class="clearfix"> </div>

					<div class="col-md-12 form-group1 group-mail">
						<label class="control-label ">Date</label>
						<input type="date" class="form-control1 ng-invalid ng-invalid-required" ng-model="model.date" required="">
					</div>
					 <div class="clearfix"> </div>
					<div class="col-md-12 form-group">
						<div class="checkbox1">
							<label>
								<input type="checkbox" ng-model="model.winner" required="" class="ng-invalid ng-invalid-required">
								Are you a winner?
							</label>
						</div>
					</div>
					 <div class="clearfix"> </div>
						<div class="col-md-12 form-group2 group-mail">
						<label class="control-label">Select</label>
					<select>
						<option value="">Contrary</option>
						<option value="">Contrary1</option>
						<option value="">Contrary2</option>
						<option value="">Contrary3</option>
						<option value="">Contrary4</option>
					</select>
					</div>
					 <div class="clearfix"> </div>

					<div class="col-md-12 form-group">
						<button type="submit" class="btn btn-primary">Submit</button>
						<button type="reset" class="btn btn-default">Reset</button>
					</div>
				<div class="clearfix"> </div>
			</form>
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
