<?php include 'welcome.php';?>
<html>
    <head>
        <title>Camagru</title>
        <link rel = "stylesheet" type = "text/css" href = "css_style/style_home.css">
    </head>
    <body>
        <div class = "main">
        <div><button id = "btn" onclick = "snapShot()" type = "submit" calss = "click-camerabtn" name = "submit" value = "ok">Take a Photo</button></div>
        <div class = "video">
            <video autoplay = "true" id = "videoElement"></div>
            <form method = "post" action = "upload.php" enctype = "multipart/form-data"></br></br>
            <span>Select image: <input type = "file" name = "filename" size = "40" onchanging = "loadFile(event)" accept = "image/git, image/jpeg, image/png"/>
            <input type = "submit" name = "submit" value = "upload"/></span>
            </form>
        </div>
    </div>
    <div class = "side">
        <img id = "image" src = "#" alt = "image to be displayed" width = "450" height = "350">
        <canvas id = "canv" width = "450" height = "350"></canvas>
    </div>
    <div class = "photo">
        <ul>
            <p><img id = "selBtn1" onclick = "popUp('selBtn1')" src = "../images/frame0.png" alt = "frame0" class = "images"></p>
            <p><img id = "selBtn2" onclick = "popUp('selBtn2')" src = "../images/frame1.jpg" alt = "frame1" class = "images"></p>
            <p><img id = "selBtn3" onclick = "popUp('selBtn3')" src = "../images/frame2.jpg" alt = "frame2" class = "images"></p>
            <p><img id = "selBtn4" onclick = "popUp('selBtn4')" src = "../images/frame3.png" alt = "frame3" class = "images"></p>
            <p><img id = "selBtn5" onclick = "popUp('selBtn5')" src = "../images/frame4.png" alt = "frame4" class = "images"></p>
        </ul>
        <script src = "javascript/cam.js"></script>
    </body>
</html>