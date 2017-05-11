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
      <h1 class="page-header">Productos</h1>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <form action="" method="post" name="sentMessage" id="contactForm" onsubmit="return validateForm()">
            <!--<p><span class="error">* Campo requerido</span></p>-->
            <div class="row control-group">
              <div class="form-group col-xs-12 floating-label-form-group controlss">
                <label>Nombre</label>
                <input type="text" class="form-control" placeholder="Nombre del producto" id="nombre" name="nombre"
                required data-validation-required-message="Por favor ingresa el nombre del producto">
              </div>
            </div>
            <div class="row control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Descripción</label>
                <textarea form="contactForm" class="form-control" name="descripcion" id="descripcion" cols="55" wrap="soft"></textarea>
              </div>
            </div>
            <div class="row control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Categoría</label><br>
                <input type="radio" name="idC" value="6"> Pasteles<br>
                <input type="radio" name="idC" value="7"> Brownies y Galletas<br>
                <input type="radio" name="idC" value="8"> Pies y tartas<br>
                <input type="radio" name="idC" value="9"> Panadería<br>
              </div>
            </div>
            <div class="row control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label for="fecha">Nombre de la foto</label>
                <input type="text" class="form-control" placeholder="nombre.formato" id="foto" name="foto"
                required data-validation-required-message="Por favor ingresa el nombre de la foto">
              </div>
            </div>
            <div class="row control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Precio</label>
                <input type="number" step="0.01" class="form-control" placeholder="00.00" id="precio" name="precio"
                required data-validation-required-message="Ingresa el precio de venta del producto">
              </div>
            </div>
            <div class="row control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Cantidad en almacen</label>
                <input type="number" class="form-control" placeholder="00" id="cantidad" name="cantidad"
                required data-validation-required-message="Por favor ingresa la cantidad de producto que existe en almacen">
              </div>
            </div>

            <div class="row control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Fabricante</label>
                <input type="text" class="form-control" placeholder="Nombre del fabricante" id="fabricante" name="fabricante"
                required data-validation-required-message="Por favor ingresa el nombre del fabricante">
              </div>
            </div>
            <div class="row control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Origen</label>
                <input type="text" class="form-control" placeholder="País de origen" id="origen" name="origen"
                required data-validation-required-message="Por favor ingresa el país de origen">
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="row">
              <div class="form-group col-xs-12">
                <input type="submit" name="submit" value="Ingresar producto">
              </div>
            </div>
            <div class="row"><br><br><br>
              <div align="center" class="form-group col-xs-6">
                <a href="bases.php" class="button">Cambiar de tabla</a>
              </div>
              <div align="center" class="form-group col-xs-6">
                <a href="productosDB.php" class="button">Cambiar de Operacion</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <?PHP
    if(isset($_POST['submit'])){
      $con=mysqli_connect("localhost","ana","ana","final");
      // Check connection
      if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      // escape variables for security
      $nombre = $_POST['nombre'];
      $descripcion = $_POST['descripcion'];
      $idCat = $_POST['idC'];
      $foto = $_POST['foto'];
      $precio = $_POST['precio'];
      $cantidad = $_POST['cantidad'];
      $fabricante = $_POST['fabricante'];
      $origen = $_POST['origen'];

      $sql="INSERT INTO Productos (id, Nombre, Descripcion, idCategorias, Foto, Precio, Cantidad_en_almacen, Fabricante, Origen)
      VALUES (NULL, '$nombre', '$descripcion', '$idCat', '$foto', '$precio', '$cantidad', '$fabricante', '$origen');";

      if (!mysqli_query($con,$sql)) {
        die('Error: ' . mysqli_error($con));
      }else{
        echo '<div class="alert alert-success">';
        echo '<strong>Tus datos fueron agregados exitosamente</strong>';
        echo '</div>';
        $_POST = array();
      }
      mysqli_close($con);
    }
    ?>


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
