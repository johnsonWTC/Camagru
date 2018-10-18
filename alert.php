<?php
    function goodAlert($msg)
    {
?>
<html>
    <head>
        <script language = "javascript">
            alert("<?=$msg?>");
        </script>
    </head>
    <body>
    </body>
</html>
<?php
    exit;
    }
?>
<?php
function badArlert($msg)
{
?>
<html>
    <script langauge = "javascript">
        alert("<?=$msg?>");
    history.back();
    </script>
</head>
<body>
</body>
</html>
<?php
    exit;
}
?>