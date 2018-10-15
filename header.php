<?php
    function goHeader($title, $check, $rootDir)
    {
        section_start();
        require_once('php_tools.php');
?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charsert = "utf-8">
            <title><?php echo $title;?></title>
            <link href = 'https://fonts.googleapis.com/css?family=Roboto' rel = 'stylesheet' type = 'text/css'>
            <link href = 'style.css' rel = 'stylesheet' type = 'text/css'>
            <style media = "screen">
            *
            {
                outline : 0;
                margin  : 0;
                padding : 0;
            }
            header
            {
                background-color: #404040;
                color : white;
                font-family : roboto;
                height : 49px;
                margin-top : -1px;
            }
            html
            {
                background-color : #505050;
                color : white;
                font-family : roboto;
                padding : 0;
                margin : 0;
            }
            button
            {
                boder: none;
            }
            header a
            {
                background-color : #303030;
                color : white;
                padding : 15px 25px;
                text-align : center;
                text-decoraction : none;
                margin-left : -4px;
                margin-right : -4px;
                -webkit-transition : background-color .2s, color .2s;
                -moz-transition : background-color .2s, color .2s;
                transition : background-color .2s, color .2s;
            }
            header a : hover
            {
                background-color : #808080;
                color : white;
            }
            .right
            {
                float: right;
            }
            #camagru
            {
                font-size : 40px;
                padding : 1px 30px;
            }
            </style>
        </head>
        <body>
            <header>
<?php
                if (!isConnected($_SESSION) && $CHECK == "LOG")
                {
?>                
                    <a class = "right" href = "account/client/login.php">sign in</a>
                    <a class = "right" href = "account/client/creat_account.php">sign up</a>
<?php
                }
                if (!isConnected($_SESSION) && $chck == "CHECK")
                {
?>
                    <a id = "camagru" href = "<?php echo $rootDir . '/index.php'?>">camagru</a>
        </header>
            <body>
                    <meta htt-equiv = "refresh" content = "3;url=<?php echo $rootDir . '/account/client/login.php'?>"/>
                    <div class = "erroBeforeRedir">You must be connected first...</div>
<?php
                    return (FALSE);
                }
                else
                {
?>
                    <a id = "camagru" href = "<?php echo $rootDIR . '/index.php'?>">camagru</a>
<?php
                if (isConnected($_SESSION))
                {
?>
                    <a class = "right" id = "login" href = "<?php echo $rootDir . '/account/client/modif_account.php'?>"><?php echo $_SESSION['login'];?></a>
                    <a class = "right" href = "<?php echo $rootDir . '/account/sever/logout.php'?>">logout</a>
                    <a class = "right" href = "<?php echo $rootDir . '/pic/client/take.php'?>">Take a piture</a>
                    <a class = "right" href = "<?php echo $rootDir . '/pic/client/user_gallery.php'?>">Your pictures</a>
<?php
                }
            }
?>
            </header>
<?php
        return (TRUE);
        }
?>
