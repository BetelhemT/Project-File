<?php
session_start();
if (!$_SESSION['admin_id'] ||  !($_SESSION['type'] =='Adminstrator')) {
  header("location: logout.php");
}
else{


$con = mysqli_connect("localhost","root","","meskel_flower_production") or die("Connection could not be Established");
if (isset($_GET['employee_id'])) {
  $edit_id = $_GET['employee_id'];
  $select = "select * from employee WHERE employee_id='$edit_id'";
  $run = mysqli_query($con, $select);

   $row=mysqli_fetch_array($run);
      $employee_id =$row['employee_id'];
      $employee_name = $row['employee_name'];
      $employee_telephone = $row['employee_telephone'];
      $employee_gender = $row['employee_gender'];
      $employee_occupation = $row['employee_occupation'];
      $employee_station = $row['employee_station'];
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Ethio Gambia | Edit Employee</title>
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
                <?php include 'admin_nav.php'; ?>
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
        <span>Add Employee</span>
        </h2>
        </div>
    <!--//banner-->
  <!--grid-->
  <div class="validation-system">

    <div class="validation-form">
  

<!-- form start -->


       <h4 align="center">Add New Employee</h4><hr>
        
        <form action="edit_employee.php?employee_id=<?php echo $employee_id; ?>" method="post">
          <div class="vali-form">
           
            
            <div class="clearfix"> </div>
            <div class="col-md-6 form-group1 group-mail">
              <label class="control-label">Employee Name</label>
              <input type="text" name="employee_name" placeholder="Name" value="<?php echo $employee_name ?>" required="">           
            </div>        
             <div class="col-md-6 form-group1 group-mail">
              <label class="control-label">Employee ID</label>
              <input type="text" name="employee_id" placeholder="ID No." value="<?php echo $employee_id ?>" required="">
            </div>
             
            <div class="col-md-6 form-group1 group-mail">
              <label class="control-label">Phone Number</label>
              <input type="text" name="employee_telephone" placeholder="Phone" value="<?php echo $employee_telephone ?>" >
            
            </div>
            <div class="col-md-6 form-group2 group-mail">
              <label class="control-label">Gender</label>
            <select name="employee_gender" required="">
              <option value="<?php echo $employee_gender ?>"><?php echo $employee_gender ?></option>
              <option value="F">F</option>
              <option value="M">M</option>
            </select>
            </div>
            <div class="col-md-6 form-group2 group-mail">
              <label class="control-label">Employee Ocupation</label>
            <select name="employee_occupation" required="">
              <option value = "<?php echo $employee_occupation ?>"><?php echo $employee_occupation ?></option>
              <option value="Supervisor">Supervisor</option>
              <option value="Machine Operator">Machine Operator</option>
              <option value="counter">Counter</option>
              <option value="other">Other</option>
            </select>
            </div>
            <div class="col-md-6 form-group2 group-mail">
              <label class="control-label">Station</label>
              <select name="employee_station" required="">
                <option value = "<?php echo $employee_station ?>"><?php echo $employee_station ?></option>
                <option value="Meskel Flower">Meskel Flower</option>
                <option value="dukem">Dukem</option>   
              </select>
            </div>
            <div class="clearfix"> </div>
            <div class="clearfix"> </div><br>
            <div class="col-md-6 col-md-offset-5 form-group">
              <button type="submit" name="update" class="btn btn-danger">Update</button>
              <button type="submit" name="cancel" class="btn btn-default">Cancel Edit</button>
            </div>           
          <div class="clearfix"> </div></div>
        </form>
        <?php
        if (isset($_POST['update'])) {
          $selemp = "SELECT * from employee WHERE employee_id='$edit_id'";
                  // $selemp = "SELECT * FROM employee WHERE employee_id='$edit_id'";
                    $run = mysqli_query($con,$selemp);
                    while($row = mysqli_fetch_assoc($run)) {
                //$employee_name =   $row["employee_name"];
              }
               
          
          $employee_id = mysqli_real_escape_string($con,$_POST['employee_id']);
          $employee_name = mysqli_real_escape_string($con,$_POST['employee_name']);
          $employee_telephone = mysqli_real_escape_string($con,$_POST['employee_telephone']);
          $employee_gender = mysqli_real_escape_string($con,$_POST['employee_gender']);
          $employee_occupation = mysqli_real_escape_string($con,$_POST['employee_occupation']);
          $employee_station= mysqli_real_escape_string($con,$_POST['employee_station']);
          if ($employee_occupation == "Supervisor" || $employee_occupation == "other") {
           $privilege = 1;
          }else{
            $privilege = 0;
          }
          
          $update = "UPDATE employee SET employee_id = '$employee_id' ,employee_name = '$employee_name',employee_telephone='$employee_telephone',employee_gender = '$employee_gender',employee_occupation='$employee_occupation',employee_station='$employee_station',privilege='$privilege' WHERE employee_id ='$edit_id'";
         // $insert = "INSERT INTO employee(employee_id,employee_name,employee_telephone,employee_gender,employee_occupation,employee_station) VALUES ('$employee_id','$employee_name','$employee_telephone','$employee_gender','$employee_occupation','$employee_station')";
          
           $run_insert = mysqli_query($con,$update);
          if ($run_insert) {
            echo "<script>alert('update successful!')</script>";
            echo "<script>window.open('view_and_edit.php','_self')</script>";
          }

        }
        if (isset($_POST['cancel'])) {
         echo "<script>window.open('view_and_edit.php','_self')</script>";
        }
        ?>



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
