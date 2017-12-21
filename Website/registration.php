<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<style type="text/css">
		*{
			font-family: Cambria;
		}

		h4{
			color: #2196F3;
			font-size: 22px;
			font-weight: bold;
		}

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

		h1{
			color: #2196F3;
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
		#code{
			display: none;
		}
		span{
			font-size: 22px;
		}

		.errorMessage{
			font-size: 16px;
		}
		body{
			background: url(https://upload.wikimedia.org/wikipedia/commons/3/36/Hopetoun_falls.jpg) fixed no-repeat;
			background-size: 2175px 1500px;
		}
	</style>
	<script>
		var goodUsername = false;
		var goodPassword = false;
		var goodConfirmPassword = false;
		var goodEmail = false;

		function handleClick(){
			if(document.getElementById("teacherRadio").checked){
				document.getElementById("code").style.display = "block";
				clearPara("roleErrorMessage");
			} else {
				clearPara("roleErrorMessage");
				document.getElementById("code").style.display = "none";
			}
		}

		function validateInformation(){
			if(goodUsername && goodPassword && goodConfirmPassword && goodEmail && validateCode()){
				return true;
			} else {
				validateUsername();
				validatePassword();
				validateConfirmPassword();
				validateEmail();
				validateCode();
				return false;
			}
		}

		function validateUsername(){
			var username = document.getElementsByName("username")[0];
			if(username.value.length > 0){
				var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							var response = JSON.parse(xhttp.responseText)[0];
							if(response){
								document.getElementById("usernameErrorMessage").innerHTML = "<span>&#10003;</span> Username is Available";
								changeColor("usernameErrorMessage", "green");
								goodUsername = true;
							} else{
								document.getElementById("usernameErrorMessage").innerHTML = "<span>&times;</span> Username is Taken";
								changeColor("usernameErrorMessage", "red");
								goodUsername = false;
							}
						}
					};
				xhttp.open("GET", "username.php?text="+username.value, true);
				xhttp.send();
			} else {
				goodUsername = false;
			}
		}

		function validatePassword(){
			var password = document.getElementsByName("password")[0];
			if(password.value.length > 0){
				var response;

				if(password.value.length > 2){
					response = true;
				} else {
					response = false;
				}

				if(response){
					document.getElementById("passwordErrorMessage").innerHTML = "<span>&#10003;</span> Password is Valid";
					changeColor("passwordErrorMessage", "green");
					goodPassword = true;
				} else{
					document.getElementById("passwordErrorMessage").innerHTML = "<span>&times;</span> Password Must Be Longer than 2 Characters";
					changeColor("passwordErrorMessage", "red");
					goodPassword = false;
				}
			} else{
				goodPassword = false;
			}
		}

		function validateConfirmPassword(){
			var password = document.getElementsByName("password")[0];
			var confirmPassword = document.getElementsByName("confirmPassword")[0];
			if(confirmPassword.value.length > 0){
				var response = (confirmPassword.value === password.value);
				if(response){
					document.getElementById("confirmPasswordErrorMessage").innerHTML = "<span>&#10003;</span> Passwords Match";
					changeColor("confirmPasswordErrorMessage", "green");
					goodConfirmPassword = true;
				} else{
					document.getElementById("confirmPasswordErrorMessage").innerHTML = "<span>&times;</span> Passwords Do Not Match";
					changeColor("confirmPasswordErrorMessage", "red");
					goodConfirmPassword = false;
				}
			} else {
				goodConfirmPassword = false;
			}
		}

		function validateEmail(){
			var email = document.getElementsByName("email")[0];
			if(email.value.length > 0){
				var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							var response = JSON.parse(xhttp.responseText)[0];
							if(response){
								document.getElementById("emailErrorMessage").innerHTML = "<span>&#10003;</span> Email is Valid";
								changeColor("emailErrorMessage", "green");
								goodEmail = true;
							} else{
								document.getElementById("emailErrorMessage").innerHTML = "<span>&times;</span> Invalid Email";
								changeColor("emailErrorMessage", "red");
								goodEmail = false;
							}
						}
					};
				xhttp.open("GET", "email.php?text="+email.value, true);
				xhttp.send();
			} else {
				goodEmail = false;
			}
		}

		function validateCode(){
			if(document.getElementById("teacherRadio").checked){
				var code = document.getElementsByName("code")[0];
				var response;
				if(code.value.length === 0){
					response = false;
				} else {
					response = true;
				}
				if(response){
					console.log("creating");
					return true;
				} else{
					document.getElementById("roleErrorMessage").innerHTML = "<span>&times;</span> Please Type In Your Code";
					changeColor("roleErrorMessage", "red");
					return false;
				}
			} else if(document.getElementById("studentRadio").checked){
				return true;
			} else {
				document.getElementById("roleErrorMessage").innerHTML = "<span>&times;</span> Select A Role";
				changeColor("roleErrorMessage", "red");
				return false;
			}
		}

		function clearPara(id){
			document.getElementById(id).innerHTML = "";
		}

		function changeColor(id, textcolor){
			document.getElementById(id).style.color = textcolor;
		}

	</script>
</head>
<body>
	<br><br>
	<h1>Registration</h1>
	<div>
		<form method="post" action="createAccount.php" id="form" name="registrationInfo" onsubmit="return validateInformation()">
			<input type="text" name="username" placeholder="Username" onkeyup="validateUsername()" onfocus="validateUsername()" onblur="clearPara('usernameErrorMessage')">
			<p id="usernameErrorMessage" class="errorMessage"></p>
			<input type="password" name="password" placeholder="Password" onkeyup="validatePassword()" onfocus="validatePassword()" onblur="clearPara('passwordErrorMessage')">
			<p id="passwordErrorMessage" class="errorMessage"></p>
			<input type="password" name="confirmPassword" placeholder="Confirm Password" onkeyup="validateConfirmPassword()" onfocus="validateConfirmPassword()" onblur="clearPara('confirmPasswordErrorMessage')">
			<p id="confirmPasswordErrorMessage" class="errorMessage"></p>
			<input type="text" name="email" placeholder ="Email" onkeyup="validateEmail()" onfocus="validateEmail()" onblur="clearPara('emailErrorMessage')">
			<p id="emailErrorMessage" class="errorMessage"></p>

			<label class='container'>Student
			<input type='radio' name='role' value="student" id="studentRadio" onclick="handleClick()">
			<span class='checkmark'></span>
			</label>

			<label class='container'>Teacher
			<input type='radio' name='role' value="teacher" id="teacherRadio" onclick="handleClick()">
			<span class='checkmark'></span>
			</label>

			<input type="text" name="code" placeholder="Code" id="code">
			<p id="roleErrorMessage" class="errorMessage"></p>
			
			<input type="submit" value="Create Account">
			<a href="index.php"><h4>Already have an Account?</h4></a>
		</form>
	</div>
</body>
</html>