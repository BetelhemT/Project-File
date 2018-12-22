<?php
session_start();
if (!$_SESSION['admin_id'] ||  !($_SESSION['type'] =='Supervisor')) {
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
               <h1> <a class="navbar-brand" href="super_dashboard.php">Ethio Gambia</a></h1>
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
                <?php include 'super_nav.php'; ?>
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
				<span>Dashboard</span>
				</h2>
		    </div>
		<!--//banner-->
 	<!--grid-->
    <div class="content-top">


      <div class="col-md-4 ">
              <div class="content-top-1">
              <div class="col-md-6 top-content">
                  <h5>Produced</h5>
                  <?php
                   $query= "SELECT SUM(product_qty), SUM(damaged_qty), activity_date from production_entry WHERE activity_date > DATE_SUB(NOW(), INTERVAL 1 MONTH)";
                   $result = mysqli_query($con, $query);

                   while ($row=mysqli_fetch_array($result)){

                  ?>
                  <label><?php
                  $produced = $row['SUM(product_qty)'];
                  $damaged = $row['SUM(damaged_qty)'];
                  echo $produced;
                   function get_percentage($total, $number){
                    if ($total>0) {
                      return round(($number*100 )/$total);
                    }else{
                      return 0;
                    }
                   }
                   $total = $produced + $damaged;
                   // echo $total;
                   $produced_percent= get_percentage($total, $produced);

                   } ?></label>
                   <?php
              echo " <div id='demo-pie-1' class='pie-title-center' data-percent=".$produced_percent."><span class='pie-value'></span> </div>";
              ?>
              </div>

               <div class="clearfix"> </div>
              </div>
              <div class="content-top-1">
              <div class="col-md-6 top-content">
                  <h5>Damaged</h5>

                   <?php

                   $query= "SELECT SUM(damaged_qty) from production_entry WHERE activity_date > DATE_SUB(NOW(), INTERVAL 1 MONTH)";
                   $result = mysqli_query($con, $query);

                   while ($row=mysqli_fetch_array($result)){

                  ?>
                  <label><?php
                  $damaged = $row['SUM(damaged_qty)'];
                  echo $damaged;
                  $total = $produced + $damaged;
                  $damaged_percent = get_percentage($total, $damaged);
                    // $damaged_percent = $damaged/($total/100);
                    // echo ($damaged_percent);
                   } ?></label>
                   <?php
              echo " <div id='demo-pie-2' class='pie-title-center' data-percent=".$damaged_percent."> <span class='pie-value'></span> </div>";
              ?>

              </div>

               <div class="clearfix"> </div>
              </div>
              <!-- <div class="content-top-1">
              <div class="col-md-6 top-content">
                  <h5>Cards</h5>
                  <label>3401</label>
              </div>
              <div class="col-md-6 top-content1">
                  <div id="demo-pie-3" class="pie-title-center" data-percent="75"> <span class="pie-value"></span> </div>
              </div>
               <div class="clearfix"> </div>
              </div> -->
      </div>
        <div class="col-md-8 content-top-1">

        </div>

 </div>

       	<div class="clearfix"> </div>
      </div></div>
 	<!--//grid-->
		<!---->
<div class="copy">
            <p> &copy;  Ethio Gambia.</p>	    </div>

		</div></div>
		<div class="clearfix"> </div>


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
