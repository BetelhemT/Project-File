<?php
session_start();
if (!$_SESSION['admin_id'] ) {
  header("location: logout.php");
}
else{
    if (!empty($_GET['id'])) {
      $_SESSION['salesid'] = $_GET['id'];
      $con = mysqli_connect("localhost","root","","meskel_flower_production") or die("Connection could not be Established");
      $query ="SELECT * FROM sales_entri WHERE sales_id=".$_SESSION['salesid'];
      $id = $_SESSION['salesid'];
      $run = mysqli_query($con, $query);
  $i = 0;
  while ($row=mysqli_fetch_array($run)) {
      $stock_id =$row['stock_id'];
      // $product_code = $row['product_code'];
      // $product_name = $row['product_name'];
      // $product_type = $row['product_type'];
      // $available_product = $row['available_product'];
      $customer_name = $row['customer_name'];
      $qty = $row['qty'];
      $remaining_product = $row['remaining_product'];
      $product_code = $row['product_code'];
      $product_name = $row['product_name'];
      $reference_no = $row['reference_no'];
      $status = $row['status'];


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
        <form action="edit_sale.php?id=<?php echo $id; ?>" method="POST">
                 <div class="row">
              <div class="vali-form">
                 <div class="col-md-6">
                  <center>
                     <label class="control-label">Product Code</label>
                  <p><?php echo $product_code;?></p></center>
                 </div>
                 <div class="col-md-6">
                  <center>
                     <label class="control-label">Product Name</label>
                   <p><?php echo $product_name;?></p></center>
                 </div>
                 </div>
                 <div class="col-md-12 has-success ">
                  <center>
                    <br>

                   <h5>Remaining Product Amount</h5>
                   <label class="control-label" for="inputSuccess1"><?php echo $remaining_product; ?></label>
                  </center>
                 </div>
                    <br><br>
                  </div>
                  <hr>
                  <div class="vali-form">
                    <div class="col-md-4 form-group2 group-mail">
              <label class="control-label">Customer Name</label>
            <select name="customer_name" required="">
              <!-- <?php echo "<option value='".$row['customer_name']."'>".$row['customer_name']. "</option>"; ?> -->
              <option value = "<?php echo $customer_name;?>"><?php echo $customer_name;?></option> 
 <!--  <?php
                  $sel = "SELECT * FROM customers_list ORDER BY customer_name";
                    $run = mysqli_query($con,$sel);
                    while($row = mysqli_fetch_assoc($run)) {
                echo "<option value='".$row['customer_name']."'>".$row['customer_name']. "</option>";
              }
                  ?> -->
            </select>
            </div>
                <div class="col-md-4 form-group1 form-last">
                  <label class="control-label">Reference No.</label>
                  <input type="text" name="refrence_no" placeholder="Reference No." value="<?php echo $reference_no; ?>" disabled="">
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
        $final_remaning_product = $remaining_product - $qty;
        
        // $remaning_product = mysqli_real_escape_string($con,$_POST['remaning_product']);
        if($final_remaning_product <= 0){
          //stastus 1 = pending . status 0= done
            $status = 0; }

        else{
          $status = 1;
        }
        $sel = "SELECT * FROM stock WHERE stock_id=$stock_id";
                      $run = mysqli_query($con,$sel);
                        #echo $_SESSION['employee_id'];
                        while($row = mysqli_fetch_assoc($run)) {
                        $available_product = $row['available_product'];
                    }
        
        if ($remaining_product >= $qty) {

          // $new_qty =  $available_product - $qty;
          // $update_sold = "UPDATE sold SET qty='$new_qty' WHERE product_name ='$product_name'";
          //   $run_update_sold = mysqli_query($con,$update_sold);
          //   if ($run_update_sold) {
          if ($available_product >= $qty) {
            # code...
         
              $final_stock_qty = $available_product - $qty;
              $update_stock = "UPDATE stock SET available_product = '$final_stock_qty' WHERE stock_id = $stock_id ";
              $run_update_stock = mysqli_query($con,$update_stock);
              if ($run_update_stock) {
                // echo "done";
                $final_sales_qty = $remaining_product - $qty;
                $update_sales = "UPDATE sales_entri SET remaining_product = '$final_sales_qty' , status='$status' WHERE sales_id =".$_SESSION['salesid'];
                $run_insert = mysqli_query($con,$update_sales);
                if ($run_insert) {
                  echo "<script>alert('You have Successfully Made a Sales Entry')</script>";

                  // if (condition) {
                  //   # code...
                  // }
                echo "<script>window.open('sales_entry.php','_self')</script>";
                }
                
              }
               }else{
                echo "<script>alert('There is only $available_product $product_name in stock!')</script>";
          echo "<script>window.open('edit_sale.php?id=$id','_self')</script>";
               }
            // } 
        }else {
          echo "<script>alert('you only have $remaining_product remaining products from the sale!')</script>";
          echo "<script>window.open('edit_sale.php?id=$id','_self')</script>";
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
