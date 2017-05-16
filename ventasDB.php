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
      <h1 class="page-header">Ventas</h1>
    </div>

    <?PHP
    $con=mysqli_connect("localhost","ana","ana","final");
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql="SELECT o.id, o.monto_a_pagar, o.fecha_compra, u.correo, p.nombre AS 'Producto', c.nombre, r.cantidad
    FROM ordenes o, ordenes_productos r, productos p, usuarios u, categorias c
    WHERE r.idOrden=o.id AND r.idProductos=p.id AND p.idCategorias=c.id AND u.id=o.idUsuarios
    ORDER BY o.id;";

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
    <th>No. Orden</th>
    <th>Monto a pagar</th>
    <th>Fecha de compra</th>
    <th>Correo del usuario</th>
    <th>Nombre del producto</th>
    <th>Categoría</th>
    <th>Cantidad</th>
    </tr>";

    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $row['id'] . "</td>";
      echo "<td>" . $row['monto_a_pagar'] . "</td>";
      echo "<td>" . $row['fecha_compra'] . "</td>";
      echo "<td>" . $row['correo'] . "</td>";
      echo "<td>" . $row['Producto'] . "</td>";
      echo "<td>" . $row['nombre'] . "</td>";
      echo "<td>" . $row['cantidad'] . "</td>";
      echo "</tr>";
    }

    mysqli_close($con);
    ?>
  </table>

    <div align="center"><br><br><br><br>
    <FORM METHOD=post ACTION="bases.php">
     <input type="submit" name="boton" value="Cambiar de tabla">
    </FORM>
    </div>

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
