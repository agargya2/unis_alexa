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

	$currentUser = $_COOKIE['user'];

	$sql = "SELECT id FROM users WHERE username = \"".$currentUser."\"";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$userid = $row['id'];
		}
	}

	$sql = "SELECT * FROM studentclasses WHERE userid = \"".$_GET['idRequested']."\"";
	$result = $conn->query($sql);

	$classesTaken = array();

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$class = $row['classid'];
			array_push($classesTaken, $class);
		}
	}

	$sql = "SELECT teacherclasses.userid, teacherclasses.id, teacherclasses.class, classassignments.classid, classassignments.assignment, classassignments.description FROM teacherclasses JOIN classassignments ON teacherclasses.id = classassignments.classid";
	$result = $conn->query($sql);

	$assignments = array();

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			if(in_array($row['classid'], $classesTaken)){
				array_push($assignments, $row['assignment']);
			}
		}
	}

	echo json_encode($assignments);
?>