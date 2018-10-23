<?php
   $background = imagecreatefromjpeg('img3.jpg');
   $bird = imagecreatefrompng('img4.png');
   $bird_x = imagesx($bird);
   $bird_y = imagesy($bird);

   imagesavealpha($bird, true);
   $color = imagecolorallocatealpha($bird, 0, 0, 0, 127);
   imagefill($bird, 0, 0, $color);
   if (imagecopy($background, $bird, 0, 0, 0, 0, imagesx($bird),imagesy($bird)))
   {
       header('Content-Type: image/jpeg');
       imagejpeg($background);
       imagedestroy($background);
       imagedestroy($bird);
   }
   else
       {
           header('Content-Type: text/html');
           echo "Failed to Merge images!";
       }
?>