<?php
if(isset($_POST['employee_id']))
{
	// include Database connection file 
	$con = mysqli_connect("localhost","root","","meskel_flower_production") or die("Connection could not be Established");
	$employee_id = mysqli_real_escape_string($con, $_POST['employee_id']);

	$query = "SELECT employee_id FROM employee WHERE employee_id = '$employee_id'";
	if(!$result = mysqli_query($con, $query))
	{
		exit(mysqli_error($con));
	}

	if(mysqli_num_rows($result) > 0)
	{
		// username is already exist 
		echo '<div style="color: red;"> <b>'.$employee_id.'</b> is already in use.....please try another! </div>';
	}
	else
	{
		// username is avaialable to use.
		echo '<div style="color: green;"> <b>'.$employee_id.'</b> is avaialable! </div>';
	}
}
?>