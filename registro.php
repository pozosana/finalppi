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

  <title>Regístrate</title>

  <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="css/thumbnail-gallery.css" rel="stylesheet">
  <!-- Custom Fonts -->
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <style>
  .error {color: #FF0000;}
  </style>

  <script>
  function validateForm() {
    var x = document.forms["sentMessage"]["nombre"].value;
    if (<?!preg_match("/^[a-zA-Z]*$/",?>.$x.<?);?>) {
      //$nombreErr = "Solo se permiten letras y espacios en blanco";
      alert("Solo se permiten letras y espacios en blanco");
      return false;
    }
  }
  </script>
</head>

<body id="page-top" class="index">
  <!-- Navigation -->
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
        <a class="navbar-brand" href="index.php">Dessert World</a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="catalogo.php">Catálogo</a>
          </li>
          <li>
            <a href="registro.php">Regístrate</a>
          </li>
          <li>
              <a href="index.php#contact">Contacto</a>
          </li>
          <li>
            <?php
            if (!isset($_SESSION['userid'])) {
              echo '<a class="page-scroll" href="index.php#sesion">Iniciar Sesión</a>';
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

  <br>

  <!-- Contact Section -->
  <section id="contact">
    <?php
    $nombreErr = $correoErr = $contrasenaErr = $nacimientoErr = $tarjetaErr = $codigoErr = "";
    $nombre = $correo = $contrasena = $nacimiento = $tarjeta = $codigo = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      echo "Hola 2";
      $nombre = test_input($_POST["nombre"]);
      if (!preg_match("/^[a-zA-Z]*$/",$nombre)) {
        $nombreErr = "Solo se permiten letras y espacios en blanco";
        echo $nombreErr;
      }
      $correo = test_input($_POST["correo"]);
      if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $correoErr = "Formato de correo no válido";
      }
      $contrasena = test_input($_POST["contrasena"]);
      $nacimiento = test_input($_POST["nacimiento"]);
      if ($nacimiento>date()) {
        $nacimientoErr = "Tu fecha de nacimiento no es válida";
      }
      $tarjeta = test_input($_POST["tarjeta"]);
      if (!preg_match("/^[1-9][0-9]{15,16}$/",$tarjeta)) {
        $tarjetaErr = "Solo se permiten máximo 16 dígitos";
      }
      $codigo = test_input($_POST["codigo"]);
      if (!filter_var($codigo, FILTER_VALIDATE_INT) || $codigo<0) {
        $codigoErr = "Formato de código postal no válido";
      }
    }
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    ?>

    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2>Regístrate</h2>
          <hr class="star-primary">
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <form action="validar.php" method="post" name="sentMessage" id="contactForm" onsubmit="return validateForm()">
            <!--<p><span class="error">* Campo requerido</span></p>-->
            <div class="row control-group">
              <div class="form-group col-xs-12 floating-label-form-group controlss">
                <label>Nombre</label>
                <input type="text" value="<?php echo $nombre;?>" class="form-control" placeholder="Nombre Apellido" id="nombre" name="nombre" required data-validation-required-message="Por favor ingresa tu nombre">
                <span class="error"><?php echo $nombreErr;?></span>
              </div>
            </div>
            <div class="row control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Correo electrónico</label>
                <input type="email" value="<?php echo $correo;?>" class="form-control" placeholder="ejemplo@dominio.com" id="correo" name="correo" required data-validation-required-message="Por favor ingresa tu correo electrónico">
                <span class="error"><?php echo $correoErr;?></span>
              </div>
            </div>
            <div class="row control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Contraseña</label>
                <input type="password" class="form-control" placeholder="********" id="contrasena" name="contrasena" required data-validation-required-message="Por favor ingresa una contraseña para tu cuenta">
                <span class="error"><?php echo $contrasenaErr;?></span>
              </div>
            </div>
            <div class="row control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label for="fecha">Fecha de nacimiento</label>
                <input type="date" value="<?php echo $nacimiento;?>" class="form-control" placeholder="dd/mm/aaaa" id="nacimiento" name="nacimiento" required data-validation-required-message="Por favor ingresa tu fecha de nacimiento">
                <span class="error"><?php echo $nacimientoErr;?></span>
              </div>
            </div>
            <div class="row control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Numero de tarjeta</label>
                <input type="number" value="<?php echo $tarjeta;?>" class="form-control" placeholder="XXXX-XXXX-XXXX-XXXX" id="tarjeta" name="tarjeta" required data-validation-required-message="Por favor ingresa el número de tu tarjeta">
                <span class="error"><?php echo $tarjetaErr;?></span>
              </div>
            </div>
            <div class="row control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Código postal</label>
                <input type="number" value="<?php echo $codigo;?>"class="form-control" placeholder="XXXXX" id="codigo" name="codigo" required data-validation-required-message="Por favor ingresa tu código postal">
                <span class="error">
                  <?php echo $codigoErr;?></span>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="row">
              <div class="form-group col-xs-12">
                <button type="submit" name="submit" value="submit" class="btn btn-success btn-lg">¡Registrarme!</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <ul class="list-inline">
              <li>
                  <a href="index.php">Home</a>
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

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-top page-scroll visible-xs visible-sm">
    <a class="btn btn-primary" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>

  <!-- Portfolio Modals -->
  <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
      <div class="close-modal" data-dismiss="modal">
        <div class="lr">
          <div class="rl">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="modal-body">
              <h2>Project Title</h2>
              <hr class="star-primary">
              <img src="img/portfolio/cabin.png" class="img-responsive img-centered" alt="">
              <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
              <ul class="list-inline item-details">
                <li>Client:
                  <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                  </strong>
                </li>
                <li>Date:
                  <strong><a href="http://startbootstrap.com">April 2014</a>
                  </strong>
                </li>
                <li>Service:
                  <strong><a href="http://startbootstrap.com">Web Development</a>
                  </strong>
                </li>
              </ul>
              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
      <div class="close-modal" data-dismiss="modal">
        <div class="lr">
          <div class="rl">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="modal-body">
              <h2>Project Title</h2>
              <hr class="star-primary">
              <img src="img/portfolio/cake.png" class="img-responsive img-centered" alt="">
              <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
              <ul class="list-inline item-details">
                <li>Client:
                  <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                  </strong>
                </li>
                <li>Date:
                  <strong><a href="http://startbootstrap.com">April 2014</a>
                  </strong>
                </li>
                <li>Service:
                  <strong><a href="http://startbootstrap.com">Web Development</a>
                  </strong>
                </li>
              </ul>
              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
      <div class="close-modal" data-dismiss="modal">
        <div class="lr">
          <div class="rl">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="modal-body">
              <h2>Project Title</h2>
              <hr class="star-primary">
              <img src="img/portfolio/circus.png" class="img-responsive img-centered" alt="">
              <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
              <ul class="list-inline item-details">
                <li>Client:
                  <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                  </strong>
                </li>
                <li>Date:
                  <strong><a href="http://startbootstrap.com">April 2014</a>
                  </strong>
                </li>
                <li>Service:
                  <strong><a href="http://startbootstrap.com">Web Development</a>
                  </strong>
                </li>
              </ul>
              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
      <div class="close-modal" data-dismiss="modal">
        <div class="lr">
          <div class="rl">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="modal-body">
              <h2>Project Title</h2>
              <hr class="star-primary">
              <img src="img/portfolio/game.png" class="img-responsive img-centered" alt="">
              <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
              <ul class="list-inline item-details">
                <li>Client:
                  <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                  </strong>
                </li>
                <li>Date:
                  <strong><a href="http://startbootstrap.com">April 2014</a>
                  </strong>
                </li>
                <li>Service:
                  <strong><a href="http://startbootstrap.com">Web Development</a>
                  </strong>
                </li>
              </ul>
              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
      <div class="close-modal" data-dismiss="modal">
        <div class="lr">
          <div class="rl">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="modal-body">
              <h2>Project Title</h2>
              <hr class="star-primary">
              <img src="img/portfolio/safe.png" class="img-responsive img-centered" alt="">
              <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
              <ul class="list-inline item-details">
                <li>Client:
                  <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                  </strong>
                </li>
                <li>Date:
                  <strong><a href="http://startbootstrap.com">April 2014</a>
                  </strong>
                </li>
                <li>Service:
                  <strong><a href="http://startbootstrap.com">Web Development</a>
                  </strong>
                </li>
              </ul>
              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
      <div class="close-modal" data-dismiss="modal">
        <div class="lr">
          <div class="rl">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="modal-body">
              <h2>Project Title</h2>
              <hr class="star-primary">
              <img src="img/portfolio/submarine.png" class="img-responsive img-centered" alt="">
              <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
              <ul class="list-inline item-details">
                <li>Client:
                  <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                  </strong>
                </li>
                <li>Date:
                  <strong><a href="http://startbootstrap.com">April 2014</a>
                  </strong>
                </li>
                <li>Service:
                  <strong><a href="http://startbootstrap.com">Web Development</a>
                  </strong>
                </li>
              </ul>
              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="js/jquery.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
  <script src="js/classie.js"></script>
  <script src="js/cbpAnimatedHeader.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom Theme JavaScript -->
  <script src="js/freelancer.js"></script>

</body>

</html>
