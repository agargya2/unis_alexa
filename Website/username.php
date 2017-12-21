<?php
	$info = array();
	$usernameToCheck = $_GET['text'];

	$servername = "localhost";
	$username = "root";
	$password = "aniket12";
	$databasename = "homeworkDatabase";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $databasename);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		// header("Location: registration.php");
	}

	$sql = "SELECT * FROM users WHERE username = '$usernameToCheck'";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		array_push($info, false);
	} else {
		array_push($info, true);
	}

	echo json_encode($info);
?>