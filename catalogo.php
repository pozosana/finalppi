<!DOCTYPE html>
<html lang="es">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Catálogo de postres</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/thumbnail-gallery.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
              <a class="navbar-brand" href="index.html">Dessert World</a>
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
                      <a class="page-scroll" href="index.html#sesion">Iniciar Sesión</a>
                  </li>
                  <li>
                      <a href="index.html#contact">Contacto</a>
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
                $result = mysqli_query($con,"SELECT * FROM Productos ORDER BY idCategorias;");
                    while($row = mysqli_fetch_array($result)) {
                      echo '<div class="col-md-3 thumb">';
                          echo '<a class="thumbnail" href="sgcmb.html">';
                              echo '<img class="img-responsive" src="img/' . $row['Foto'] . '" alt="">';
                          echo '</a>';
                          echo '<h4>' . $row['Nombre']. '</h3>';
                          echo '<h5>' . $row['Descripcion']. '</h2>';
                          echo '<h5>' . $row['Precio']. '</h2>';
                      echo '</div>';
                    }

                mysqli_close($con);
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

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <?
      mysqli_close($con);
    ?>

</body>

</html>
