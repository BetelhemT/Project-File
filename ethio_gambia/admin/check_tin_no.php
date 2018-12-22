<?php
if(isset($_POST['tin_no']))
{
	// include Database connection file 
	$con = mysqli_connect("localhost","root","","meskel_flower_production") or die("Connection could not be Established");
	$tin_no = mysqli_real_escape_string($con, $_POST['tin_no']);

	$query = "SELECT tin_no FROM customers_list WHERE tin_no='$tin_no'";
	if(!$result = mysqli_query($con, $query))
	{
		exit(mysqli_error($con));
	}

	if(mysqli_num_rows($result) > 0)
	{
		// username is already exist 
		echo '<div style="color: red;"> Error.... <b>'.$tin_no.'</b> already exists! </div>';
	}
	else
	{
		// username is avaialable to use.
		echo '<div style="color: green;"> <b>'.$tin_no.'</b> is avaialable! </div>';
	}
}
?>