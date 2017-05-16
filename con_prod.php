<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Portal de administrador</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/thumbnail-gallery.css" rel="stylesheet">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
</head>

<body id="page-top" class="index">
  <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
    <div class="container topnav">
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

    <div class="col-lg-12">
      <h1 class="page-header">Inventarios</h1>
    </div>

    <?PHP
    $con=mysqli_connect("localhost","ana","ana","final");
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql="SELECT p.id, p.Nombre, Descripcion, c.nombre, Precio, Cantidad_en_almacen, Fabricante, Origen
    FROM productos p, categorias c
    WHERE p.idCategorias=c.id
    ORDER BY p.id ASC;";

    if (!mysqli_query($con,$sql)) {
      die('Error: ' . mysqli_error($con));
    }else{
      echo '<div class="alert alert-success">';
      echo '<strong>Datos correctamente cargados.</strong>';
      echo '</div>';
    }

    $result = mysqli_query($con,$sql);
    echo "<table class='table'>
    <tr>
    <th>No. Producto</th>
    <th>Nombre</th>
    <th>Descripción</th>
    <th>Categoría</th>
    <th>Precio</th>
    <th>Cantidad en almacen</th>
    <th>Fabricante</th>
    <th>Origen</th>
    </tr>";

    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $row['id'] . "</td>";
      echo "<td>" . $row['Nombre'] . "</td>";
      echo "<td>" . $row['Descripcion'] . "</td>";
      echo "<td>" . $row['nombre'] . "</td>";
      echo "<td>" . $row['Precio'] . "</td>";
      echo "<td>" . $row['Cantidad_en_almacen'] . "</td>";
      echo "<td>" . $row['Fabricante'] . "</td>";
      echo "<td>" . $row['Origen'] . "</td>";
      echo "</tr>";
    }

    mysqli_close($con);
    ?>


    <br><br>
    <TABLE width="100%">
      <tr><td><div align="center"><br><br><br>
      </div></td></tr>

    </TABLE>

  </body>
  <!-- Footer -->
  <footer>

    <div class="row"><br><br><br>
      <div align="center" class="form-group col-xs-6">
        <a href="bases.php" class="button">Cambiar de tabla</a>
      </div>
      <div align="center" class="form-group col-xs-6">
        <a href="productosDB.php" class="button">Cambiar de Operacion</a>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p class="copyright text-muted small">Copyright &copy; Your Company 2017. All Rights Reserved</p>
        </div>
      </div>
    </div>
  </footer>

  </html>
