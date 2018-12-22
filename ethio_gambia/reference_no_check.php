<?php
if(isset($_POST['refrence_no']))
{
	// include Database connection file 
	$con = mysqli_connect("localhost","root","","meskel_flower_production") or die("Connection could not be Established");
	$refrence_no = mysqli_real_escape_string($con, $_POST['refrence_no']);

	$query = "SELECT refrence_no FROM production_entry WHERE refrence_no = '$refrence_no'";
	if(!$result = mysqli_query($con, $query))
	{
		exit(mysqli_error($con));
	}

	if(mysqli_num_rows($result) > 0)
	{
		// username is already exist 
		echo '<div style="color: red;"> Error.... <b>'.$refrence_no.'</b> already exists! </div>';
	}
	else
	{
		// username is avaialable to use.
		echo '<div style="color: green;"> <b>'.$refrence_no.'</b> is avaialable! </div>';
	}
}
?>