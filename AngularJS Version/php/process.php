<?php
$con=mysqli_connect("localhost","root","bag311e","CBI");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
// query
$sql="INSERT INTO emNumber (number, box, row, level)
VALUES
('$_POST[number]','$_POST[box]','$_POST[row]','$_POST[level]')";
if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo "1 record added";
mysqli_close($con);
?>