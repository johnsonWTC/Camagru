<?php

if (!isset($_POST["code"]))
{
	die("Post was empty");
}

$db = "insert into tablename(images) values(:images)";

//insert with named rows
$conn = new PDO('mysql:host=localhost;dbname=myDB', "root", "myPassword");
$stmt = $conn->prepare($sql);
$stmt->bindValue(":image",$_POST["image"]);
$stmt->execute();
$affected_rows = $stmt->rowCount();
echo $affected_rows;

?>
