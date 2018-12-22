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
<title>Ethio Gambia | Customers</title>
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
          <h3>
        Customers List
        </h3>
        <hr>
          
        <form action="view_customers_list.php" method="POST">
                <div class="input-group input-group-in" style="padding-bottom: 0em;">
                    <input name="search" class="form-control2 input-search" placeholder="Search Customer..." type="text">
                    <span class="input-group-btn">
                        <button class="btn btn-success" type="submit" type="button"><i class="fa fa-search"></i></button>
                    </span>
                </div><!-- Input Group -->
            </form>        
        </div>
		<!--//banner-->
 	<!--grid-->
 	<div class="validation-system">

 		<div class="validation-form">
 	<!---->

        
  <?php
  if (isset($_POST['search'])) {
    $search = mysqli_real_escape_string($con,$_POST['search']);
      $sel = "SELECT * from customers_list WHERE customer_name LIKE '%$search%' OR customer_id LIKE '%$search%'  OR tin_no LIKE '%$search%' OR phone_no LIKE '%$search%'";
      $run = mysqli_query($con, $sel);
      $check = mysqli_num_rows($run);
      

   
  if ($check ==0 || empty($search)) {
    echo'<br><div class="alert alert-danger" role="danger"><strong>Sorry!</strong> 0 results found....Please try again</div>';
  
    }else{?>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Customer ID</th>
      <th scope="col">Tin No</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Phone No</th>
      <!-- <th scope="col">Edit</th> -->
      
    </tr>
  </thead>
    <?php
    $i = 0;

  while ($row=mysqli_fetch_array($run)) {
      
      $customer_id = $row['customer_id'];
      $tin_no = $row['tin_no'];
      $customer_name = $row['customer_name'];
      $phone_no = $row['phone_no'];   
      $i++;

  
  ?>
  <tbody>
    <tr>
      
      
      <td><?php echo $customer_id;?></td>
      <td><?php echo $tin_no;?></td>
      <td><?php echo $customer_name;?></td>
      <td><?php echo $phone_no;?></td>
      
      <!-- 
      <td><a class="btn btn-xs btn-danger warning_4" href="view_customers_list.php?customer_id=<?php echo $customer_id;?>">Delete</a></td> -->
    </tr>
   <?php }} 
  }else{
  $sel = "SELECT * from customers_list order by customer_name";
  $run = mysqli_query($con, $sel);
  ?>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Customer ID</th>
      <th scope="col">Tin No</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Phone No</th>
      <!-- <th scope="col">Delete</th> -->
    </tr>
  </thead>
    <?php
  $i = 0;

  while ($row=mysqli_fetch_array($run)) {
      
      $customer_id = $row['customer_id'];
      $tin_no = $row['tin_no'];
      $customer_name = $row['customer_name'];
      $phone_no = $row['phone_no']; 
      $i++;

  
  ?>
  <tbody>
    <tr>
      
      
     <td><?php echo $customer_id;?></td>
       <td><?php echo $tin_no;?></td>
      <td><?php echo $customer_name;?></td>
      <td><?php echo $phone_no?></td>
    <!--   <?php 
                if (($_SESSION['type'] =='Supervisor')) {
                  echo '<td><a disabled="" class="btn btn-xs btn-danger warning_4" href="view_customers_list.php?customer_id=<?php echo $customer_id;?>">Delete</a></td>';
                
                }else{
                                echo '<td><a class="btn btn-xs btn-danger warning_4" href="super_entry.php?customer_id=',htmlspecialchars($row['customer_id'], ENT_QUOTES, 'UTF-8'),'">Delete</a></td>';
                              } 
                ?> -->
      
      
<!--       <td><a class="btn btn-xs btn-danger warning_4" href="view_customers_list.php?customer_id=<?php echo $customer_id;?>">Delete</a></td>
 -->    </tr>
   <?php } 

   
  }
  

  ?>
  </tbody>
</table>
	<!-- <?php
    if (isset($_GET['customer_id'])) {

        $get_customer_id = $_GET['customer_id'];

            $Delete = "delete from customers_list WHERE customer_id='$get_customer_id'";
            $run_delete = mysqli_query($con, $Delete);

            if ($run_delete) {
                echo "<script>alert('Customer Deleted Successfully!')</script>";
                echo "<script>window.open('view_customers_list.php','_self')</script>";
            }
    }
    ?> -->
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
