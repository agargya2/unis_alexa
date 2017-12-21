<!DOCTYPE html>
<html>
<head>
	<title>Classes</title>
</head>
<body>
	<h1>Classes</h1>
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

		$classNameReceived = $_POST['className'];

		$sql = "INSERT INTO teacherclasses (userid, class) VALUES ($userid, \"$classNameReceived\")";
		
		if($conn->query($sql) == TRUE){
			header("Location: teachereditclasses.php");
		}
	?>
</body>
</html>