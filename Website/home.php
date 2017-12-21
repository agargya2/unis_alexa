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
	?>
	
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

				$sql = "SELECT * FROM users WHERE username = \"".$currentUser."\"";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						if($row['role'] == 'student'){
							header("Location: studentassignments.php");
						}
					}
				}
			?>



<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">
	<script type="text/javascript">
		function openNav(){
			document.getElementById("navbar").style.width = "250px";
		}

		function closeNav(){
			document.getElementById("navbar").style.width = "0";
		}

		function checkValues(){
			var returnBool = true;
			var aRadioChecked = false;
			var inputs = document.getElementsByTagName("input");
			for(var i = 0; i < inputs.length; i++){
				if(inputs[i].type === "text"){
					if(inputs[i].value.trim() === ""){
						document.getElementById(inputs[i].getAttribute("displayId")).innerHTML = "Fill This Out";
						returnBool = false;
					} else{
						inputs[i].value = inputs[i].value.trim();
					}
				} else if(inputs[i].type === "radio"){
					if(inputs[i].checked){
						aRadioChecked = true;
					}
				}
			}
			if(aRadioChecked === false){
				document.getElementById("classErrorMessage").innerHTML = "Select A Class";
				returnBool = false;
			}

			return returnBool;
		}
	</script>
	<style>

		*{
			font-family: Cambria;
		}
		h3:hover{
			color: #2196F3;
		}
		#navbar #closeBtn:hover{
			color: #2196F3;
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
			transition: 0.5s;
			cursor: pointer;
		}
		.blueBar{
			color:#fff!important;
			background-color:#2196F3!important
		}
		h1{
			color: #2196F3;
			margin-top: 20px;
			margin-bottom: 10px;
			font-size: 45px;
			text-align: center;
		}
		img{
			height: 20px;
			width: 20px;
			margin-left: 12px;
		}

		.formdiv{
			margin-top: 20px;
			border-radius: 5px;
			background-color: #f2f2f2;
			padding: 20px;
			margin: auto;
			width: 75%;
			margin-bottom: 80px;
			opacity: 0.9;
		}

		input[type=submit]{
			font-size: 15px;
			width: 100%;
			color: white;
			background-color: #2196F3;
			border-radius: 5px;
			margin: 8px 0;
			cursor: pointer;
			padding: 14px;
		}

		input[type=text], select {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			font-size: 17px;
		}
		/* The container */
		.container {
		    display: block;
		    position: relative;
		    padding-left: 35px;
		    margin-bottom: 12px;
		    cursor: pointer;
		    font-size: 22px;
		    -webkit-user-select: none;
		    -moz-user-select: none;
		    -ms-user-select: none;
		    user-select: none;
		}

		/* Hide the browser's default radio button */
		.container input {
		    position: absolute;
		    opacity: 0;
		}

		/* Create a custom radio button */
		.checkmark {
		    position: absolute;
		    top: 0;
		    left: 0;
		    height: 25px;
		    width: 25px;
		    background-color: white;
		    border-radius: 50%;
		}

		/* On mouse-over, add a grey background color */
		.container:hover input ~ .checkmark {
		    background-color: #ccc;
		}

		/* When the radio button is checked, add a blue background */
		.container input:checked ~ .checkmark {
		    background-color: #2196F3;
		}

		/* Create the indicator (the dot/circle - hidden when not checked) */
		.checkmark:after {
		    content: "";
		    position: absolute;
		    display: none;
		}

		/* Show the indicator (dot/circle) when checked */
		.container input:checked ~ .checkmark:after {
		    display: block;
		}

		/* Style the indicator (dot/circle) */
		.container .checkmark:after {
		 	top: 9px;
			left: 9px;
			width: 8px;
			height: 8px;
			border-radius: 50%;
			background: white;
		}

		h3{
			margin-top: 55px;
			font-size: 45px;
			margin-left: 12.5%;
			margin-bottom: -85px;
			transition: 0.5s;
			cursor: pointer;
		}
		h4{
			color: #2196F3;
			font-size: 22px;
			font-weight: bold;
		}
		table{
			font-size: 18px;
		}
		.errorMessage{
			font-size: 16px;
			color: red;
			margin-top: 0px;
			margin-bottom: -10px;
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
		<a href="home.php">Assignments</a>
		<a href="teachereditclasses.php">Classes</a>
		<a href="logout.php">Logout</a>
	</div>
		<div class="formdiv">
		<h4>Current Assignments</h4>
		<table class="w3-table-all w3-hoverable">
			<tr class="blueBar">
				<th>Class</th>
				<th>Assignment</th>
				<th>Description</th>
				<th>Delete</th>
			</tr>
			<?php

				$sql = "SELECT teacherclasses.userid, classassignments.id, teacherclasses.class, classassignments.classid, classassignments.assignment, classassignments.description FROM teacherclasses JOIN classassignments ON teacherclasses.id = classassignments.classid WHERE userid = \"".$userid."\"";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$assignmentId = $row['id'];
						$link = "\"deleteassignment.php?assignmentidtodelete=" . $assignmentId. "\"";

						$trashCan = "<a href=".$link."><img src='https://openclipart.org/download/226230/trash.svg'</td></a>";

						echo "<tr><td>" . $row['class'] . "</td><td>" . $row['assignment'] . "</td><td>" . $row['description'] . "</td><td>".$trashCan."</tr>";
						
					}
				}
			?>
		</table>
	<br><br>
	<h4>Add an Assignment</h4>
		<form action="adding.php" method="post" onsubmit="return checkValues()">
			<?php
				$sql = "SELECT * FROM teacherclasses WHERE userid = \"".$userid."\"";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$classId = $row['id'];
						$className = $row['class'];
						echo "<label class='container'>$className";
						echo "<input type='radio' name='class' value=".$classId.">";
						echo "<span class='checkmark'></span>";
						echo "</label>";
					}
				}
			?>
			<p id="classErrorMessage" class="errorMessage"></p>
			<br>
			<input type='text' name='assignmentName' placeholder='Assignment Name' displayId="nameErrorMessage">
			<p id="nameErrorMessage" class="errorMessage"></p>
			<br>
			<input type='text' name='assignmentDescription' placeholder='Assignment Description' displayId="descriptionErrorMessage">
			<p id="descriptionErrorMessage" class="errorMessage"></p>
			<br>
			<input type="submit" value="Add Assignment">
		</form>
	</div>
</body>
</html>