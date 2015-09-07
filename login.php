<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>
<body>
<?php
	$username = $_POST['username'];
	$pass = $_POST['password'];
	$link = mysqli_connect("localhost", "root");
	mysqli_select_db($link,"atom");
	$vSql = "SELECT * FROM usuario";
	$vResultado = mysqli_query($link, $vSql);
	$total_registros=mysqli_num_rows($vResultado);
?>
<table border=1>
		<tr>
			<td><b>Usuario</b></td>
			<td><b>Password</b></td>
		</tr>
		<?php
		while ($fila = mysqli_fetch_array($vResultado))
		{
		?>
		<tr>
			<td><?php echo ($fila['username']); ?></td>
			<td><?php echo ($fila['pass']); ?></td>
		</tr>
		<tr>
			<td colspan="5">
				<?php
				}
				// Liberar conjunto de resultados
				mysqli_free_result($vResultado);
				// Cerrar la conexion
				mysqli_close($link);
				?>
			</td>
		</tr>
	</table>
</body>
</html>