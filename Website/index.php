<?php
	if(isset($_COOKIE["loggedIn"])){
		if($_COOKIE["loggedIn"] == TRUE){
			header("Location: home.php");
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<script>
		// function checkLogin(){
		// 	var usernameToSend = document.getElementsByName("username")[0];
		// 	var passwordToSend = document.getElementsByName("password")[0];
		// 	var xhttp = new XMLHttpRequest();
		// 	xhttp.open("GET", "login.php?username="+usernameToSend.value+"&password="+passwordToSend.value, true);
		// 	xhttp.send();

		// 	alert("hi");

		// 	xhttp.onreadystatechange = function() {
		// 		if (this.readyState == 4 && this.status == 200) {
		// 			var response = JSON.parse(xhttp.responseText)[0];
		// 			if(response){
		// 				return true;
		// 			} else{
		// 				return false;
		// 			}
		// 		}
		// 	};
		// }
	</script>
	<style type="text/css">
		h1{
			/*color: #2196F3;*/
			color: white;
			margin-top: 20px;
			margin-bottom: 20px;
			font-size: 45px;
			text-align: center;
		}

		div{
			border-radius: 5px;
			background-color: #f2f2f2;
			padding: 20px;
			margin: auto;
			width: 50%;
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

		input[type=password], select {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			font-size: 17px;
		}
		p{
			margin-top: 5px;
			margin-bottom: 5px;
			font-size: 16px;
		}
		h4{
			color: #2196F3;
			font-size: 18px;
			font-weight: bold;
			margin-top: 10px;
			margin-bottom: 0px;
			text-decoration: none;
		}
		a{
			text-decoration: none;
		}
		body{
			background: url(https://financialtribune.com/sites/default/files/field/image/17january/12_depression_3.jpg) fixed no-repeat;
			background-size: 1450px 1000px;
		}
	</style>
</head>
<body>
	<br><br>
	<h1>Uni's Homework Planner</h1>
	<div>
		<form action="check.php" method="post" id="loginForm">
			<p>Username</p>
			<!-- Username -->
			<input type="text" name="username" placeholder="Username" class="loginInput"><br>
			<p>Password</p>
			<!-- Password -->
			<input type="password" name="password" placeholder="Password" class="loginInput"><br>
			<input type="submit" value="Login" class="loginInput">
		</form>
		<a href="registration.php"><h4>Sign Up</h4></a>
	</div>

</body>
</html>