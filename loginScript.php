<?php
//start session
session_start();

include 'alert.php';
require_once('database.php');

//check if user is already connect
if (isset($_SESSION['uname']) != "")
{
	header('Location: home.php');
}

$error = false;

if (isset($_POST['submit']) == 'ok')
{
	//prevention against sql injections
	/*$email = trim($_POST['email']);
	$email = strip_tags($email);
	$email = htmlspecialchars($email);*/

	$username = trim($_POST['uname']);
	$username = strip_tags($username);
	$username = htmlspecialchars($username);

	$pass = $_POST['pword'];

	//email validation
	/*if (!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		$error = true;
		$emailError = "Please enter a valid email address";
	}*/

	//password validation
	if (!isset($_POST['pword']))
	{
		$error = true;
		$passwordError = "Please fill in the password field";
		errorFunc($passwordError);
	}

	if (!$error)
	{
		try 
		{
			
		$db = new PDO("mysql:$dsn", $user, $password);

		$db->query("Use camagru;");

		$passw = hash('sha256', $pass);

		$result = $db->prepare("SELECT username, userEmail, password 
		   					FROM Users WHERE username='$username';");	
		$result->execute(array("uname"=>$username));
		$row = $result->fetch(PDO::FETCH_ASSOC);
		//echo $result->rowCount() ."\n";
		if ($result->rowCount() === 1 && $row['password'] === $passw && $row['username'] === $username)
		{
			$_SESSION['user'] = $row[0]['username'];
			header('Location: home.php');
		}
		else
		{
			errorFunc("Check your password or username and try again! :-)");
		}
		}
		catch(PDOException $e)
		{
			die ("failed to connect: " .$e->getMessage());
		}
	}
}
?>
