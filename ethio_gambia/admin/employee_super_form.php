<?php
if(isset($_POST['employee_occupation']))
{
	// include Database connection file 
	$con = mysqli_connect("localhost","root","","meskel_flower_production") or die("Connection could not be Established");
	$employee_occupation = mysqli_real_escape_string($con, $_POST['employee_occupation']);

	//$query = "SELECT employee_id FROM employee WHERE employee_id = '$employee_id'";
	if($employee_occupation == "Supervisor")
	{
		echo ' <div class="col-md-6 form-group1 group-mail">
              <label class="control-label">Username</label>
              <input type="text" id="username" name="username" placeholder="username" required="">
            </div>
             
            <div class="col-md-6 form-group1 group-mail">
              <label class="control-label">Password</label>
              <input type="password" name="password" placeholder="password" >
            
            </div>';
	}else
	{
		// username is avaialable to use.
		echo '<div style="color: green;"> <b>'.$employee_id.'</b> is avaialable! </div>';
	}
}
?>