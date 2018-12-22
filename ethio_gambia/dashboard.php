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
<title>Ethio Gambia | Dashboard</title>
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
               <h1> <a class="navbar-brand" href="production_entry.php">Ethio Gambia</a></h1>         
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
                    #echo $_SESSION['employee_id'];
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
        <span>Dashboard</span>
        </h2>
        </div>
    <!--//banner-->
  <!--grid-->
  <div class="validation-system">
    
    <div class="validation-form">
  <!---->
  <h4 align="center">Recent Activity</h4><hr><br>
  <h5>Production Entry</h5>
  <hr>
        
        
        <?php
        $selemp = "SELECT * FROM employee WHERE employee_id=".$_SESSION['employee_id'];
                    $run = mysqli_query($con,$selemp);
                    while($row = mysqli_fetch_assoc($run)) {
                $employee_name =   $row["employee_name"];
              }
                  
          // $select_entries = "SELECT * FROM production_entry WHERE employee_name=$employee_name ORDER BY activity_date DESC LIMIT 5;"
              $select_entries = "SELECT * FROM production_entry WHERE employee_name='$employee_name' ORDER BY activity_date DESC LIMIT 3";
          $runn = mysqli_query($con, $select_entries);
               $check = mysqli_num_rows($runn);   
        if ($check ==0) {
          echo'<br><div class="alert alert-danger" role="danger"><strong>You Have 0 Recent Activity</strong></div>';
        }
          ?>

           <table class="table table-responsive table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">Product Code</th>
      <th scope="col">Activity Date</th>
      <th scope="col">Machine Id</th>
      <th scope="col">Product Qty</th>
      <th scope="col">Damaged Qty</th>
      <th scope="col">Employee Name</th>     
    </tr>
  </thead>
  <?php
  $i = 0;

  while ($row=mysqli_fetch_array($runn)) {
      $id =$row['production_id'];
      $activity_date = $row['activity_date'];
      $machine_id = $row['machine_id'];
      $product_code = $row['product_code'];
      $product_qty = $row['product_qty'];
      $damaged_qty = $row['damaged_qty'];
      $i++;
    
  ?>
  <tbody>
    <tr>
      <td><?php echo $product_code;?></td>
      <td><?php echo $activity_date;?></td>
      <td><?php echo $machine_id;?></td>
      <td><?php echo $product_qty;?></td>
      <td><?php echo $damaged_qty;?></td>
      <td><?php echo $employee_name;?></td>
    </tr>
   <?php } ?>
  </tbody>
</table>
    <br>
    <h5>Receiving</h5>
    <hr>
    <?php
        $selemp = "SELECT * FROM employee WHERE employee_id=".$_SESSION['employee_id'];
                    $run = mysqli_query($con,$selemp);
                    while($row = mysqli_fetch_assoc($run)) {
                $employee_name =   $row["employee_name"];
              }
                  
          // $select_entries = "SELECT * FROM production_entry WHERE employee_name=$employee_name ORDER BY activity_date DESC LIMIT 5;"
              $select_entries = "SELECT * FROM receive WHERE employee_name='$employee_name' ORDER BY activity_date DESC LIMIT 2";
          $runn = mysqli_query($con, $select_entries);
               $check = mysqli_num_rows($runn);   
        if ($check ==0) {
          echo'<br><div class="alert alert-danger" role="danger"><strong>You Have 0 Recent Activity</strong> </div>';
        }
          
          ?>

           <table class="table table-responsive table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">Product Name</th>
      <th scope="col">Qty</th>
      <th scope="col">Activity Date</th>
      <th scope="col">Reference Number</th>
      
      <th scope="col">Employee Name</th>  
      <th scope="col">Station</th>  

    </tr>
  </thead>
  <?php
  $i = 0;

  while ($row=mysqli_fetch_array($runn)) {
      $id =$row['receive_id'];
      $activity_date = $row['activity_date'];
      $product_name = $row['product_name'];
      $qty = $row['qty'];
      
      $employee_name = $row['employee_name'];
      $station = $row['station'];
      $refrence_no = $row['refrence_no'];
      $i++;
    
  ?>
  <tbody>
    <tr>
      <td><?php echo $product_name;?></td>
      <td><?php echo $qty;?></td>
      <td><?php echo $activity_date;?></td>
      
      <td><?php echo $refrence_no;?></td>
      <td><?php echo $employee_name;?></td>
      <td><?php echo $station;?></td>
      
    </tr>
   <?php } ?>
  </tbody>
</table>
  <!---->
 </div>

</div>
  <!--//grid-->
    <!---->
<div class="copy">
            <p> &copy;  Ethio Gambia.</p>     </div>
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