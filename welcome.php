<?php
echo '<link rel="stylesheet" type="text/css" href="css_style/up_style.css">';
echo '<div style="text-align: left; color: seashell; padding: 0.01px; 
	border-radius: 8px; background-color: teal; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">';
echo '<div class="title-camagru"><a href="home.php"><h1 style="padding: 2px;">Camagru</h1></a></div><p><button class="logoutbtn" style="float: right; padding: 2px;" type="submit" name="logout" value="ok">logout</button></p>';
date_default_timezone_set('Africa/Johannesburg');
echo '<h5 style="text-align: right; padding: 5px;">Today is ';
echo date('d F');
echo ' ';
echo date('Y');
echo '</h5></div>';
?>
