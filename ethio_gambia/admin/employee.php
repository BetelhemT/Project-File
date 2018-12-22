

<?php
    $con= new mysqli("localhost","root","","meskel_flower_production");
    $name = $_POST['search'];
    //$query = "SELECT * FROM employees
   // WHERE first_name LIKE '%{$name}%' OR last_name LIKE '%{$name}%'";

    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

$result = mysqli_query($con, "SELECT * FROM employee
    WHERE employee_id LIKE '%{$name}%' OR  employee_name LIKE '%{$name}%'");

while ($row = mysqli_fetch_array($result))
{
        echo $row['employee_id'] . " " . $row['employee_name'];
        echo "<br>";
}
    mysqli_close($con);
    ?>
<html>
<head>
	<title></title>
</head>
<body>
  <form action="employee.php" method="post">
  <input type="text" name="search">
  <input type="submit" value="ok"/></form>

</body>
</html>