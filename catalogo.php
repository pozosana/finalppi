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

  <title>Catálogo de postres</title>
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
  <?php
  $con=mysqli_connect("localhost","ana","ana","final");
  // Check connection
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  mysql_set_charset('utf8');
  ?>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Catálogo</h1>
      </div>

      <?php
      if (isset($_SESSION['userid'])) {
        echo '<style>
        #add{
          visibility: visible;
        }
        </style>';
      }else{
        echo '<style>
        #add{
          visibility: hidden;
        }
        </style>';
      }
      ?>

      <?php
      $result = mysqli_query($con,"SELECT * FROM Productos ORDER BY idCategorias;");
      while($row = mysqli_fetch_array($result)) {
        echo '<div class="col-md-3 thumb" style="height:500px;">';
        echo '<a class="thumbnail" href="sgcmb.html">';
        echo '<img class="img-responsive" src="img/' . $row['Foto'] . '" alt="" style="height:220px;">';
        echo '</a>';
        echo '<h3>' . $row['Nombre']. '</h3>';
        echo '<h5>' . $row['Descripcion']. '</h5>';
        echo '<h4 style="position:absolute; bottom:75px; left:210px;">$ ' . $row['Precio']. '</h4>';
        echo "<form action='' method='post'>";
        echo '<div id="add" align="center"><button id="add" type="submit" class="btn btn-primary" name="comprar" style="position:absolute;
        bottom:40px;">Añadir al carrito</button></div>';
        echo "<input type='hidden' name='producto' value='" . $row['id'] . "'></input>";
        echo "</form>";
        echo '</div>';
      }
      mysqli_close($con);
      ?>

      <?php
      if(isset($_POST['comprar'])){
        $con=mysqli_connect("localhost","ana","ana","final");
        // Check connection
        if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        // escape variables for security
        $idP = $_POST['producto'];
        $sql=mysqli_query($con,"SELECT Cantidad FROM carrito WHERE idUsuarios={$_SESSION['userid']} AND idProductos=$idP;");
        if(mysqli_num_rows($sql)>0) {
          $sql1=mysqli_query($con,"UPDATE carrito SET Cantidad=Cantidad+1
            WHERE idUsuarios={$_SESSION['userid']} AND idProductos=$idP;");
          } else {
            $sql2=mysqli_query($con,"INSERT INTO carrito(idUsuarios, idProductos, Cantidad)
            VALUES ({$_SESSION['userid']}, $idP, 1);");
          }
          if (!$sql) {
            die('Error: ' . mysqli_error($con));
          }
          mysqli_close($con);
        }
        ?>

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
      <?
      mysqli_close($con);
      ?>
    </body>
    </html>
