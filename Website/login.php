<?php
	$info = array();
	$usernameToCheck = $_GET['username'];
	$passwordToCheck = $_GET['password'];

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

	$sql = "SELECT * FROM users WHERE username = '$usernameToCheck' AND password = '$passwordToCheck'";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		array_push($info, true);
	} else {
		array_push($info, false);
	}

	echo json_encode($info);
?>