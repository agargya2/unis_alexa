<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">
	<title></title>
	<script type="text/javascript">
		function openNav(){
			document.getElementById("navbar").style.width = "250px";
		}

		function closeNav(){
			document.getElementById("navbar").style.width = "0";
		}
	</script>
	<style type="text/css">
		*{
			font-family: Cambria;
		}
		h3{
			font-size: 30px;
			margin-left: 5%;
			margin-bottom: -30px;
		}
		#navbar{
			height:100%;
			width:0px;
			background-color:black;
			z-index: 1;
			position: fixed;
			overflow-x: hidden;
			top:0;
			left:0;
			transition: 0.5s;
			padding-top: 65px;
		}

		#navbar a {
			text-decoration: none;
			font-size: 25px;
			color: white;
			display: block;
			padding: 8px 8px 8px 32px;

		}

		#navbar a:hover {
    		color: #2196F3;
		}

		#navbar #closeBtn{
			color: white;
			position: absolute;
			top: 0;
			right: 25px;
			font-size: 36px;
			margin-left: 50px;
			cursor: pointer;
		}
		h3:hover{
			color: #2196F3;
		}
		#navbar #closeBtn:hover{
			color: #2196F3;
		}
		.blueBar{
			color:#fff!important;
			background-color:#2196F3!important
		}
		h1{
			color: #2196F3;
			margin-top: 20px;
			margin-bottom: 20px;
			font-size: 45px;
			text-align: center;
		}
		table{
			font-size: 18px;
		}
		.formdiv{
			margin-top: 20px;
			border-radius: 5px;
			background-color: #f2f2f2;
			padding: 20px;
			margin: auto;
			width: 90%;
			opacity: 0.9;
		}
		h3{
			margin-top: 55px;
			font-size: 45px;
			margin-left: 70px;
			margin-bottom: -85px;
			transition: 0.5s;
			cursor: pointer;
		}
		body{
			background: url(https://upload.wikimedia.org/wikipedia/commons/3/36/Hopetoun_falls.jpg) fixed no-repeat;
			background-size: 2175px 1500px;
		}
	</style>
</head>
<body>
	<h3 onclick="openNav()">&#9776;</h3>
	<h1>Assignments</h1>
	<div id="navbar">
		<span onclick="closeNav()" id="closeBtn">&times;</span>
		<a href="studentassignments.php">Assignments</a>
		<a href="listofclasses.php">Classes</a>
		<a href="alexahelp.php">Alexa</a>
		<a href="logout.php">Logout</a>
	</div>
	<div class="formdiv">
		<table class="w3-table-all w3-hoverable">
			<tr class="blueBar">
				<th>Class</th>
				<th>Assignment</th>
				<th>Description</th>
			</tr>
			<?php
				if(isset($_COOKIE["loggedIn"])){
					if($_COOKIE["loggedIn"] == TRUE){

					}
					else{
						header("Location: index.php");
					}
				}
				else{
					header("Location: index.php");
				}
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

				$sql = "SELECT * FROM studentclasses WHERE userid = \"".$userid."\"";
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

				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						if(in_array($row['classid'], $classesTaken)){
							echo "<tr><td>" . $row['class'] . "</td><td>" . $row['assignment'] . "</td><td>" . $row['description'] . "</td></tr>";
						}
					}
				}
			?>
		</table>
	</div>
</body>
</html>	