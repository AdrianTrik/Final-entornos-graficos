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
<link href="css/bootstrap.css" rel="stylesheet">

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
        <li class="active"><a href="#">Inicio<span class="sr-only">(current)</span></a></li>
        <li><a href="productos.php">Productos</a></li>
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

  <div id="carousel1" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carousel1" data-slide-to="0" class="active"></li>
      <li data-target="#carousel1" data-slide-to="1"></li>
      <li data-target="#carousel1" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="item active"><img src="images/productos/auto.png" alt="First slide image" class="center-block">
        <div class="carousel-caption">
          <h3>Auto minicooper</h3>
        </div>
      </div>
      <div class="item"><img src="images/productos/triciclo.png" alt="Second slide image" class="center-block">
        <div class="carousel-caption">
          <h3>Triciclo barbie</h3>
        </div>
      </div>
      <div class="item"><img src="images/productos/monopatin.png" alt="Third slide image" class="center-block">
        <div class="carousel-caption">
          <h3>Monopatin 4 ruedas</h3>
        </div>
      </div>
    </div>
      <a class="left carousel-control" href="#carousel1" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel1" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  
  <footer class="footer">
    <div class="row">
      <div class="col-md-4">
          <h3>Mapa del sitio</h3>
          <ul>
            <li><a href="#">Inicio</a></li>
            <li><a href="productos.php">Productos</a></li>
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
<script src="js/bootstrap.js" type="text/javascript"></script>
</body>
</html>
