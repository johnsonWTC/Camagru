<?php
	if (isset($_POST["forgotPass"])) {
		$connection = new mysqli('localhost', 'root', 'jamgod123', 'camagru');
		
		$email = $connection->real_escape_string($_POST["Email"]);
		
		$data = $connection->query("SELECT id FROM users WHERE userEmail='$email'");

		if ($data->num_rows > 0) { 
			$str = "0123456789qwertzuioplkjhgfdsayxcvbnm";
			$str = str_shuffle($str);
			$str = substr($str, 0, 10);
			$url = "http://127.0.0.1:8080/Camagru/resetPassword.php?userEmail=$email&token_p=$str";

			$to = $email;
					$subject = "This is subject";
			
					$message = "<b>To reset your password, please visit this:</b>";
					$message .= " $url";
					$header = "From:passwordreset@Camagru.com \r\n";
				//	$header .= "Cc:afgh@somedomain.com \r\n";
					$header .= "MIME-Version: 1.0\r\n";
					$header .= "Content-type: text/html\r\n";
			
					$retvall = mail ($to,$subject,$message,$header);
					if( $retvall == true ) {
						echo "Message sent successfully...";
					}


		//	

			$connection->query("UPDATE users SET token_p='$str' WHERE userEmail='$email'");

			echo "Please check your email!";
		} else {
			echo "Please check your inputs!";
		}
	}
?>
<html>
	<body>
	<form action="forgotPassword.php" method="post">
			<input type="text" name="Email" placeholder="Email"><br>
			<input type="submit" name="forgotPass" value="Request Password">
		</form>
	</body>
</html>