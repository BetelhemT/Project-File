<?php
session_start();
if (!$_SESSION['admin_id'] ||  !($_SESSION['type'] =='Adminstrator')) {
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
        
        <form action="add_employee.php" method="post">
          <div class="vali-form">
           
            
            <div class="clearfix"> </div>
            <div class="col-md-6 form-group1 group-mail">
              <label class="control-label">Employee Name</label>
              <input type="text" name="employee_name" placeholder="Name" required="">           
            </div>        
             <div class="col-md-6 form-group1 group-mail">
              <label class="control-label">Employee ID</label>
              <input type="text" id="employee_id" name="employee_id" placeholder="ID No." required="">
              <div id="status"></div>
            </div>
             <div class="col-md-6 form-group1 group-mail">
              <label class="control-label">Tin No</label>
              <input type="text" id="tin_no" name="tin_no" placeholder="Tin No" required="">
              <div id="status"></div>


            </div>
             
            <div class="col-md-6 form-group1 group-mail">
              <label class="control-label">Phone Number</label>
              <input type="text" name="employee_telephone" placeholder="Phone" >
            
            </div>
            <div class="col-md-6 form-group2 group-mail">
              <label class="control-label">Gender</label>
            <select name="employee_gender" required="">
              <option value="">---Select Gender ---</option>
              <option value="F">F</option>
              <option value="M">M</option>
            </select>
            </div>
            <div class="col-md-6 form-group2 group-mail">
              <label class="control-label">Employee Ocupation</label>
            <select id="employee_occupation" name="employee_occupation" required="">
              <option value = "">---Select Ocupation---</option>
              <option value="Supervisor">Supervisor</option>
              <option value="Machine Operator">Machine Operator</option>
              <option value="counter">Counter</option>
              <option value="other">Other</option>
            </select>
            </div>
            <div class="col-md-6 form-group2 group-mail">
              <label class="control-label">Station</label>
              <select name="employee_station" required="">
                <option value = "">---Select Station---</option>
                <option value="Meskel Flower">Meskel Flower</option>
                <option value="dukem">Dukem</option>   
              </select>
            </div>
             <div class="col-md-6 form-group2 group-mail" id="supform"></div>
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
          
          $employee_id = mysqli_real_escape_string($con,$_POST['employee_id']);
          $employee_name = mysqli_real_escape_string($con,$_POST['employee_name']);
          $tin_no = mysqli_real_escape_string($con,$_POST['tin_no']);
          $employee_telephone = mysqli_real_escape_string($con,$_POST['employee_telephone']);
          $employee_gender = mysqli_real_escape_string($con,$_POST['employee_gender']);
          $employee_occupation = mysqli_real_escape_string($con,$_POST['employee_occupation']);
          $employee_station= mysqli_real_escape_string($con,$_POST['employee_station']);

          // privilege 
          if ($employee_occupation == "Supervisor"  || $employee_occupation == "other") {
            $privilege = 1;
           $insert = "INSERT INTO employee(employee_id,employee_name,tin_no,employee_telephone,employee_gender,employee_occupation,employee_station, privilege) VALUES ('$employee_id','$employee_name',$tin_no,'$employee_telephone','$employee_gender','$employee_occupation','$employee_station','$privilege')";
            $run_insert = mysqli_query($con,$insert);
          if ($run_insert) {
            $em = mysqli_insert_id($con);
            $ins = "INSERT INTO admin(e_id, username, password, type) VALUES ('$em', '$employee_id','12345','1');";
          $run_ins = mysqli_query($con,$ins);
           echo "<script>alert('You have added .$employee_name. with the username: $employee_id and default Password of: 12345 (You can change it in the edit profile section once logged in) ')</script>";
           echo "<script>window.open('view_and_edit.php','_self')</script>";
          }
          }else{
          $privilege = 0;
         $insert = "INSERT INTO employee(employee_id,employee_name,employee_telephone,employee_gender,employee_occupation,employee_station, privilege) VALUES ('$employee_id','$employee_name','$employee_telephone','$employee_gender','$employee_occupation','$employee_station','$privilege')";
          $run_insert = mysqli_query($con,$insert);
          if ($run_insert) {
           echo "<script>window.open('view_and_edit.php','_self')</script>";
          }
          }


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
