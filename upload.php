<?php
include 'alert.php';


//basename takes the trailing name eg /etc/reuben.png *reuben.png*
$target_dir = "../userImages/";//where the file is going to be placed

if (!file_exists($target_dir))
{
	mkdir($target_dir, 0777, true);
}

$target_file = $target_dir . basename($_FILES['filename']['name']);
$uploadOk = 1;

//pathinfo returns information about path from targetfile
//this case an extension
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

//check if the image is actual image
if (isset($_POST['submit'])== 'upload')
{
	$check = getImageSize($_FILES['filename']['tmp_name']);

	if ($check !== false)
	{
		$msg = "File is an image - " . $check['mime'] . ".";
		//goodAlert($msg);
		$uploadOk = 1;
	}
	else
	{
		$msg = "File is not an image";
		badAlert($msg);
		$uploadOk = 0;
	}
}

if (file_exists($target_file))
{
	$msg = "sorry file already exists.";
	badAlert($msg);
	$uploadOk = 0;
}

if ($_FILES['filename']['size'] > 500000)
{
	$msg = "sorry file too large to upload, max size is 0.5MB";
	badAlert($msg);
	$uploadOk = 0;
}

if ($imageFileType != 'jpg' && $imageFileType != 'gif' && $imageFileType != 'jpeg' && $imageFileType != 'png')
{
	$msg = "sorry this is the wrong file type, try again!";
	badAlert($msg);
	$uploadOk = 0;
}

if ($uploadOk == 0)
{
	$msg = "sorry your file was not uploaded";
	badAlert($msg);
}
else
{
	if (move_uploaded_file($_FILES['filename']['tmp_name'], $target_file))
	{
		$msg = "The file ". basename($_FILES['filename']['name']). " has been  uploaded successfully!";
		goodAlert($msg);
	}
	else
	{
		$msg = "Error there was a problem uploading your file";
		badAlert($msg);
	}
}

?>
