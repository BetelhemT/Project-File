<?php
session_start();
if (!$_SESSION['admin_id'] ||  !($_SESSION['type'] =='Adminstrator')) {
  header("location: logout.php");
}
else{
$con = mysqli_connect("localhost","root","","meskel_flower_production") or die("Connection could not be Established");
if (isset($_POST['action']) && $_POST['action']=='availableity') {
	$username = mysqli_real_escape_string($con,$_POST['username']);
	$query = "SELECT * FROM admin WHERE username='$username'";
	$res =  mysqli_query($con, $query);
	$count = mysqli_num_rows($res);
	echo $count;
}
}