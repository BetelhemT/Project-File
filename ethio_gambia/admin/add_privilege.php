<?php
session_start();
if (!$_SESSION['admin_id'] ||  !($_SESSION['type'] =='Adminstrator')) {
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


       <h4 align="center">Add Privilege</h4><hr>
        <form action="add_privilege.php?employee_id=<?php echo $_SESSION['em']; ?>" method="post">
          <div class="vali-form">
          <div class="clearfix"> </div>
            <div class="col-md-6 form-group1 group-mail">
              <label class="control-label">Employee Name</label>
              <input type="text" disabled="" name="employee_name" placeholder="Name" value="<?php echo $employee_name ?>" required="">
            </div>
             <div class="col-md-6 form-group1 group-mail">
              <label class="control-label">Employee ID</label>
              <input type="text" disabled="" name="employee_id" placeholder="ID No." value="<?php echo $employee_id ?>" required="">
            </div>


            <div style="margin:2em; " class="content-top-1 top-content col-md-10  form-group1 group-mail">
              <h4 align="center">Select Priviledge Type</h4><hr><span style="font-size: 0.4em;">
             <div class="radio block"><label><input name="privilege" required="" id="r" value="2" type="radio"> Admin (All privileges will be available)</label> </div>
             <div class="radio block"><label><input name="privilege" required="" id="rr" value="1" type="radio"> Supervisor</label></div>
             <div class="radio block"><label><input name="privilege" required="" id="rrr" value="1" type="radio"> Other</label></div>
             <div class="checkbox-inline"><label><input name="add[]" class="n" id="n" value="1" type="checkbox"> Add Employee</label></div>
             <div class="checkbox-inline"><label><input name="view_edit[]" class="n" id="n" value="1" type="checkbox"> View & Edit Employee</label></div>
             <div class="checkbox-inline"><label><input name="manage_stock[]" class="n" id="n" value="1" type="checkbox"> Manage Stock</label></div>
             <div class="checkbox-inline"><label><input name="view_supervisor_edit[]" class="n" id="n" value="1" type="checkbox"> View Supervisor Edits</label></div> </span>
            </div>
            
           <script type="text/javascript">
              document.getElementById('r').onclick = function(){
                var check = document.getElementById('r').checked;
                var boxes = this.form.elements['n'];
                for (var i = 0, len=boxes.length; i<len; i++) {
                  var r = boxes[i];
                    if (check) {
                      r.disabled = true;
                      r.checked = true;
                    }
                }
              }
              document.getElementById('rr').onclick = function(){
                var check = document.getElementById('rr').checked;
                var boxes = this.form.elements['n'];
                for (var i = 0, len=boxes.length; i<len; i++) {
                  var r = boxes[i];
                    if (check) {
                      r.disabled = false;
                      r.checked = false;
                    }
                }
              }
               document.getElementById('rrr').onclick = function(){
                var check = document.getElementById('rrr').checked;
                var boxes = this.form.elements['n'];
                for (var i = 0, len=boxes.length; i<len; i++) {
                  var r = boxes[i];
                    if (check) {
                      r.disabled = false;
                      r.checked = false;
                    }
                }
              }
            </script> 
            <div style="margin:2em; " class="content-top-1 top-content col-md-10  form-group1 group-mail">
              <h4 align="center">Create Username and Password</h4><hr>
             <div class="col-sm-8 col-md-offset-2">
                <div class="form-group">
                    <p>Username</p>
                    <input class="form-control" required=""  id="username" name="username"  placeholder="Username" type="text">
                    <div id="status"></div>
                  </div>
                  <div class="form-group">
                    <p>New Password</p>
                    <input class="form-control" required="" onkeyup='check();' id="password" name="password" placeholder="Password" type="Password">
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
            </div>


            <div class="clearfix"> </div>
            <div class="clearfix"> </div><br>
            <div class="col-md-6 col-md-offset-5 form-group">
              <button type="submit" name="finish" class="btn btn-danger">Finish</button>
              <button type="reset" name="cancel" class="btn btn-default">Cancel Edit</button>
            </div>
          <div class="clearfix"> </div></div>
        </form>
        <?php

        if (isset($_POST['finish'])) {
          $username = mysqli_real_escape_string($con,$_POST['username']);
          $password = mysqli_real_escape_string($con,$_POST['password']);
          $confirm_password = mysqli_real_escape_string($con,$_POST['confirm_password']);
          $pvalue = mysqli_real_escape_string($con,$_POST['privilege']);
          $check = "SELECT * from admin WHERE username ='$username'";
          $run_check = mysqli_query($con,$check);
          $res=mysqli_num_rows($run_check);
          if ($res > 0 || $confirm_password != $password) {
            $selemp = "SELECT * from employee WHERE employee_id=".$_SESSION['em'];
          $em=$_SESSION['em'];
          $privilege = mysqli_real_escape_string($con,$_POST['privilege']);
          $update = "UPDATE employee SET privilege='$privilege' WHERE employee_id =".$_SESSION['em'];
          $run_update = mysqli_query($con,$update);
          if ($run_update) {
            $ins = "INSERT INTO admin(e_id, username, password, type) VALUES ('$em', '$username','$password','$pvalue');";
          $run_ins = mysqli_query($con,$ins);
          if ($run_ins) {
            $checkBox1 = $_POST['add'];
   
    for ($i=0; $i<sizeof($checkBox1); $i++)
        {
                $query="INSERT INTO add_employee (emp_id,add_employee) VALUES ('".$_SESSION['em']."','" . $checkBox1[$i] . "')";     
            
                mysqli_query($con,$query) or die (mysql_error() );
        
         
        }
        $checkBox2 = $_POST['view_edit'];
   
    for ($i=0; $i<sizeof($checkBox1); $i++)
        {
                $query1="INSERT INTO view_edit_employee (emp_id,view_edit_employee) VALUES ('".$_SESSION['em']."','" . $checkBox2[$i] . "')";     
            
                mysqli_query($con,$query1) or die (mysql_error() );
        
         
        }
        $checkBox3 = $_POST['manage_stock'];
   
    for ($i=0; $i<sizeof($checkBox1); $i++)
        {
                $query2="INSERT INTO manage_stock (emp_id,manage_stock) VALUES ('".$_SESSION['em']."','" . $checkBox3[$i] . "')";     
            
                mysqli_query($con,$query2) or die (mysql_error() );
        
         
        }
        $checkBox4 = $_POST['view_supervisor_edit'];
   
    for ($i=0; $i<sizeof($checkBox1); $i++)
        {
                $query3="INSERT INTO view_supervisor_edit (emp_id,view_supervisor_edit) VALUES ('".$_SESSION['em']."','" . $checkBox4[$i] . "')";     
            
                mysqli_query($con,$query3) or die (mysql_error() );
        
         
        }

           if ($run_priv) {
             echo "<script>window.open('view_and_edit.php','_self')</script>";

           }
          }
          }
            
          }else{
          echo "<script>alert('username already exist or password does not match!')</script>";
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
