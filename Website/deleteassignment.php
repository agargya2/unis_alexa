<?php
	$servername = "localhost";
	$username = "root";
	$password = "aniket12";
	$databasename = "homeworkDatabase";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $databasename);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		header("Location: index.php");
	}

	$sql = "DELETE FROM classassignments WHERE id = " . $_GET['assignmentidtodelete'];
	echo $sql;

	if ($conn->query($sql) == TRUE) {
		header("Location: home.php");
	}
?>