<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
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

		$sql = "SELECT teacherclasses.userid, teacherclasses.id, teacherclasses.class, classassignments.classid, classassignments.assignment, classassignments.description FROM teacherclasses JOIN classassignments ON teacherclasses.id = classassignments.classid WHERE userid = \"".$userid."\"";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$classname = $row['class'];

				echo "<h3>Class: " . $classname . " Assignment: " . $row['assignment'] . "</h3> <button onclick='popUpFormEditAssignment()'>Edit Assignment</button>";
				
			}
		}
	?>
</body>
</html>	