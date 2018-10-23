<?php include 'details_welcome.php' ?>
<html>
	<head>
		<title>Login Camagru</title>
		<link rel="stylesheet" type="text/css" href="css_style/in_style.css">
	</head>
	<body>
				<form action="loginScript.php" method="post">
					<div class = "login">
						<label><b>Username</b></label>
						<input type="text" placeholder="Enter username" name="uname" required>
						<label><b>Password</b></label>
						<input type="password" placeholder="Enter password" name="pword" required>
						<button type = "submit" name="submit" value= "ok">Login</button>
						<input type="checkbox" checked="checked">Remember me
					</div>
					<div class = "links">
						New to Camagru? <a href="sign_up.php">Sign up</a>
						<a class="forgotPswd" href="#">Forgot Password</a>
					</div>
				</form>
	</body>
</html>
