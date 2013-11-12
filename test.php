<?php
$con=mysqli_connect("localhost","root", "bag311e", "CBI");
// Check Connection
if (mysqli_connect_errno($con)) {
	echo mysqli_connect_error() . "Connection Failed! You've made a huge mistake..."; 
	}
$sql = mysqli_query($con, "SELECT * FROM emNumber");
	while($row=mysqli_fetch_assoc($sql)){
		$output[]=$row;
		$arr[] = $row;
	}
	echo json_encode($arr);
	mysqli_close($con);
?>