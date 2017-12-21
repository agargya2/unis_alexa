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

		$getUserid = $_GET['userid'];
		$getAlexaid = "\"" . $_GET['alexaid'] . "\"";
		// echo $getUserid;
		// echo $getAlexaid;

		$sql = "SELECT * FROM users WHERE id = " . $getUserid;
		$result = $conn->query($sql);

		$info = array();

		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				if($row['role'] == 'student'){
					$sql = "DELETE FROM alexausers WHERE alexaid = $getAlexaid";
					$result = $conn->query($sql);

					$sql = "INSERT INTO alexausers (userid, alexaid) VALUES ($getUserid, $getAlexaid)";

					array_push($info, "ok");
					echo json_encode($info);

					$result = $conn->query($sql);
				}
				else{
					array_push($info, "teacher");
				}
			}
		}
		else{
			array_push($info, "notExist");
		}

		echo json_encode($info);
	?>