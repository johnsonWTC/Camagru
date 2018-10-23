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
function badAlert($msg)
{
?>
<html>
<head>
	<script language = "javascript">
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
