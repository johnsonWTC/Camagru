<?php
	function redirect() {
		header('Location:home.php');
		exit();
	}

	if (!isset($_GET['userEmail']) || !isset($_GET['token'])) {
		redirect();
	} else {
		$con = new mysqli('localhost', 'root', 'jamgod123', 'camagru');

		$email = $con->real_escape_string($_GET['userEmail']);
		$token = $con->real_escape_string($_GET['token']);

		$sql = $con->query("SELECT id FROM users WHERE userEmail='$email' AND token='$token' AND isEmailConfirmed=0");

		if ($sql->num_rows > 0) {
			$con->query("UPDATE users SET isEmailConfirmed=1, token='' WHERE userEmail='$email'");
			echo 'Your email has been verified! You can log in now!';
			redirect();
		} else
			redirect();
	}
?>