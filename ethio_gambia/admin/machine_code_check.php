<?php
if(isset($_POST['machine_code']))
{
	// include Database connection file 
	$con = mysqli_connect("localhost","root","","meskel_flower_production") or die("Connection could not be Established");
	$machine_code = mysqli_real_escape_string($con, $_POST['machine_code']);

	$query = "SELECT machine_name FROM machine WHERE machine_code = '$machine_code'";
	if(!$result = mysqli_query($con, $query))
	{
		exit(mysqli_error($con));
	}

	if(mysqli_num_rows($result) > 0)
	{
		// username is already exist 
		echo '<div style="color: red;"> <b>'.$machine_code.'</b> is already in use! </div>';
	}
	else
	{
		// username is avaialable to use.
		echo '<div style="color: green;"> <b>'.$machine_code.'</b> is avaialable! </div>';
	}
}


?>