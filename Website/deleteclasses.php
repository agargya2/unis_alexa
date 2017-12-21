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
		// header("Location: registration.php");
	}

	$currentUser = $_COOKIE['user'];

	$sql = "SELECT id FROM users WHERE username = \"".$currentUser."\"";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$userid = $row['id'];
		}
	}

	foreach ($_POST['class'] as $class) {
		$sql = "DELETE FROM teacherclasses WHERE id = $class";

		if ($conn->query($sql) === TRUE) {
			header("Location: teachereditclasses.php");
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			header("Location: teachereditclasses.php");
		}
	}

	header("Location: teachereditclasses.php");
?>