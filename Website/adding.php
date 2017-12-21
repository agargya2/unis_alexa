<?php
	if(isset($_COOKIE["loggedIn"])){
		if($_COOKIE["loggedIn"] == TRUE){

		}
		else{
			header("Location: index.php");
		}
	}
	else{
		header("Location: index.php");
	}

	$servername = "localhost";
	$username = "root";
	$password = "aniket12";
	$databasename = "homeworkDatabase";

	$conn = new mysqli($servername, $username, $password, $databasename);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		header("Location: index.php");
	}

	$classid = $_POST["class"];
	$assignname = $_POST["assignmentName"];
	$assigndescription = $_POST["assignmentDescription"];

	$sql = "INSERT INTO classassignments (classid, assignment, description) VALUES ($classid, \"$assignname\", \"$assigndescription\")";

	if ($conn->query($sql) === TRUE) {
		header("Location: home.php");
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		header("Location: home.php");
	}
?>