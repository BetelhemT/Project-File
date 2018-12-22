<?php
session_start();
if (!$_SESSION['admin_id']) {
  header("location: logout.php");
}
else{


$con = mysqli_connect("localhost","root","","meskel_flower_production") or die("Connection could not be Established");
if (isset($_GET['employee_id'])) {
  $_SESSION['em']= $_GET['employee_id'];
  $edit_id = $_GET['employee_id'];
  $select = "select * from employee WHERE employee_id=".$_SESSION['em'];
  $run = mysqli_query($con, $select);

   $row=mysqli_fetch_array($run);
      $employee_id =$row['employee_id'];
      $employee_name = $row['employee_name'];
      $employee_telephone = $row['employee_telephone'];
      $employee_gender = $row['employee_gender'];
      $employee_occupation = $row['employee_occupation'];
      $employee_station = $row['employee_station'];
      $privilege = $row['privilege'];
}
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
<script src="script.js"></script>

<!-- Mainly scripts -->
<script src="js/jquery.metisMenu.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<link href="css/custom.css" rel="stylesheet">
<script src="js/custom.js"></script>
<script type="text/javascript">
                    $(document).ready(function(){
                      $('#username').keyup(function(){
                        var username = $(this).val();
                        var result = $('#result');
                        if (username.length > 2) {
                          Result.html('Loading...');
                        var dataPass = 'action=availableity&username'+username;
                        $.ajax({
                          type : 'POST',
                          data : dataPass,
                          url : 'available.php',
                          success: function(responseText){
                            if (responseText == 0) {
                              Result.html('<span class="success">Available</span>');
                            }
                            else if(responseText > 0){
                              Result.html('<span class="error">Taken</span>');
                            }else{
                              alert('error');
                            }
                          }
                        });
                      }else{
                        Result.html('enter');
                      }
                        if (username.length == 0) {
                          Result.html('');
                        }
                      });
                      
                    });
                  </script>
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
       <div class="banner">
          <h2>
        <a href="#">Admin</a>
        <i class="fa fa-angle-right"></i>
        <span>Change Password</span>
        </h2>
        </div>
    <!--//banner-->
  <!--grid-->
  <div class="validation-system">

    <div class="validation-form">
  

<!-- form start -->


      <h4 align="center">Change Password</h4><hr>
        <form action="edit_profile.php" method="post">
          
         <!--  <div class="clearfix"> </div>
             <div class="row"> 
              <div class="vali-form">
                 <div class="col-md-6">
                  <center>
                  <p><?php echo $row['username'];?></p></center> 
                 </div>
                 <div class="col-md-6">
                  <center>
                   <p><?php echo $row['type'];?></p></center>
                 </div>
                 </div>
                 
                  </div>
                  <hr>   -->       
            
            <!-- <div style="margin:2em; " class="content-top-1 top-content col-md-10  form-group1 group-mail"> -->
              
             <div class="col-sm-8 col-md-offset-2">
                <div class="form-group">
                    <p>Old Password</p>
                    <input class="form-control" required=""  id="old_password" name="old_password"  placeholder="Old Password" type="text">
                    <div id="status"></div>
                  </div>
                  <div class="form-group">
                    <p>New Password</p>
                    <input class="form-control" required="" onkeyup='check();' id="password" name="password" placeholder="New Password" type="Password">
                  </div>
                  <div class="form-group">
                    <p>Confirm Password</p>
                    <input class="form-control" required="" onkeyup='check();'  id="confirm_password" name="confirmpassword" placeholder="Confirm Password" type="Password">
                    <span id="message" class="message "></span>
                  </div>
                  
                  
                 <script type="text/javascript">
                  var check = function() {
                  if (document.getElementById('password').value == document.getElementById('confirm_password').value) {
                      document.getElementById('message').style.color = 'green';
                      document.getElementById('message').innerHTML = 'Passwords are a Match';
                  } else {
                      document.getElementById('message').style.color = 'red';
                      document.getElementById('message').innerHTML = 'Passwords Do Not Match';
                  }
                }
                 </script>

              </div>
            <!-- </div> -->

              
            <div class="clearfix"> </div>
            <div class="clearfix"> </div><br>
            <div class="col-md-6 col-md-offset-5 form-group">
              <button type="submit" name="finish" class="btn btn-danger">Finish</button>
              <button type="reset" name="cancel" class="btn btn-default">Cancel Edit</button>
            </div>           
          <div class="clearfix"> </div>
        </form>
        <?php
        
        if (isset($_POST['finish'])) {
          $old_password = mysqli_real_escape_string($con,$_POST['old_password']);
          $new_password = mysqli_real_escape_string($con,$_POST['password']);
          //$password = mysqli_real_escape_string($con,$_POST['password']);
          
          $selemp = "SELECT * from admin WHERE admin_id=".$_SESSION['admin_id'];
          $run_selemp=mysqli_query($con,$selemp);
          while($row = mysqli_fetch_assoc($run_selemp)) {
                        $password = $row['password'];
                    }
          
          if ($old_password == $password) {
            $update = "UPDATE admin SET password='$new_password' WHERE admin_id=".$_SESSION['admin_id'];
            $run_update = mysqli_query($con,$update);
            if ($run_update) {
             echo "<script>alert('You have succesfully changed your password ')</script>";
             if (($_SESSION['type'] =='Adminstrator')) {
                  echo "<script>window.open('dashboard.php','_self')</script>";
                
                }else{
                  echo "<script>window.open('super_dashboard.php','_self')</script>";
                  
                }
            }
          }else{
            echo'<br><div class="alert alert-danger" role="danger"><strong>Sorry!</strong> Incorrect Old Password Please try again</div>';
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
