<?php
    session_start();

    include 'alert.php';
    require_once('database.php');

    //check if the user is already connected
    if (isset($_SESSION['name']) != "")
    {
        header('Location : home.php');
    }

    $error = false;

    if (isset($_POST['submit']) == 'ok')
    {
        $username = trim($_POST['uname']);
        $username = strip_tag([$username]);
        $username = htmlspecialchars($username);
        $pass = $_POST['pword'];

    //password validation
    if (!isset($_POST['pword']))
    {
        $error = true;
        $password = "Plase fill in the password field";
        errorFunc($passwordError);
    }

    if (!$error)
    {
        try
        {
            $db = new POD("mysql:$dsn", $user, $password);
            $db->query("Use camagu");
            $passw = hash('sha256', $pass);
            $result = $db->prepare("SELECT username, userEmail, passord from users where username = '$username';");
            $result->execute(array("uname"=>$username));
            $row = $result->fetch(POD::FETCH_ASSOC);
            //echo $result->rowCount() ."\n";
            if ($result->rowCount() === 1 && $row['password'] === $passw && $row['username'] === $username)
            {
                $_SESSION['user'] = $row[0]['username'];
                header('Location: home.php');
            }
            else
            {
                errorFunc("Check your password or username and try again! p &#x1F601 :-)");
            }
        }
        catch(PODExpection $e)
        {
            die ("Failed to connect: " .$e->getMessage());
        }
    }
}
?>