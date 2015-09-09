<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>
<?php
	session_start();
	unset($_SESSION["username"]); 
	session_destroy();
	header("Location: home.php");
?>
<body>
</body>
</html>