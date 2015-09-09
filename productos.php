<!DOCTYPE html>
<html lang="en">
<?php
	session_start();
?>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Jugueteria Atom</title>

<!-- Bootstrap -->
<!-- <link href="css/bootstrap.css" rel="stylesheet"> -->
<link href="css/bootstrap-3.3.4.css" rel="stylesheet" type="text/css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body style="padding-top: 70px">

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" 
      	data-toggle="collapse" data-target="#topFixedNavbar">
      	<span class="sr-only">Toggle navigation</span>
	    <span class="icon-bar"></span>
	    <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand">Atom</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="topFixedNavbar">
      <ul class="nav navbar-nav">
        <li><a href="home.php">Inicio</a></li>
        <li class="active"><a href="#">Productos<span class="sr-only">(current)</span></a></li>
        <li><a href="carrito.php">Carrito</a></li>
        <li><a href="contacto.html">Contacto</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php
		  if (!isset($_SESSION['username'])) {
		?>
          <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">
              <span class="glyphicon glyphicon-log-in"></span> Login <strong class="caret"></strong>
            </a>
            <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
              <form method="post" action="login.php" accept-charset="UTF-8">
                <input style="margin-bottom: 15px;" type="text" placeholder="Username" 
                id="username" name="username">
                <input style="margin-bottom: 15px;" type="password" placeholder="Password" 
                id="password" name="password">
                <input style="float: left; margin-right: 10px;" type="checkbox" name="remember-me" 
                id="remember-me" value="1">
                <label class="string optional" for="user_remember_me"> Remember me</label>
                <input class="btn btn-primary btn-block" type="submit" id="sign-in" value="Sign In"
                style="margin-bottom: 15px;">
              </form>
            </div>
          </li>
        <?php
		  } else {
		?>
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        <?php
		  }
		?>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>

<div class="container">

  <?php
	//Paginacion
	$cantidadPorPagina = 6;
	$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : null;
	if (!$pagina) {
		$inicio = 0;
		$pagina = 1;
	}
	else {
		$inicio = ($pagina - 1)*$cantidadPorPagina;
	}
	//Establezco la conexion con la BD
	$link = mysqli_connect("localhost", "root");
	mysqli_select_db($link,"atom");
	//Calculo el total de registros
	$query = "select * from productos";
	$result = mysqli_query($link, $query);
	$totalProductos = mysqli_num_rows($result);
	//Calculo el total de paginas
	$totalPaginas = ceil($totalProductos/$cantidadPorPagina);
  ?>
    
  <!--Barra de paginacion-->
  <nav>
    <!-- Add class .pagination-lg for larger blocks or .pagination-sm for smaller blocks-->
    <ul class="pagination">
      <li><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
      <?php
	  	for($i=1; $i<=$totalPaginas; $i++) {
			if ($i==$pagina) {
				echo"<li class='active'><a href='productos.php?pagina=" . $i ."'>" . $i . "</a></li>";
			} else {
				echo"<li><a href='productos.php?pagina=" . $i ."'>" . $i . "</a></li>";
			}
		}
	  ?>      
      <li><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
    </ul>
  </nav>
  
  <?php
	//Mostrar pagina
	$query = "select nombre, precio, detalle from productos limit ". $inicio. ",". $cantidadPorPagina;
	$result = mysqli_query($link, $query);
	$cantidadProductos = mysqli_num_rows($result);
  ?>
  
  <!--Categorias-->
  <div class="col-md-3">
    <h3>Categorias</h3>
  </div>
  
  <!--Productos-->
  <div class="col-md-9">
    <div class="row">
      <?php
        while ($fila = mysqli_fetch_array($result)) {
      ?>
      <div class="col-md-4">
        <div class="thumbnail"><img src="images/productos/crisis.png" alt="Thumbnail Image 1">
          <div class="caption">
            <h3><?php echo($fila['nombre']);?></h3>
            <p>
              <a href="#" class="btn btn-default" role="button">Detalle</a>
              <a href="#" class="btn btn-primary" role="button">Comprar</a>
            </p>
          </div>
        </div>
      </div>
      <?php
        }
        //Libero el conjunto de resultados
        mysqli_free_result($result);
        //Cierro la conexion
        mysqli_close($link);
      ?>
    </div>
  </div>
  
  <footer class="footer">
    <div class="row">
      <div class="col-md-4">
          <h3>Mapa del sitio</h3>
          <ul>
            <li><a href="home.php">Inicio</a></li>
            <li><a href="#">Productos</a></li>
            <li><a href="carrito.php">Carrito</a></li>
            <li><a href="contacto.html">Contacto</a></li>
          </ul>
      </div>
      <div class="col-md-4">
          <h3>Newsletter</h3>
          <p>
            Recibi todas las novedades de nuestro sitio en tu email
          </p>
          <form method="post" action="newsletter" accept-charset="UTF-8">
			<input type="text" placeholder="ejemplo@mimail.com" id="mail" name="mail">
			<input class="btn btn-primary" type="submit" id="send" value="Enviar">
		  </form>
      </div>
      <div class="col-md-4">
          <h3>Datos de contacto</h3>
      </div>
    </div>
  </footer>
  
</div>

<script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
<!-- <script src="js/bootstrap.js" type="text/javascript"></script> -->
<script src="js/bootstrap-3.3.4.js" type="text/javascript"></script>
</body>
</html>