<?php
session_start();
if (!$_SESSION['admin_id'] ||  !($_SESSION['type'] =='Adminstrator')) {
  header("location: logout.php");
}
else{


$con = mysqli_connect("localhost","root","","meskel_flower_production") or die("Connection could not be Established");
?>
<script src="js/jquery.min.js" type="text/javascript"></script>
<SCRIPT type="text/javascript">
$(document).ready(function()
{
$("#username").change(function() 
{ 
var username = $("#username").val();
var msgbox = $("#status");

if(username.length > 0)
{
$("#status").html('Checking availability...');

$.ajax({  
    type: "POST",  
    url: "username.php",  
    data: "username="+ username,  
    success: function(msg){  
   $("#status").ajaxComplete(function(event, request){ 
    if(msg == 'OK')
    { 
    
        $("#username").removeClass("red");
        $("#username").addClass("green");
        msgbox.html('yes');
    }  
    else  
    {  
         $("#username").removeClass("green");
         $("#username").addClass("red");
        msgbox.html(msg);
    }  
   
   });
   } 
   
  }); 

}
else
{
$("#username").addClass("red");
$("#status").html('<font color="#cc0000">Please nter atleast 5 letters</font>');
}
return false;
});

});
</SCRIPT>
<input type="text" name="username" id="username" style="margin-top:35px;" />&nbsp; &nbsp;
<span id="status"></span>
<?php

if(isset($_POST['username']))
{
$username = $_POST['username'];
$sql = mysql_query("select * from admin where username='$username'");
if(mysql_num_rows($sql))
{
echo '<STRONG>'.$username.'</STRONG> is already in use.';
}
else
{
echo 'OK';
}
}}
?>
