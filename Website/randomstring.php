<?php

	function generateRandomString($length = 10) {
	    return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
	}

	$servername = "localhost";
	$username = "root";
	$password = "aniket12";
	$databasename = "homeworkDatabase";

	$conn = new mysqli($servername, $username, $password, $databasename);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		header("Location: index.php");
	}

	$string = generateRandomString(6);

	$sql = "INSERT INTO codes VALUES (\"$string\")";

	if ($conn->query($sql) === TRUE) {
		echo $string;
	} else {
		echo false;
	}
?>