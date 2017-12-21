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

		$getAlexaid = "\"" . $_GET['alexaid'] . "\"";
		// echo $getAlexaid;

		$sql = "SELECT * FROM alexausers WHERE alexaid = " . $getAlexaid;
		// $sql = 'SELECT * FROM alexausers WHERE alexaid = "amzn1.ask.account.AHDXZZMNQBYQIWW4IOVYVLJU6IV66TRONNQ2MKCMNB7I5WKKCGI6GKJVH6L5ELRRA6BJB34HFUZSJDX2QFNVDDJXRHJQNNJQUALNCYM3DAMO75AZAGBO53QHWUP4ZOHTGJBLI7ZHIUP4I2LTY2KDCSZH65RVMGIZQVKPDGAFU2PMDWN2ELO3VEI7ZEDRMXGDI2WB547BMX33KQY"';
		// echo $sql;
		$result = $conn->query($sql);

		$info = array();

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				array_push($info, intval($row['userid']));
			}
		} else {
			array_push($info, "none");
		}

		echo json_encode($info);
	?>