<!doctype html>
<html>
<?php
	session_start();
?>
<head>
  <meta charset="utf-8">
  <title>Documento sin título</title>
</head>
<body>
  <?php
	if (isset($_SESSION['id'])) {
	  $id_usuario = $_SESSION['id'];
	  $id_producto = $_GET['id'];
	  $cantidad = 1;
	  //Establezco la conexion con la BD
	  $link = mysqli_connect("localhost", "root");
	  mysqli_select_db($link,"atom");
	  $query = "insert into carrito values(".$id_usuario.",".$id_producto.",".$cantidad.")";
	  if (mysqli_query($link, $query)) {
		header("location: productos.php");
	  } else {
		echo "Error: " . $query . "<br>" . mysqli_error($link);
	  }
	  mysqli_close($link);
	}
  ?>
</body>
</html>