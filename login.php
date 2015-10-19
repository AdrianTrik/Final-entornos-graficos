<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>
<body>
<?php
	//Inicializo la sesion
	session_start();
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	//Establezco la conexion con la BD
	$link = mysqli_connect("localhost", "root");
	mysqli_select_db($link,"atom");
	//Defino la consulta
	$query = "select id, password from usuarios where username=?";
	//Preparo la consulta
	$stmt = mysqli_prepare($link, $query);
	//Enlazo los parametros
	mysqli_stmt_bind_param($stmt, 's', $username);
	//Ejecuto la consulta
	mysqli_stmt_execute($stmt);
	//Enlazo las variables resultantes
	mysqli_stmt_bind_result($stmt, $id, $colPassword);
	//Recupero el valor
	mysqli_stmt_fetch($stmt);
	//Cierro la consulta
	mysqli_stmt_close($stmt);
	//Cierro la conexion
	mysqli_close($link);
	//Verifico el password
	if ($password == $colPassword) {
		$_SESSION['id']=$id;
		header("location: home.php");
	}
	else {
		echo('Usuario y/o contraseña inexistentes');
	}
?>
</body>
</html>