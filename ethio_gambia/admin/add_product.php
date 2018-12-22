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
<title>Ethio Gambia | New Prouct</title>
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
<script src="checkid.js"></script>
<script src="js/screenfull.js"></script>
<script src="machine_script.js"></script>
<script src="machine_code_script.js"></script>
<script src="check_reference_no1.js"></script>
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
       <div class="banner">
          <h2>
        <a href="#">Admin</a>
        <i class="fa fa-angle-right"></i>
        <span>Add NewMachine</span>
        </h2>
        </div>
    <!--//banner-->
  <!--grid-->
  <div class="validation-system">

    <div class="validation-form">
  

<!-- form start -->


       <h4 align="center">Add New Product</h4><hr>
        
        <form action="add_product.php" method="post">
          <div class="vali-form">
           
            
            <div class="clearfix"> </div>
            <div class="col-md-6 form-group1 group-mail">
              <label class="control-label">Product Name</label>
              <input type="text" name="product_name" placeholder="Product Name" required="">           
            </div>        
             <div class="col-md-6 form-group1 group-mail">
              <label class="control-label">Product Code</label>
              <input type="text" id="product_code" name="product_code" placeholder="Product Code" required="">
              <div id="status"></div>
            </div>
             
            <div class="col-md-6 form-group2 group-mail">
              <label class="control-label">Product Type</label>
            <select name="product_type" required="">
              <option value="">---Select Product Type ---</option>
              <option value="Preform">Preform</option>
              <option value="Bottle">Blow</option>
              <option value="Jar">Jar</option>
              <option value="CUPS">Cap</option>
            </select>
            </div>
            <div class="col-md-6 form-group1 group-mail">
              <label class="control-label">Product Weight</label>
              <input type="text" name="product_weight" placeholder="Product Weight" required="">
            </div>
            
            <div class="clearfix"> </div>
            <div class="clearfix"> </div><br>
            <div class="col-md-6 col-md-offset-5 form-group">
              <button type="submit" name="submit" class="btn btn-danger">Submit</button>
              <button type="reset" class="btn btn-default">Reset</button>
            </div>           
          <div class="clearfix"> </div></div>
        </form>
        
        <?php
        if (isset($_POST['submit'])) {
          
          $product_code = mysqli_real_escape_string($con,$_POST['product_code']);
          $product_name = mysqli_real_escape_string($con,$_POST['product_name']);
          $activity_date =  date('Y-m-d H:i:s');
          $product_type = mysqli_real_escape_string($con,$_POST['product_type']);
          $product_weight = mysqli_real_escape_string($con,$_POST['product_weight']);
          
          // privilege 
          
           $insert = "INSERT INTO product(product_name,product_code,product_type,product_weight) VALUES ('$product_name','$product_code','$product_type','$product_weight')";
            $run_insert = mysqli_query($con,$insert);
          if ($run_insert) {
            $stock_insert = "INSERT INTO stock(product_name,product_code,product_type, available_product,damaged_product,activity_date) VALUES ('$product_name','$product_code','$product_type','0','0','$activity_date')";
            $run_insert_stock = mysqli_query($con,$stock_insert);
            if ($run_insert_stock) {
              $sold_insert = "INSERT INTO sold(product_name,product_code,product_type, qty,activity_date) VALUES ('$product_name','$product_code','$product_type','0','$activity_date')";
            $run_insert_sold = mysqli_query($con,$sold_insert);
              echo "<script>alert('You have added $product_name as a new Product ')</script>";
           echo "<script>window.open('view_product.php','_self')</script>";
            }
           
          }
          }


        
        ?>



 </div>

</div>
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
