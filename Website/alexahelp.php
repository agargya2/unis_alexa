<!DOCTYPE html>
<html>
<head>
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
		h1{
			color: #2196F3;
			margin-top: 20px;
			margin-bottom: 10px;
			font-size: 45px;
			text-align: center;
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
		body{
			background: url(https://upload.wikimedia.org/wikipedia/commons/3/36/Hopetoun_falls.jpg) fixed no-repeat;
			background-size: 2175px 1500px;
		}
		li{
			color: #2196F3;
			font-size: 20px;
		}
	</style>
</head>
<body>
	<h3 onclick="openNav()">&#9776;</h3>
	<h1>Alexa</h1>
	<div id="navbar">
		<span onclick="closeNav()" id="closeBtn">&times;</span>
		<a href="studentassignments.php">Assignments</a>
		<a href="listofclasses.php">Classes</a>
		<a href="alexahelp.php">Alexa</a>
		<a href="logout.php">Logout</a>
	</div>
		
	<div class="formdiv">
		<h4>Get The App</h4>
			<ul>
				<li>Go to alexa.amazon.com or the Amazon Alexa app on your phone</li>
				<li>Search up and enable the Uni Homework Planner skill</li>
			</ul>
		<h4>Linking Your Account</h4>
			<ul>
				<li>Say "Alexa, open Homework Planner</li>
				<li>Say "Sign Up"</li>
				<li>Say Your Unique Number: "<?php
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
					echo $userid;
				?>"</li>
				<li>Now All You Have To Say is "Alexa, ask Homework Planner what homework do I have?"</li>
			</ul>
	</div>
</body>
</html>