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
            $('#demo-pie-4').pieChart({
                barColor: '#000000',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });
             $('#demo-pie-6').pieChart({
                barColor: '#ff0663',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 5,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

           $('#demo-pie-7').pieChart({
                barColor: '#ff0663',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 5,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-8').pieChart({
                barColor: '#ff0663',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 5,
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
		   <div class="banner">
		    	<h2>
				<a href="#">Admin</a>
				<i class="fa fa-angle-right"></i>
				<span>Perform Stock</span>
				</h2>
		    </div>
		<!--//banner-->
 	<!--grid-->
    <div class="content-top">
        <div class="typo-grid">
      <div class="typo-1">
        <div style="margin-bottom:0em;" class="grid_3 grid_5">

          <h3>
        Preform Sales Entry
        </h3>
        <hr>

        <form action="perform.php" method="POST">
                <div class="input-group input-group-in" style="padding-bottom: 0em;">
                    <input name="search" class="form-control2 input-search" placeholder="Search for availabe Preform in stock..." type="text">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-success" type="button"><i class="fa fa-search"></i></button>
                    </span>
                </div><!-- Input Group -->
            </form>
  <!---->

   <?php
  if (isset($_POST['search'])) {
    $search = mysqli_real_escape_string($con,$_POST['search']);
      $sel = "SELECT * from stock WHERE product_code LIKE '%$search%' AND product_type='Preform' OR product_name LIKE '%$search%' AND product_type='Preform' OR product_code LIKE '%$search%' AND product_type='preform' OR product_name LIKE '%$search%' AND product_type='preform' ORDER BY available_product DESC" ;

  $run = mysqli_query($con, $sel);
  $check = mysqli_num_rows($run);
  if ($check ==0 || empty($search)) {
    echo'<br><div class="alert alert-danger" role="danger"><strong>Sorry!</strong> 0 results found....Please try again</div>';
  }else{

      ?>

  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Product Code</th>
      <th scope="col">Product Name</th>
      <th scope="col">Qty Available</th>
      <th scope="col"></th>

    </tr>
  </thead>

      <?php
  $i = 0;

  while ($row=mysqli_fetch_array($run)) {
      $id =$row['stock_id'];
      $product_code = $row['product_code'];
      $product_name = $row['product_name'];
      $product_type = $row['product_type'];
      $available_product = $row['available_product'];
     $i++;

  ?>

  <tbody>
    <tr>


      <td><?php echo $product_code;?></td>
      <td><?php echo $product_name;?></td>

      <td><?php echo $available_product;?></td>

      <td><a class="btn btn-xs btn-success warning_4" name="id" href="modal.php?id=<?php echo $id; ?>" >Select</a></td>

    </tr>
   <?php   }}} ?>
  </tbody>
</table>
  <div class="bs-example2 bs-example-padded-bottom">


<!--end of search table-->
<div class="modal fade" id="myModal" role="dialog" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2 class="modal-title">Preform Sales Entry Form</h2>
              </div>
              <div class="modal-body">

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Submit</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->


        </div>
        </div>
      </div>
    </div>
  </div>
                </div>
                <div class="content-mid"><div class="banner" style="padding: 1em;">
          <h3>
          Weekly Perform Production
        </h3>
        </div>
        <br>
        <div class="col-md-4 ">

                <div class="content-top-1">
                <div class="col-md-6 top-content">
                    <h5>Produced</h5>
                    <?php
                     $query= "SELECT SUM(available_product), SUM(damaged_product) from stock WHERE product_type = 'Perform'";
                     $result = mysqli_query($con, $query);

                     while ($row=mysqli_fetch_array($result)){

                    ?>
                    <label><?php
                    $produced = $row['SUM(available_product)'];
                    $damaged = $row['SUM(damaged_product)'];
                    echo $produced;
                     function get_percentage($total, $number){
                      if ($total>0) {
                        return round(($number*100 )/$total);
                      }else{
                        return 0;
                      }

}                     $total = $produced + $damaged;
                     // echo $total;
                     $produced_percent= get_percentage($total, $produced);

                     } ?></label>
                </div>
                <div class="col-md-6 top-content1">
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

                     $query= "SELECT SUM(damaged_product) from stock WHERE product_type = 'Perform'";
                     $result = mysqli_query($con, $query);

                     while ($row=mysqli_fetch_array($result)){

                    ?>
                    <label><?php
                    $damaged = $row['SUM(damaged_product)'];
                    echo $damaged;
                    $total = $produced + $damaged;
                    $damaged_percent = get_percentage($total, $damaged);
                      // $damaged_percent = $damaged/($total/100);
                      // echo ($damaged_percent);
                     } ?></label>

                </div>
                <div class="col-md-6 top-content1">
                <?php
                echo " <div id='demo-pie-2' class='pie-title-center' data-percent=".$damaged_percent."><span class='pie-value'></span> </div>";
                ?>
                    <!-- <div id="demo-pie-2" class="pie-title-center" data-percent="22"> -->
                </div>
                 <div class="clearfix"> </div>
                </div>



        </div>

          <div class="col-md-4 ">

                <div class="content-top-1">
                <div class="col-md-6 top-content">
                    <h5>Sold</h5>
                       <?php
                     $query= "SELECT SUM(qty)from sold WHERE product_type = 'Perform' AND activity_date > DATE_SUB(NOW(), INTERVAL 1 WEEK)";
                     $result = mysqli_query($con, $query);

                     while ($row=mysqli_fetch_array($result)){

                    ?>
                    <label><?php
                    $sold = $row['SUM(qty)'];
                    // $damaged = $row['SUM(damaged_qty)'];
                    echo $sold;

                     $total = $produced;
                     // echo $total;
                      $sold_percent= get_percentage($total, $sold);

                     } ?></label>
                </div>
                <div class="col-md-6 top-content1">
                <?php
                echo " <div id='demo-pie-4' class='pie-title-center' data-percent=".$sold_percent."><span class='pie-value'></span> </div>";

                    ?>
                </div>
                 <div class="clearfix"> </div>
                </div>
                <div class="content-top-1">
                <div class="col-md-6 top-content">
                    <h5>Remaining </h5>
                  <?php

                     $sell= "SELECT SUM(available_product) from stock WHERE product_type = 'Perform'";
                     $resultt = mysqli_query($con, $sell);

                     while ($row=mysqli_fetch_array($resultt)){

                    ?>
                    <label><?php
                    $remaining = $row['SUM(available_product)'];
                    echo $remaining;

                     $total = $produced;
                     // echo $total;
                      $remaining_percent= get_percentage($total, $remaining);
                      // $damaged_percent = $damaged/($total/100);
                      // echo ($damaged_percent);
                     } ?></label>

                </div>
                <div class="col-md-6 top-content1">
                <?php
                echo " <div id='demo-pie-3' class='pie-title-center' data-percent=".$remaining_percent."><span class='pie-value'></span> </div>";
                ?>
                    <!-- <div id="demo-pie-2" class="pie-title-center" data-percent="22"> -->
                </div>
                 <div class="clearfix"> </div>
                </div>



        </div>
         <div class="col-md-4 ">


                <div class="content-top-1">
                <div class="col-md-6 top-content">
                    <h5>Purchased</h5>
                  <?php
                     $query= "SELECT SUM(purchased_qty) from periform_purchased";
                     $result = mysqli_query($con, $query);

                     while ($row=mysqli_fetch_array($result)){

                    ?>
                    <label><?php
                    $produced = $row['SUM(purchased_qty)'];
                    // $damaged = $row['SUM(damaged_qty)'];
                    echo $produced;

                     $total = $produced;
                     // echo $total;
                     $produced_percent= get_percentage($total, $produced);


                     } ?></label>
                </div>
                <div class="col-md-6 top-content1">
                <?php
                echo " <div id='demo-pie-7' class='pie-title-center' data-percent=".$produced_percent."><span class='pie-value'></span> </div>";

                    ?>
                </div>
                 <div class="clearfix"> </div>
                </div>


                <div class="content-top-1">
                <div class="col-md-6 top-content">
                    <h5>Total Production</h5>
                    <?php
                     $query= "SELECT SUM(available_product), SUM(damaged_product) from stock WHERE product_type = 'Perform'";
                     $result = mysqli_query($con, $query);

                     while ($row=mysqli_fetch_array($result)){

                    ?>
                    <label><?php
                    $produced = $row['SUM(available_product)'];
                    $damaged = $row['SUM(damaged_product)'];
                    echo $produced;

                     $total = $produced + $damaged;
                     // echo $total;
                     $produced_percent= get_percentage($total, $produced);

                     } ?></label>
                </div>
                <div class="col-md-6 top-content1">
                <?php
                echo " <div id='demo-pie-8' class='pie-title-center' data-percent=".$produced_percent."><span class='pie-value'></span> </div>";

                    ?>
                </div>
                 <div class="clearfix"> </div>
                </div>



                <br>
        </div>
        </div>
     <div class="clearfix"> </div></div>
                <div class="clearfix"> </div>
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
