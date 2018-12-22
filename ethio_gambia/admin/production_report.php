<?php
session_start();
if (!$_SESSION['admin_id']) {
  header("location: logout.php");
}
else{


$con = mysqli_connect("localhost","root","","meskel_flower_production") or die("Connection could not be Established");
function fetch_data(){
            $outputs='';
            $i = 0;
        if (isset($_POST['find'])) {
           $con = mysqli_connect("localhost","root","","meskel_flower_production") or die("Connection could not be Established");
          $fdate=$_POST['from_date'];
          $tdate=$_POST['to_date'];
          $type=mysqli_real_escape_string($con,$_POST['type']);
          if ($type='blow') {
             $con = mysqli_connect("localhost","root","","meskel_flower_production") or die("Connection could not be Established");
          $sel = "SELECT * from production_entry  WHERE type='blow' AND activity_date between '".$fdate."' and '".$tdate."' order by activity_date DESC"; 
          $run = mysqli_query($con, $sel) or die("Error: ".mysqli_error($con));
          while ($row=mysqli_fetch_array($run)) {
             $outputs .='<tr>
              <td>'.$row['employee_name'].'</td>
              <td>'.$row['shift'].'</td>
              <td>'.$row['activity_date'].'</td>
              <td>'.$row['machine_id'].'</td>
              <td>'.$row['preform_id'].'</td>
              <td>'.$row['product_code'].'</td>
              <td>'. $row['product_qty'].'</td>
              <td>'.$row['damaged_qty'].'</td>
              </tr>'
              ;
            
             
        }
          }
         else{
           //$con = mysqli_connect("localhost","root","","meskel_flower_production") or die("Connection could not be Established");
          $sel = "SELECT * from production_entry  WHERE type='cap' AND activity_date between '".$fdate."' and '".$tdate."' order by activity_date DESC"; 
          $run = mysqli_query($con, $sel) or die("Error: ".mysqli_error($con));
          while ($row=mysqli_fetch_array($run)) {
             $outputs .='<tr>
              <td>'.$row['employee_name'].'</td>
              <td>'.$row['shift'].'</td>
              <td>'.$row['activity_date'].'</td>
              <td>'.$row['machine_id'].'</td>
              <td>'.$row['preform_id'].'</td>
              <td>'.$row['product_code'].'</td>
              <td>'. $row['product_qty'].'</td>
              <td>'.$row['damaged_qty'].'</td>
              </tr>'
              ;
            
             
        }
         }
          
       
        }
        return $outputs;

      }
  ?>
 
<!DOCTYPE html>
<html>
<head>
<title>Ethio Gambia | Monthly Report</title>
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
    <script>
  function printContent(el){
      var restorepage = document.body.innerHTML;
      var printcontent = document.getElementById(el).innerHTML;
      document.body.innerHTML = printcontent;
      window.print();
      document.body.innerHTML = restorepage;
  }
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
  <!--  -->
            <div class="banner" style="padding-bottom: 1em;">
          <h3>
        Monthly Report of Production
        </h3>
        <hr>
          
        <form action="production_report.php" method="POST">
          <div class="col-md-6 form-group2 group-mail">
              <label class="control-label">category</label>
            <select name="type" required="">
              <option value="">---Select category---</option>
              <option value="blow">Blow</option>
              <option value="cap">Cap</option>
            </select>
            </div>
          
            <div class="col-md-6 form-group1 group-mail">
              <label class="control-label">From</label>
              <input type="Date" name="from_date" id="from_date" date-date-inline-picker="true" placeholder="From Date" required="">  
              <div id="status"></div>          
            </div> 
            <div class="col-md-6 form-group1 group-mail">
              <label class="control-label">To</label>
              <input type="Date" name="to_date" id="to_date" date-date-inline-picker="true" placeholder="To Date" required="">  
              <div id="status"></div>          
            </div>
                          
                  <div class="clearfix"> </div>
            <div class="clearfix"> </div><br>
            <div class="col-md-6 col-md-offset-5 form-group">
              <button type="submit" name="find" class="btn btn-danger">Find</button>
              
            </div>           
          <div class="clearfix"> </div></div>
            </form> 
 
<div class="validation-system" id="tbl">

    <div  class="validation-form">
  <table class="table table-striped">
              
           
               <table border="1" cellspacing="0" cellpadding="3" class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Shift</th>
                <th scope="col">Date</th>
                <th scope="col">Machine Id</th>
                <th scope="col">Preform Id</th>
                <th scope="col">Product Code</th>
                <th scope="col">Produced</th>
                <th scope="col">Damaged</th>
                

              </tr>
            </thead> 
            
            <?php 
               echo fetch_data();
             ?> 
            </table>
            </table>
               <div class="clearfix"> </div>
            <div class="clearfix"> </div><br>
            <div class="col-md-6 col-md-offset-5 form-group">
              <button  onclick="printContent('tbl');"  class="btn btn-danger">Print</button>
              
            </div>           
          <div class="clearfix"> </div></div>
           
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
</body>
</html>
<?php
}
?>
