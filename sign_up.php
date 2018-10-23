<?php include 'details_welcome.php' ?>
<html>
	<head>
		<title>SignUp Camagru</title>
		<link rel="stylesheet" type="text/css" href="css_style/up_style.css">
	</head>
	<body>
		<div class = "imageContainer">
			<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRMIHcGO1-KSDnJuGlo53o2fPA_FsEiuN5Xlbh7fnYq7WQOW3Br" class="avatar">
		</div>
		<form action="signupScript.php" method="post">
			<div class = "login">
				<label><b>Firstame</b></label>
				<input type="text" placeholder="Enter username" name="fname" pattern=".{3,}" title="Must contain atlest 3 or more characters" required>
				<label><b>Lastname</b></label>
				<input type="text" placeholder="Enter username" name="lname" pattern=".{3,}" title="Must contain atlest 3 or more characters" required>
				<label><b>Email Address</b></label>
				<input type="text" placeholder="Enter your email address" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
				<label><b>Username</b></label>
				<input type="text" placeholder="Enter username" name="uname" pattern=".{3,}" title="Must contain atlest 3 or more characters" required>
				<label><b>Password</b></label>
				<input type="password" placeholder="Enter password" name="pword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
				<label><b>Confirm Password</b></label>
				<input type="password" placeholder="Confirm password" name="cfpword" required>
				<button type = "submit" name="submit" value = "ok">Sign Up</button>
				<span><button type="button" name = "cancel" value = "ok" class="cancelbtn">Cancel</button></span>
			</div>
			<div class = "links">
				Already have Account? <a href="login.html">Sign in</a>
			</div>
		</form>
	</body>
</html>
