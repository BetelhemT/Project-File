<?php
session_start();
if (!$_SESSION['admin_id']) {
  header("location: logout.php");
}
else{


$con = mysqli_connect("localhost","root","","meskel_flower_production") or die("Connection could not be Established");


?>
 
<!DOCTYPE html>
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
        Reset Login
        </h3>
        <hr>
          
        <form action="rest_login.php" method="POST">
          
            <div class="col-md-6 form-group1 group-mail">
              <label class="control-label">Username</label>
              <input type="text" name="username" placeholder="Username" required=""> 
              <div id="status"></div>          
            </div> 
            <div class="col-md-6 form-group1 group-mail">
              <label class="control-label">Passsword</label>
              <input type="password" name="password" placeholder="Password" required="">
              <div id="status"></div>          
            </div>
                          
                  <div class="clearfix"> </div>
            <div class="clearfix"> </div><br>
            <div class="col-md-6 col-md-offset-5 form-group">
              <button type="submit" name="login" class="btn btn-danger">login</button>
              
            </div>           
          <div class="clearfix"> </div></div>
            </form>



            <?php
       if (isset($_POST['login'])) {
                 $username = mysqli_real_escape_string($con,$_POST['username']) ;
                 $password = mysqli_real_escape_string($con,$_POST['password']) ;

                 $sel = "SELECT * FROM admin WHERE username='$username' AND password = '$password'";
                 $run = mysqli_query($con,$sel);
                 $check = mysqli_num_rows($run);
                 $row = mysqli_fetch_assoc($run);
                $admin_id= $row["admin_id"];
                $type= $row["type"];

                 if ($check==0) {
                  ?><br><div><?php echo "<div class=\"alert alert-danger\" role=\"alert\">
        <strong>Error! </strong>Incorrect Username or Password. Please Input Correct Credentials</div>"; ?></div><?php
                   exit();
                 } else{
                  if ($row["type"]=="Adminstrator") {
                    $_SESSION['admin_id']= $admin_id;
                    $_SESSION['type']= $type;
                      echo "<script> window.open('reset.php','_self')</script>";
                  }
                 //  elseif($row["type"]=="Supervisor"){
                 //  $_SESSION['admin_id']= $admin_id;
                 //  $_SESSION['type']= $type;
                 //    echo "<script> window.open('super_dashboard.php','_self')</script>";
                 // }
                 
               }
               }
      ?>

 
<div class="validation-system">

   
            </form> 
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
<?php } ?>
