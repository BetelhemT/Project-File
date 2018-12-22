<?php
if(isset($_POST['refernce_no']))
{
	// include Database connection file 
	$con = mysqli_connect("localhost","root","","meskel_flower_production") or die("Connection could not be Established");
	$refernce_no = mysqli_real_escape_string($con, $_POST['refernce_no']);

	$query = "SELECT reference_no FROM injection WHERE reference_no = '$refernce_no'";
	if(!$result = mysqli_query($con, $query))
	{
		exit(mysqli_error($con));
	}

	if(mysqli_num_rows($result) > 0)
	{
		// username is already exist 
		echo '<div style="color: red;"> Error.... <b>'.$refernce_no.'</b> already exists! </div>';
	}
	else
	{
		// username is avaialable to use.
		echo '<div style="color: green;"> <b>'.$refernce_no.'</b> is avaialable! </div>';
	}
}
?>