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
        <a class="navbar-brand" href="index.php">Dessert World</a>
      </div>
    </div>
  </nav>

<body id="page-top" class="index">

  <div class="col-lg-12">
      <h1 class="page-header">Productos</h1>
  </div>

  <br><br>
  <TABLE width="100%">
  <tr><td><div align="center">¿Qué operación deseas realizar?</div></td></tr>

  <tr><td><div align="center"><br>
  <FORM METHOD=post ACTION="ins_prod.php">
   <input type="submit" name="boton" value="Añadir un producto">
  </FORM>
  </div></td></tr>

  <tr><td><div align="center"><br>
  <FORM METHOD=post ACTION="cam_prod.php">
   <input type="submit" name="boton" value="Cambiar un producto">
  </FORM>
  </div></td></tr>

  <tr><td><div align="center"><br>
  <FORM METHOD=post ACTION="con_prod.php">
   <input type="submit" name="boton" value="Consultar inventario">
  </FORM>
  </div></td></tr>

  <tr><td><div align="center"><br><br><br><br><br><br><br><br>
  <FORM METHOD=post ACTION="bases.php">
   <input type="submit" name="boton" value="Cambiar de tabla">
  </FORM>
  </div></td></tr>

  </TABLE>

  </body>
  <!-- Footer -->
  <footer>

    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p class="copyright text-muted small">Copyright &copy; Your Company 2017. All Rights Reserved</p>
        </div>
      </div>
    </div>
  </footer>

  </html>
