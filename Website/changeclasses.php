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

	$sql = "DELETE FROM studentclasses WHERE userid = $userid";

	if ($conn->query($sql) === TRUE) {
		
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		// header("Location: registration.php");
	}

	foreach ($_POST['class'] as $class) {
		$sql = "INSERT INTO studentclasses (userid, classid) VALUES ($userid, $class)";

		if ($conn->query($sql) === TRUE) {
			header("Location: listofclasses.php");
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			// header("Location: registration.php");
		}
	}
	header("Location: listofclasses.php");
?>