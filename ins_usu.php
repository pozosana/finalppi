<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Portal de administrador</title>

  <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="css/thumbnail-gallery.css" rel="stylesheet">
  <!-- Custom Fonts -->
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body id="page-top" class="index">
  <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
    <div class="container topnav">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header page-scroll">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Dessert World</a>
      </div>
    </div>
  </nav>

  <body id="page-top" class="index">

    <div class="col-lg-12">
      <h1 class="page-header">Usuarios</h1>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <form action="" method="post" name="sentMessage" id="contactForm" onsubmit="return validateForm()">
            <!--<p><span class="error">* Campo requerido</span></p>-->
            <div class="row control-group">
              <div class="form-group col-xs-12 floating-label-form-group controlss">
                <label>Nombre</label>
                <input type="text" class="form-control" placeholder="Nombre Apellido" id="nombre" name="nombre" required data-validation-required-message="Por favor ingresa tu nombre">
              </div>
            </div>
            <div class="row control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Correo electrónico</label>
                <input type="email" class="form-control" placeholder="ejemplo@dominio.com" id="correo" name="correo" required data-validation-required-message="Por favor ingresa tu correo electrónico">
              </div>
            </div>
            <div class="row control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Contraseña</label>
                <input type="password" class="form-control" placeholder="********" id="contrasena" name="contrasena" required data-validation-required-message="Por favor ingresa una contraseña para tu cuenta">
              </div>
            </div>
            <div class="row control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label for="fecha">Fecha de nacimiento</label>
                <input type="date" class="form-control" placeholder="dd/mm/aaaa" id="nacimiento" name="nacimiento" required data-validation-required-message="Por favor ingresa tu fecha de nacimiento">
              </div>
            </div>
            <div class="row control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Numero de tarjeta</label>
                <input type="number" class="form-control" placeholder="XXXX-XXXX-XXXX-XXXX" id="tarjeta" name="tarjeta" required data-validation-required-message="Por favor ingresa el número de tu tarjeta">
              </div>
            </div>
            <div class="row control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Código postal</label>
                <input type="number" class="form-control" placeholder="XXXXX" id="codigo" name="codigo" required data-validation-required-message="Por favor ingresa tu código postal">
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="row">
              <div class="form-group col-xs-12">
                <input type="submit" name="boton" value="Registrar usuario">
              </div>
            </div>
            <div class="row"><br><br><br>
              <div align="center" class="form-group col-xs-6">
                <a href="bases.php" class="button">Cambiar de tabla</a>
              </div>
              <div align="center" class="form-group col-xs-6">
                <a href="usuariosDB.php" class="button">Cambiar de Operacion</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <?PHP
    if(isset($_POST['Ingresar'])){
      $con=mysqli_connect("localhost","ana","ana","final");
      // Check connection
      if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      // escape variables for security
      $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
      $correo = mysqli_real_escape_string($con, $_POST['correo']);
      $contrasena = mysqli_real_escape_string($con, $_POST['contrasena']);
      $nacimiento = mysqli_real_escape_string($con, $_POST['nacimiento']);
      $tarjeta = mysqli_real_escape_string($con, $_POST['tarjeta']);
      $codigo = mysqli_real_escape_string($con, $_POST['codigo']);

        $sql="INSERT INTO Usuarios (id, Nombre, Correo, Contrasena, Nacimiento, Tarjeta, CodigoPostal)
        VALUES (NULL, '$nombre', '$correo', '$contrasena', '$nacimiento', '$tarjeta', '$codigo');";

        if (!mysqli_query($con,$sql)) {
          die('Error: ' . mysqli_error($con));
        }else{
          $_POST = array();
        }
      mysqli_close($con);
      ?>


  </body>
  <!-- Footer -->
  <footer>

    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <ul class="list-inline">
            <li>
              <a href="#">Home</a>
            </li>
            <li class="footer-menu-divider">&sdot;</li>
            <li>
              <a href="#about">Acerca de nosotros</a>
            </li>
            <li class="footer-menu-divider">&sdot;</li>
            <li>
              <a href="#services">Servicios</a>
            </li>
            <li class="footer-menu-divider">&sdot;</li>
            <li>
              <a href="#contact">Contacto</a>
            </li>
          </ul>
          <p class="copyright text-muted small">Copyright &copy; Your Company 2017. All Rights Reserved</p>
        </div>
      </div>
    </div>
  </footer>

  </html>
