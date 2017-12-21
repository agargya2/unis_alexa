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

	$username =  $_POST["username"];
	$password = $_POST["password"];

	$sql = "SELECT * FROM users WHERE username = \"$username\" AND password = \"$password\"";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		setcookie("loggedIn", TRUE);
		setcookie("user", $username);
		if($row['role'] == "teacher"){
			header("Location: studentassignments.php");
		} else{
			header("Location: home.php");
		}
	} else{
		header("Location: index.php");
	}
?>