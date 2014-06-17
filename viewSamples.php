<?php 
	$con=mysqli_connect("localhost","root","","cbiTest");
	//Check Connection
	if (mysqli_connect_errno($con)) {
		echo mysqli_connect_error() . "Connection Failed! It... came... from... behind!";
	}
	$query = "SELECT * FROM EMSampleBoxSorter";
	$result = mysqli_query($con, $query) or die("no query");
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Views</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="main.css" />
	<style>
		.col-sm-2,
		.col-sm-3 {
			text-align: center;
		}
		.col-sm-2 h4 {
			font-size: 1.7em;
			font-family: "Raleway-Light", sans-serif;
		}
		.row.sampleRow {
			margin-bottom: 1%;
		}
		.row.sampleRow .col-sm-2 {
			background-color: rgba(166, 166, 166, .75);
			padding-top: 1%;
			padding-bottom: 1%;
			font-size: 1.3em;
			font-family: "Raleway-ExtraLight", sans-serif;
		}
		.push-right {
			margin-left: 5%;
		}
		
	</style>
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.html">CBI <span class="sm-caps">sample box sorter</span></a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="active">
						<a href="#" class="initial">View</a>
					</li>
					<li class="active">
						<a href="addSamples.html">Add</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="container push-down">
		<div class="row">
			<div class="col-sm-2 col-sm-offset-1">
				<h4>EM Number</h4>
			</div>
			<div class="col-sm-2 push-right">
				<h4>Box Number</h4>
			</div>
			<div class="col-sm-2 push-right">
				<h4>Row</h4>
			</div>
			<div class="col-sm-2 push-right">
				<h4>Level</h4>
			</div>
		</div>
		<?php
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<div class='row sampleRow'><div class='col-sm-2 col-sm-offset-1'>" . $row['Number'] . "</div> <div class='col-sm-2 push-right'>" . $row['Box'] . "</div> <div class='col-sm-2 push-right'>" . $row['Row'] . "</div> <div class='col-sm-2 push-right'>" . $row['Level'] . "</div></div>";
			}
		
			mysqli_close($con);
		?>

	</div>
<!-- jQuery -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- bootstrap -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
</html>