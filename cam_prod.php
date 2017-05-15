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

  $sql_cat="SELECT * FROM categorias;";
  $sql_pro="SELECT * FROM productos;";
  $categorias=mysqli_query($con,$sql_cat);
  $productos=mysqli_query($con,$sql_pro);
  if (!mysqli_query($con,$sql_cat) || !mysqli_query($con,$sql_pro)) {
    die('Error: ' . mysqli_error($con));
  }else{
    echo '<div class="alert alert-success">';
    echo '<strong>Categorias correctamente cargadas.</strong>';
    echo '</div>';
  }
  $catR=mysqli_num_rows($categorias);
  $catC=mysqli_num_fields($categorias);
  $proR=mysqli_num_rows($productos);
  $proC=mysqli_num_fields($productos);
  ?>

    <form action="" method="post" name="sentMessage" id="contactForm" onsubmit="return validateForm()">
    <table class="table" width="80%">
      <tr>
        <th colspan="2">Selecciona el producto</th>
      </tr>
      <tr><td colspan="2"><div align="center">
        <select name="id" size="5">
          <?PHP
          while($row = mysqli_fetch_assoc($productos)) {
              $option .= '<option value = "'.$row['id'].'">'.$row['nombre'].'</option>';
          }
          ?>
        </select></div></td></tr>
        <tr>
          <th>Cambiar</th>
          <th>Nueva información</th>
        </tr>
        <tr>
          <td align="center"><input name="op[]" type="checkbox" value="nombre"/></td>
          <td>Nombre:<input name="nombre_text" size="30" type="text"/></td>
        </tr>
        <tr>
          <td align="center"><input name="op[]" value="descripcion" type="checkbox"/></td>
          <td>Descripción:<textarea form="contactForm" class="form-control" name="descripcion" id="descripcion" cols="55" wrap="soft"></textarea></td>
        </tr>
        <tr>
          <td align="center"><input name="op[]" value="tnum" type="checkbox"/></td>
          <td align="left">Categorías:<br>
            <input type="radio" name="idC" value="6"> Pasteles<br>
            <input type="radio" name="idC" value="7"> Brownies y Galletas<br>
            <input type="radio" name="idC" value="8"> Pies y tartas<br>
            <input type="radio" name="idC" value="9"> Panadería<br>
          </td>
        </tr>
        <tr>
          <td align="center"><input name="op[]" type="checkbox" value="nombre"/></td>
          <td>Nombre de foto:<input name="nombre_text" size="30" type="text"/></td>
        </tr>
        <tr>
          <td align="center"><input name="op[]" type="checkbox" value="precio"/></td>
          <td>Precio:<input name="nombre_text" size="30" type="number"/></td>
        </tr>
        <tr>
          <td align="center"><input name="op[]" type="checkbox" value="cantidad"/></td>
          <td>Cantidad en almacen:<input name="nombre_text" size="30" type="number" step="0.01"/></td>
        </tr>
        <tr>
          <td align="center"><input name="op[]" type="checkbox" value="fabricante"/></td>
          <td>Fabricante:<input name="nombre_text" size="30" type="text"/></td>
        </tr>
        <tr>
          <td align="center"><input name="op[]" type="checkbox" value="origen"/></td>
          <td>Origen:<input name="nombre_text" size="30" type="text"/></td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <br><input name="cambiar" type="submit" value="Cambiar">
          </td>
        </tr>
      </table>




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
