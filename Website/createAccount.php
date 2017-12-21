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
		header("Location: registration.php");
	}
	
	$submittedUsername = $_POST['username'];
	$submittedPassword = $_POST['password'];
	$submittedRole = $_POST['role'];
	$submittedEmail = $_POST['email'];
	$submittedCode = $_POST['code'];

	$pass = false;

	if($submittedRole == "student"){
		$pass = true;
	}

	$sql = "SELECT * FROM codes WHERE code = '$submittedCode'";
	$result = $conn->query($sql);

	if($result->num_rows > 0 or $pass == true){
		$sql = "DELETE FROM codes WHERE code = '$submittedCode'";
		$result = $conn->query($sql);

		$sql = "INSERT INTO users (username, password, role, email) VALUES (\"$submittedUsername\", \"$submittedPassword\", \"$submittedRole\", \"$submittedEmail\")";

		if ($conn->query($sql) === TRUE) {
			header("Location: index.php");
			echo "<script>window.location='index.php'</script>";
		} else {
			header("Location: registration.php");
			echo "<script>window.location='registration.php'</script>";
		}
	} else{
		header("registration.php");
		echo "<script>window.location='registration.php'</script>";
	}
?>