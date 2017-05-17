<?php
session_start();
//$_SESSION["userid"] = 24;
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Quiénes somos</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/thumbnail-gallery.css" rel="stylesheet">
</head>

<body>
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
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
  </nav>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Quiénes somos</h1>
      </div>

      <div class="content">
          <div class="field field-name-body field-type-text-with-summary field-label-hidden">
            <div class="field-items">
              <div class="field-item even" property="content:encoded">
      <p>Descubre la historia de Dessert World y entérate como desde 1884
        <strong>somos una pastelería que te ofrece variedad en pan</strong>
        dulce, así como de pan salado recién horneado y una deliciosa línea de pasteles.</p>
      <p> <strong>Gracias a ti, hoy contamos con más de 250 puntos de venta.</strong></p>
      </div></div></div>  </div>
      <img class="img-responsive" src="img/nosotros.jpg" alt="">

    </div>
    <hr>
    <!-- /.container -->

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
                <a href="#">Acerca de nosotros</a>
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
    <?
    mysqli_close($con);
    ?>
  </body>
  </html>
