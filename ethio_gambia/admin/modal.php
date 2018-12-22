<?php
session_start();
if (!$_SESSION['admin_id']) {
  header("location: logout.php");
}
else{
    if (!empty($_GET['id'])) {
      $_SESSION['mid'] = $_GET['id'];
      $con = mysqli_connect("localhost","root","","meskel_flower_production") or die("Connection could not be Established");
      $query ="SELECT * FROM stock WHERE stock_id=".$_SESSION['mid'];
      $id = $_SESSION['mid'];
      $run = mysqli_query($con, $query);
  $i = 0;
  while ($row=mysqli_fetch_array($run)) {
       // $id =$row['stock_id'];
      $product_code = $row['product_code'];
      $product_name = $row['product_name'];
      $product_type = $row['product_type'];
      $available_product = $row['available_product'];


    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Ethio Gambia | Sales Entry Form</title>
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
<script src="check_reference_no.js"></script>
<!-- Mainly scripts -->
<script src="js/jquery.metisMenu.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<link href="css/custom.css" rel="stylesheet">
<script src="js/custom.js"></script>
<script src="js/screenfull.js"></script>
<script src="js/script2.js"></script>
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
        <span>Sales Entry Form</span>
        </h2>
        </div>
    <!--//banner-->
  <!--grid-->
  <div class="validation-system">

    <div class="validation-form">


<!-- form start -->


       <h4 align="center">Sales Entry Form</h4><hr>
        <form action="modal.php?id=<?php echo $id; ?>" method="POST">
                 <div class="row">
              <div class="vali-form">
                 <div class="col-md-6">
                  <center>
                  <p><?php echo $product_code;?></p></center>
                 </div>
                 <div class="col-md-6">
                  <center>
                   <p><?php echo $product_name;?></p></center>
                 </div>
                 </div>
                 <div class="col-md-12 has-success ">
                  <center>
                    <br>

                   <h5>Available in Stock</h5>
                   <label class="control-label" for="inputSuccess1"><?php echo $available_product; ?></label>
                  </center>
                 </div>
                    <br><br>
                  </div>
                  <hr>
                  <div class="vali-form">
                    <div class="col-md-4 form-group2 group-mail">
              <label class="control-label">Customer Name</label>
            <select name="customer_name" required="">
              <option value = "">---Select Customer---</option>
  <?php
                  $sel = "SELECT * FROM customers_list ORDER BY customer_name";
                    $run = mysqli_query($con,$sel);
                    while($row = mysqli_fetch_assoc($run)) {
                echo "<option value='".$row['customer_name']."'>".$row['customer_name']. " </option>";
              }
                  ?>
            </select>
            </div>
                <div class="col-md-4 form-group1 form-last">
                  <label class="control-label">Reference No.</label>
                  <input type="text" id="refrence_no" name="refrence_no" placeholder="Reference No." required="">
                  <div id="status"></div> 
                </div>
                <div class="form-group has-success col-md-4">
            <label class="control-label" for="inputSuccess1">QTY</label>
            <input type="number" min="0" name="qty" placeholder="0" class="form-control1" id="qty" required=""><div id="status"></div>
          </div>


                            </div>
          <div class="clearfix"> </div><br>
            <div class="col-md-6 col-md-offset-5 form-group">
              <button type="submit" name="submit" type="button" class="btn btn-danger">Submit</button>
              <button type="reset" class="btn btn-default">Reset</button>
            </div>
         <div class="clearfix"> </div>
        </form>
        <?php

        if (isset($_POST['submit'])) {

        $qty = mysqli_real_escape_string($con,$_POST['qty']);
        $reference_no = mysqli_real_escape_string($con,$_POST['refrence_no']);
        $customer_name = mysqli_real_escape_string($con,$_POST['customer_name']);
        // $sold_product = mysqli_real_escape_string($con,$_POST['sold_product']);
        $remaining_product = $available_product - $qty;
         $activity_date =  date('Y-m-d H:i:s');
        // $remaning_product = mysqli_real_escape_string($con,$_POST['remaning_product']);
        if($remaining_product >= 0){
          //stastus 1 = pending . status 0= done
            $status = 0; }

        else{
          $status = 1;
          
        }
        
        if ($available_product >= $qty) {
          // $new_qty =  $available_product - $qty;
          $update_sold = "UPDATE sold SET qty='$qty' WHERE product_name ='$product_name'";
            $run_update_sold = mysqli_query($con,$update_sold);
            if ($run_update_sold) {
              $final_stock_qty = $available_product - $qty;
              $update_stock = "UPDATE stock SET available_product = '$final_stock_qty'WHERE stock_id = ".$_SESSION['mid'];
              $run_update_stock = mysqli_query($con,$update_stock);
              if ($run_update_stock) {
                echo "done";
                $insert_sales = "INSERT INTO sales_entri(customer_name, reference_no, qty, product_name, product_code, remaining_product, status, activity_date, stock_id) VALUES ('$customer_name', '$reference_no', '$qty','$product_name', '$product_code', 0, '$status', '$activity_date', '$id')";
                 // $insert = "INSERT INTO sales_entri(customer_name,refrence_no,qty,product_name,product_code,sold_product,remaning_product,status,activity_date,stock_id) VALUES ('$customer_name','$reference_no','$qty','$product_name','$product_code','$qty','$remaning_product','$status','$activity_date','$id')";
                  
                $run_insert = mysqli_query($con,$insert_sales);
                if ($run_insert) {
                  echo "<script>alert('You have Successfully Made a Sale')</script>";
                echo "<script>window.open('sales_entry.php','_self')</script>";
                }
                
              }
            }
        }else {
          $remaining_product = abs($available_product - $qty); 
          $insert_sales = "INSERT INTO sales_entri(customer_name, reference_no, qty, product_name, product_code, remaining_product, status, activity_date, stock_id) VALUES ('$customer_name', '$reference_no', '$qty','$product_name', '$product_code', $remaining_product , '$status', '$activity_date', '$id')";
                 // $insert = "INSERT INTO sales_entri(customer_name,refrence_no,qty,product_name,product_code,sold_product,remaning_product,status,activity_date,stock_id) VALUES ('$customer_name','$reference_no','$qty','$product_name','$product_code','$qty','$remaning_product','$status','$activity_date','$id')";
                  
                $run_insert = mysqli_query($con,$insert_sales);
                if ($run_insert) {
                  echo "<script>alert('you have Successfully made a sale with $remaining_product products remaining!')</script>";
          echo "<script>window.open('pending_sales.php','_self')</script>";
                }
          
        }
        }

        ?>
            <div class="clearfix"> </div>


            <div class="clearfix"> </div><br>


            <!-- <div class="col-md-6 col-md-offset-5 form-group">
              <button type="submit" name="submit" class="btn btn-danger">Submit</button>
              <button type="reset" class="btn btn-default">Reset</button>
            </div>




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
