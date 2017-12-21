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

		function checkValues(){
			var returnBool = true;
			var inputs = document.getElementsByTagName("input");
			for(var i = 0; i < inputs.length; i++){
				if(inputs[i].type === "text"){
					if(inputs[i].value.trim() === ""){
						returnBool = false;
					} else{
						inputs[i].value = inputs[i].value.trim();
					}
				}
			}

			return returnBool;
		}

		function checkValuesCheckmark(){
			var returnBool = false;
			var inputs = document.getElementsByTagName("input");
			for(var i = 0; i < inputs.length; i++){
				if(inputs[i].type === "checkbox"){
					if(inputs[i].checked === true){
						returnBool = true;
					}
				}
			}

			return returnBool;
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

		/* Create a custom checkbox */
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
		}

		h1{
			color: #2196F3;
			margin-top: 20px;
			margin-bottom: 10px;
			font-size: 45px;
			text-align: center;
		}

		/*div{
			border-radius: 5px;
			background-color: #f2f2f2;
			padding: 20px;
			margin: auto;
			width: 75%;
		}*/

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
		h3{
			margin-top: 45px;
			font-size: 45px;
			margin-left: 11%;
			margin-bottom: -75px;
			transition: 0.5s;
			cursor: pointer;
		}
		h4{
			color: #2196F3;
			font-size: 22px;
			font-weight: bold;
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

		body{
			background: url(https://upload.wikimedia.org/wikipedia/commons/3/36/Hopetoun_falls.jpg) fixed no-repeat;
			background-size: 1450px 1000px;
		}
	</style>
</head>
<body>
	<h3 onclick="openNav()">&#9776;</h3>
	<h1>Classes</h1>
	<div id="navbar">
		<span onclick="closeNav()" id="closeBtn">&times;</span>
		<a href="home.php">Assignments</a>
		<a href="teachereditclasses.php">Classes</a>
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

			$sql = "SELECT role FROM users WHERE username = \"".$currentUser."\"";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					if($row['role'] == "student"){
						header("Location: studentassignments.php");
					}
				}
			}

			$sql = "SELECT * FROM teacherclasses WHERE userid = $userid";
			$result = $conn->query($sql);

		?>
		<div class="formdiv">
			<h4>Delete A Class</h4>
			<form method="post" action="deleteclasses.php" onsubmit="return checkValuesCheckmark()">
				<?php
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							$classname = $row['class'];
							$classid = $row['id'];						
							echo '<label class="container">'.$classname;
							echo '<input type="checkbox" value='.$classid.' name=class[]>';
							echo '<span class="checkmark"></span>';
							echo '</label>';
						}
					}
				?>
				<input type="submit" value="Delete" class="button">
			</form>
			<h4>Add a Class</h4>
			<form action="addclassteach.php" method="post" onsubmit="return checkValues()">
				<input type="text" name="className" placeholder="Class Name">
				<input type="submit" value="Add">
			</form>
		</div>
</body>
</html>