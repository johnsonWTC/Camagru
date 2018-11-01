<?php
	if (isset($_GET["token_p"]) && isset($_GET["userEmail"])) {
		$connection = new mysqli('localhost', 'root', 'jamgod123', 'camagru');
		
		$email = $connection->real_escape_string($_GET["userEmail"]);
		$token_p = $connection->real_escape_string($_GET["token_p"]);
		

		$data = $connection->query("SELECT id FROM users WHERE userEmail='$email' AND token_p='$token_p'");
		if ($data->num_rows > 0) {
			$str = "0123456789qwertzuioplkjhgfdsayxcvbnmASDFGHJKLMNBVCXZQWERTYUIOP";
			$str = str_shuffle($str);
			$str = substr($str, 0, 10);

			$password= hash('sha256', $str);

			$connection->query("UPDATE users SET password = '$password', token_p  = '' WHERE userEmail='$email'");
		
					$to = $email;
					$subject = "Password reset";
			
					$message = "<b>new password is:  $str </b>";
					$header = "From:new password@somedomain.com \r\n";
					$header .= "MIME-Version: 1.0\r\n";
					$header .= "Content-type: text/html\r\n";
			
					$retvalll = mail ($to,$subject,$message,$header);
					if( $retvalll == true ) {
						mail($email, "New password", "your new password is:$str ", "From: newpassword@domain.com\r\n");
						echo "your new pssword has been sent to your email address, Your new password is: $str";
					}

		} else {
			echo "Please check your link!";
		}
	} else {
	//	header("Location: home.php");
		exit();
	}
?>
