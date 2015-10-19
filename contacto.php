<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Jugueteria Atom</title>

<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
  var map;
  var atom = new google.maps.LatLng(-32.95450080973386,-60.643769665033005);

  function initialize() {
	var mapDiv = document.getElementById('googleMap');
	var mapProp = {
	  center:atom,
	  zoom:15,
	  disableDefaultUI:true, 
	  panControl:true,
      zoomControl:true,
	  streetViewControl:true,
	  mapTypeId:google.maps.MapTypeId.ROADMAP
	};
	var map=new google.maps.Map(mapDiv,mapProp);
	// Create a DIV to hold the control and call HomeControl()
	var homeControlDiv = document.createElement('div');
	var homeControl = new HomeControl(homeControlDiv, map);
	map.controls[google.maps.ControlPosition.TOP_RIGHT].push(homeControlDiv);
	
	var infowindow = new google.maps.InfoWindow({
	  content:"Jugueteria Atom"
	});
	
	var marker=new google.maps.Marker({
	  position:mapProp.center
	});
  
	marker.setMap(map);
	
	google.maps.event.addListener(marker,'click',function() {
	  map.setZoom(mapProp.zoom);
	  map.setCenter(mapProp.center);
	  infowindow.open(map,marker);
	});
  }
  
  // Add a Home control that returns the user to London
  function HomeControl(controlDiv, map) {
	controlDiv.style.padding = '5px';
	var controlUI = document.createElement('div');
	controlUI.style.backgroundColor = 'white';
	controlUI.style.border='1px solid';
	controlUI.style.cursor = 'pointer';
	controlUI.style.textAlign = 'center';
	controlUI.title = 'Ir a Atom';
	controlDiv.appendChild(controlUI);
	var controlText = document.createElement('div');
	controlText.style.fontFamily='Arial,sans-serif';
	controlText.style.fontSize='12px';
	controlText.style.paddingLeft = '4px';
	controlText.style.paddingRight = '4px';
	controlText.innerHTML = '<b>Ir a Atom<b>'
	controlUI.appendChild(controlText);
  
	// Setup click-event listener: simply set the map to London
	google.maps.event.addDomListener(controlUI, 'click', function() {
	  map.setZoom(15);
	  map.setCenter(atom);
	});
  }
  
  google.maps.event.addDomListener(window, 'load', initialize);

</script>

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
        <li><a href="home.php">Inicio</span></a></li>
        <li><a href="productos.php">Productos</a></li>
        <li><a href="carrito.php">Carrito</a></li>
        <li class="active"><a href="#">Contacto<span class="sr-only">(current)</span></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php
		  if (!isset($_SESSION['id'])) {
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

<div class="container well">

  <div class="col-md-5">
    <h2>Envianos un mensaje</h2>
    <hr>
      <form role="form" method="post" action="constula" accept-charset="utf-8">
        <div class="form-group">
          <label for="nombre">Nombre:</label>
          <input type="text" class="form-control" id="nombre">
        </div>
        <div class="form-group">
          <label for="telefono">Telefono:</label>
          <input type="text" class="form-control" id="telefono">
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email">
        </div>
        <div class="form-group">
          <label for="consulta">Consulta:</label>
          <textarea class="form-control" rows="5" id="consulta"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
  </div>
  
  <div class="col-md-7">
    <h2>Donde estamos</h2>
    <hr>
    <div id="googleMap" style="width:500px;height:380px;"></div>
  </div>
  
</div>

<div class="container well">
  <footer class="footer">
    <div class="row">
      <div class="col-md-4">
          <h3>Mapa del sitio</h3>
          <ul>
            <li><a href="home.php">Inicio</a></li>
            <li><a href="productos.php">Productos</a></li>
            <li><a href="carrito.php">Carrito</a></li>
            <li><a href="#">Contacto</a></li>
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
