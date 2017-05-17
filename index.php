<?php
session_start();
//$_SESSION['userid']=0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dessert World</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/landing-page.css" rel="stylesheet">
  <link href="css/thumbnail-gallery.css" rel="stylesheet">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
    <div class="container topnav">
      <div class="navbar-header page-scroll">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Dessert World</a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="catalogo.php">Catálogo</a>
          </li>
          <li>
            <a href="registro.php">Regístrate</a>
          </li>
          <li>
            <a href="#contact">Contacto</a>
          </li>
          <li>
            <?php
            if (!isset($_SESSION['userid'])) {
              echo '<a class="page-scroll" href="#sesion">Iniciar Sesión</a>';
            }else{
              echo "<form action='' method='post'>";
              echo '<button type="submit" name="cerrar" class="btn btn-link" style:"text-decoration:none;">Cerrar Sesión</button>';
              echo "</form>";

              if(isset($_POST['cerrar'])){
                session_destroy();
                $_SESSION['userid']=='';
                echo "<script>window.location.href='index.php';</script>";
              }
            }
            ?>
          </li>
          <li>
            <?php
            if (isset($_SESSION['userid'])) {
              echo '<div id="carrito" style="display:inline;">';
            }else{
              echo '<div id="carrito" style="display:none;">';
            }
            ?>
            <div id="carrito">
              <a href="carrito.php">Mi carrito <span class="glyphicon glyphicon-shopping-cart"></span></a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <a name="about"></a>
  <div class="intro-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="intro-message">
            <h1>Dessert World</h1>
            <h3>La mejor tienda de postres</h3>
            <hr class="intro-divider">
            <ul class="list-inline intro-social-buttons">
              <li>
                <a href="https://twitter.com/" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
              </li>
              <li>
                <a href="https://www.facebook.com/" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Content -->
  <a  name="services"></a>
  <div class="content-section-a">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-sm-6">
          <hr class="section-heading-spacer">
          <div class="clearfix"></div>
          <h2 class="section-heading">Nuestro catálogo:</h2>
          <p class="lead">Visita nuestro <a  href="catalogo.php">catálogo</a> para conocer todos nuestros productos.</p>
        </div>
        <div class="col-lg-5 col-lg-offset-2 col-sm-6">
          <img class="img-responsive" src="img/catalogo.jpg" alt="">
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-section-a -->

  <div class="content-section-b">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
          <hr class="section-heading-spacer">
          <div class="clearfix"></div>
          <h2 class="section-heading">Regístrate</h2>
          <p class="lead">Si aun no estás registrado, puedes hacerlo ahora <a href="registro.php">aquí</a> para disfrutar de nuestro servicio.</p>
        </div>
        <div class="col-lg-5 col-sm-pull-6  col-sm-6">
          <img class="img-responsive" src="img/registro.jpg" alt="">
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-section-b -->

  <?php
  if (!isset($_SESSION['userid'])) {
    echo '<section id="sesion" style="display:inline;">';
  }else{
    echo '<section id="sesion" style="display:none;">';
  }
  ?>

  <section id="sesion">
    <div class="content-section-a">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-sm-6">
            <hr class="section-heading-spacer">
            <div class="clearfix"></div>
            <h2 class="section-heading">Inicia sesión</h2>
            <p class="lead">Si ya eres un usuario registrado inicia sesión</p><br>
            <form action="" method="post" name="sentMessage" id="contactForm">
              <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                  <label>Correo electrónico</label>
                  <input type="email" class="form-control" placeholder="ejemplo@dominio.com" name="email" id="email"
                  required data-validation-required-message="Por favor ingresa tu dirección de correo eletrónico.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                  <label>Contraseña</label>
                  <input type="password" class="form-control" placeholder="********" name="password" id="password"
                  required data-validation-required-message="Intorduce tu contraseña">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <br>
              <div id="success"></div>
              <div class="row">
                <div class="form-group col-xs-12">
                  <button type="submit" name="entrar" class="btn btn-success btn-lg">Entrar</button></button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-lg-5 col-lg-offset-2 col-sm-6">
            <img class="img-responsive" src="img/login.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="contact">
    <div class="banner">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2>Contáctanos:</h2>
          </div>
          <div class="col-lg-6">
            <ul class="list-inline banner-social-buttons">
              <li>
                <a href="https://twitter.com/" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
              </li>
              <li>
                <a href="https://www.facebook.com/" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>


  <?php
  if(isset($_POST['entrar'])){
    $con=mysqli_connect("localhost","ana","ana","final");
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    // escape variables for security
    $correo = $_POST['email'];
    $contrasena = $_POST['password'];
    $auth1 = mysqli_query($con,"SELECT id FROM usuarios WHERE Correo='$correo';");
    if(mysqli_num_rows($auth1)>0) {
      $auth2 = mysqli_query($con,"SELECT id FROM usuarios WHERE Correo='$correo' AND Contrasena='$contrasena';");
      if(mysqli_num_rows($auth2)>0) {
        while($row = mysqli_fetch_array($auth2)) {
          $_SESSION["userid"] = $row['id'];
        }
        echo "<script>window.location.href='index.php';</script>";
      }else{
        echo "Tu contraseña es incorrecta";
      }
    }else{
      echo "Usuario no valido";
    }
  }
  ?>
  <!-- /.banner -->

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
              <a href="nosotros.php">Acerca de nosotros</a>
            </li>
          </ul>
          <p class="copyright text-muted small">Copyright &copy; Your Company 2017. All Rights Reserved</p>
        </div>
      </div>
    </div>
  </footer>
  <!-- jQuery -->
  <script src="js/jquery.js"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>

</body>
</html>
