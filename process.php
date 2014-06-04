<?php
header( "Refresh:3; url=http://localhost/EmBoxSorter/addSamples.html", true, 303);
	$con=mysqli_connect("localhost","root","passw0rd","cbiBoxSorter");
	//Check Connection
	if (mysqli_connect_errno($con)) {
		echo mysqli_connect_error() . "Connection Failed! It... came... from... behind!";
	}
	
	$number = mysqli_real_escape_string($con, $_POST['Number']);
	$box = mysqli_real_escape_string($con, $_POST['Box']);
	$roh = mysqli_real_escape_string($con, $_POST['Row']);
	$level = mysqli_real_escape_string($con, $_POST['Level']);
		$dupes = "SELECT * FROM Boxes WHERE Number='$number'";
			$result = mysqli_query($con, $dupes);
			if (mysqli_num_rows($result) > 0) {
				die("Error: There's your\n" . $number . "\nand there's my\n" . $number . "\nand never the twain shall meet." . mysqli_error($con));
				
				return false;
			}
				else {
					$addSample = "INSERT INTO Boxes (Number, Box, Row, Level) VALUES ('$number','$box','$roh','$level')";
					if (!mysqli_query($con, $addSample)) {
						die('Error: ' . mysqli_error($con));
					}
					echo "Record Added, sir";
					
				}
				

	

	mysqli_close($con);
?>