<?php
//start session
session_start();

//check if user is already connect
if (isset($_SESSION['username']) != "")
{
	header('Location: home.php');
}
//call the database and error file
require_once('database.php');
include 'alert.php';

/*$_POST['fname'] = 'mceb';
$_POST['lname'] = 'xaba';
$_POST['uname'] = 'mcb21';
$_POST['pword'] = 'mcebo12345!';
$_POST['cfpword'] = 'mcebo12345!';
$_POST['email'] = 'samuel.mcebo@gmail.com';
$_POST['submit'] = 'ok';*/

try
{
	//create a new instance 
	$db = new PDO("mysql:$dsn", $user, $password);

	$query = $db->prepare("USE camagru;");
	$query->execute();
	$error = false;

	if (isset($_POST['submit']) == 'ok')
	{
		//print_r($_POST);
		//prevention against sql injections
		$firstname = trim($_POST['fname']);
		$firstname = strip_tags($firstname);
		$firstname = htmlspecialchars($firstname);

		$lastname = trim($_POST['lname']);
		$lastname = strip_tags($lastname);
		$lastname = htmlspecialchars($lastname);

		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		//echo $email ."\n";

		$username = trim($_POST['uname']);
		$username = strip_tags($username);
		$username = htmlspecialchars($username);
		//$username = filter_var($username, FILTER_FLAG_STRIP_LOW);

		$password = $_POST['pword'];
		$confirmPass = $_POST['cfpword'];

		//names validation
		if (empty($firstname) || empty( $lastname))
		{
			$error = true;
			$nameError = "Please enter your names";
			errorFunc($nameError);
		}
		else if (!preg_match("/^[a-zA-Z]+$/", $firstname) || !preg_match("/^[a-zA-Z]+$/", $lastname))
		{
			$error = true;
			$nameError = "Names must contain letters and spaces";
			errorFunc($nameError);
		}

		//email validation
		if (!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$error = true;
			$emailError = "Please enter a valid email address";
			errorFunc($emailError);
		}
		else
		{
			//echo $email ."\n";
			//check if email exists or not
			$result = $db->prepare("SELECT userEmail FROM Users WHERE userEmail='$email';"); 
			$result->execute(array("email"=>$email));
			$row = $result->fetch(PDO::FETCH_ASSOC);
			//$count = (int)$result->fetchAll();
			//echo "1\n";
			//print_r($count);
			//echo "\n2\n";
			//echo $count ."\n";

			if ($result->rowCount() > 0)
			{
				$error = true;
				$emailError = "Provided email is already in use.";
				errorFunc($emailError);
			}
		}

		if ($username)
		{
			//check if username exists or not
			$res = $db->prepare("SELECT username FROM Users WHERE username ='$username';"); 
			$res->execute(array("uname"=>$username));
			$catch = $res->fetch(PDO::FETCH_ASSOC);
			
			if ($res->rowCount() > 0)
			{
				$error = true;
				$unameError = "Provided username is already in use.";
				errorFunc($unameError);
			}
		}

		//password validation
		if (isset($_POST['pword']) && isset($_POST['cfpword']))
		{
			if ($password !== $confirmPass)
			{
				$error = true;
				$passwordError = "Your Password and Confirmation Password do not match.";
				errorFunc($passwordError);
			}
			else
			{
				//encrypt password
				$passw = hash('sha256', $password);
			}
		}

		if (!$error)
		{
			$result = $db->prepare("INSERT INTO Users (firstname, lastname, username, userEmail, password, reg_date) 
				VALUES ('$firstname', '$lastname', '$username', '$email', '$passw', now());") or die("failed query". $db->errorInfo());
			$result->execute();
			if ($result)
			{
				$errMSG = "Successfully logged in";
				//errorFunc($errMSG);
				header('Location: home.php');
				/*unset($fname);
				unset($lname);
				unset($uname);
				unset($email);
				unset($password);*/
			}
			else
			{
				$errMSG = "Something went wrong";
				errorFunc($errMSG);
			}

		}
	}
}
catch(PDOException $e)
{
	die ("failed to connect: " .$e->getMessage());
}
?>
