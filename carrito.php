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
        <li><a href="home.php">Inicio</a></li>
        <li><a href="productos.php">Productos</a></li>
        <li class="active"><a href="#">Carrito<span class="sr-only">(current)</span></a></li>
        <li><a href="contacto.php">Contacto</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php
		  if (!isset($_SESSION['username'])) {
		?>
          <li class="dropdown">
          	<a class="dropdown-toggle" href="#" data-toggle="dropdown">
              <span class="glyphicon glyphicon-user"></span> Sign Up <strong class="caret"></strong>
            </a>
            <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
              <form method="post" action="login.php" accept-charset="UTF-8">
                <input style="margin-bottom: 15px;" type="text" placeholder="Username" 
                id="username" name="username">
                <input style="margin-bottom: 15px;" type="text" placeholder="Email" 
                id="email" name="email">
                <input style="margin-bottom: 15px;" type="password" placeholder="Password" 
                id="password" name="password">
                <input style="margin-bottom: 15px;" type="password" placeholder="Password" 
                id="re-password" name="re-password">
                <input class="btn btn-primary btn-block" type="submit" id="sign-in" value="Registrarse"
                style="margin-bottom: 15px;">
              </form>
            </div>
          </li>
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
                <input class="btn btn-primary btn-block" type="submit" id="sign-in" value="Ingresar"
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

  <footer class="footer well">
    <div class="row">
      <div class="col-md-4">
          <h3>Mapa del sitio</h3>
          <ul>
            <li><a href="home.php">Inicio</a></li>
            <li><a href="productos.php">Productos</a></li>
            <li><a href="#">Carrito</a></li>
            <li><a href="contacto.php">Contacto</a></li>
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
        <p><span class="glyphicon glyphicon-map-marker"></span> Zeballos 1341, Rosario, Argentina</p>
        <p>+54 (0341) 448 0158</p>
        <p>www.atom.com.ar</p>
      </div>
    </div>
  </footer>
  
</div>

<script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
</body>
</html>
