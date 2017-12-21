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
		h3{
			margin-top: 50px;
			font-size: 45px;
			margin-left: 16%;
			margin-bottom: -80px;
			transition: 0.5s;
			cursor: pointer;
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
		}
		h1{
			color: #2196F3;
			margin-top: 20px;
			margin-bottom: 25px;
			font-size: 45px;
			text-align: center;
			font-family: Cambria;

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

		/* Hide the browser's default checkbox */
		.container input {
			position:absolute;
		    opacity: 0;
		}

		 /*Create a custom checkbox*/
		.checkmark {
		    position: absolute;
		    top: 0;
		    left: 0;
		    height: 25px;
		    width: 25px;
		    background-color: white;
		}

		/* On mouse-over, add a grey background color */
		.container:hover input ~ .checkmark {
		    background-color: #ccc;
		}

		/* When the checkbox is checked, add a blue background */
		.container input:checked ~ .checkmark {
		    background-color: #2196F3;
		}

		/* Create the checkmark/indicator (hidden when not checked) */
		.checkmark:after {
		    content: "";
		    position: absolute;
		    display: none;
		}

		/* Show the checkmark when checked */
		.container input:checked ~ .checkmark:after {
		    display: block;
		}

		/* Style the checkmark/indicator */
		.container .checkmark:after {
		    left: 9px;
		    top: 5px;
		    width: 5px;
		    height: 10px;
		    border: solid white;
		    border-width: 0 3px 3px 0;
		    -webkit-transform: rotate(45deg);
		    -ms-transform: rotate(45deg);
		    transform: rotate(45deg);
		}

		.button{
			background-color: #2196F3;
			text-align: center;
			color: white;
			font-size: 22px;
			padding: 10px 20px 10px 20px;
			border: none;
			cursor: pointer;
		}
		.formdiv{
			margin-top: 20px;
			border-radius: 5px;
			background-color: #f2f2f2;
			padding: 20px;
			margin: auto;
			width: 65%;
			opacity: 0.9;
		}
		body{
			background: url(https://upload.wikimedia.org/wikipedia/commons/3/36/Hopetoun_falls.jpg) fixed no-repeat;
			background-size: 2175px 1500px;
		}
	</style>
</head>
<body>
	<h3 onclick="openNav()">&#9776;</h3>
	<h1>Change Classes</h1>
	<div id="navbar">
		<span onclick="closeNav()" id="closeBtn">&times;</span>
		<a href="studentassignments.php">Assignments</a>
		<a href="listofclasses.php">Classes</a>
		<a href="alexahelp.php">Alexa</a>
		<a href="logout.php">Logout</a>
	</div>
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

			$sql = "SELECT * FROM studentclasses WHERE userid = $userid";
			$result = $conn->query($sql);

			$studentClasses = array();

			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					array_push($studentClasses, $row['classid']);
				}
			}

			$sql = "SELECT * FROM teacherclasses";
			$result = $conn->query($sql);

		?>
		<div class="formdiv">
			<form method="post" action="changeclasses.php">
				<?php
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$classname = $row['class'];
						$classid = $row['id'];

						if(in_array($classid, $studentClasses)){
							echo '<label class="container">'.$classname;
							echo '<input type="checkbox" checked value='.$classid.' name=class[]>';
							echo '<span class="checkmark"></span>';
							echo '</label>';
						} else{
							echo '<label class="container">'.$classname;
							echo '<input type="checkbox" value='.$classid.' name=class[]>';
							echo '<span class="checkmark"></span>';
							echo '</label>';
						}
					}
				}
				?>
				<input class="button" type="submit" value="Change Classes">
			</form>
		</div>
</body>
</html>	