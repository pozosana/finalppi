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
    <h1 class="page-header">Actualizar información del producto</h1>
  </div>

  <?PHP
  $con=mysqli_connect("localhost","ana","ana","final");
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $sql_pro="SELECT id, Nombre FROM productos;";
  $productos=mysqli_query($con,$sql_pro);
  if (!mysqli_query($con,$sql_pro)) {
    die('Error: ' . mysqli_error($con));
  }else{
    echo '<div class="alert alert-success">';
    echo '<strong>Categorias correctamente cargadas.</strong>';
    echo '</div>';
  }
  ?>

  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
        <form action="" method="post" name="sentMessage" id="contactForm" onsubmit="return validateForm()">
          <div class="row control-group">
            <div class="form-group col-xs-12 floating-label-form-group controlss">
              <select name="idProd">
                <option value="0">Please Select</option>
                <?php
                while($row = mysqli_fetch_array($productos)) {
                  echo "<option value=" . $row['id'] . ">" . $row['Nombre'] . "</option>";
                }
                ?>
              </select>
            </div>
          </div>
          <div class="row control-group">
            <div class="form-group col-xs-12 floating-label-form-group controlss">
              <input name="op[]" type="checkbox" value="nombre"/>Nombre:
              <input type="text" class="form-control" placeholder="Nombre del producto" name="tnombre">
            </div>
          </div>
          <div class="row control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <input name="op[]" type="checkbox" value="descripcion"/>Descripcion:
              <textarea form="contactForm" class="form-control" name="tdescripcion" cols="55" wrap="soft"></textarea>
            </div>
          </div>
          <div class="row control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <input name="op[]" type="checkbox" value="categoria"/>Categorías:<br>
              <input type="radio" name="idC" value="6" checked> Pasteles<br>
              <input type="radio" name="idC" value="7"> Brownies y Galletas<br>
              <input type="radio" name="idC" value="8"> Pies y tartas<br>
              <input type="radio" name="idC" value="9"> Panadería<br>
            </div>
          </div>
          <div class="row control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <input name="op[]" type="checkbox" value="foto"/>Nombre de la foto:
              <input type="text" class="form-control" placeholder="nombre.formato" name="tfoto">
            </div>
          </div>
          <div class="row control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <input name="op[]" type="checkbox" value="precio"/>Precio:
              <input type="number" step="0.01" class="form-control" placeholder="00.00" name="tprecio">
            </div>
          </div>
          <div class="row control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <input name="op[]" type="checkbox" value="cantidad"/>Cantidad en almacen:
              <input type="number" class="form-control" placeholder="00" name="tcantidad">
            </div>
          </div>

          <div class="row control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <input name="op[]" type="checkbox" value="fabricante"/>Fabricante:
              <input type="text" class="form-control" placeholder="Nombre del fabricante" name="tfabricante">
            </div>
          </div>
          <div class="row control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <input name="op[]" type="checkbox" value="nombre"/>Origen:
              <input type="text" class="form-control" placeholder="País de origen" name="torigen">
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="row">
            <div class="form-group col-xs-12">
              <input type="submit" name="submit" value="Ingresar producto">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php
  if(isset($_POST['submit'])){
    $con=mysqli_connect("localhost","ana","ana","final");
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    // escape variables for security
    $idP = $_POST['idProd'];
    $nombre = trim($_POST['tnombre']);
    $descripcion = $_POST['tdescripcion'];
    $idCat = $_POST['idC'];
    $foto = trim($_POST['tfoto']);
    $precio = $_POST['tprecio'];
    $cantidad = trim($_POST['tcantidad']);
    $fabricante = trim($_POST['tfabricante']);
    $origen = trim($_POST['torigen']);
    $chk = $_POST["op"];

    foreach ($chk as $opcion) {
      switch ($opcion) {
        case "nombre":
        $a_actualizar="UPDATE productos SET Nombre='$nombre' WHERE id=$idP;";
        $b_actualizar=mysqli_query($con, $a_actualizar);
        break;
        case "descripcion":
        $a_actualizar="UPDATE productos SET Descripcion='$descripcion' WHERE id=$idP;";
        $b_actualizar=mysqli_query($con, $a_actualizar);
        break;
        case "categoria":
        $a_actualizar="UPDATE productos SET idCategorias='$idCat' WHERE id=$idP;";
        $b_actualizar=mysqli_query($con, $a_actualizar);
        break;
        case "foto":
        $a_actualizar="UPDATE productos SET Foto='$foto' WHERE id=$idP;";
        $b_actualizar=mysqli_query($con, $a_actualizar);
        break;
        case "precio":
        $a_actualizar="UPDATE productos SET Precio='$precio' WHERE id=$idP;";
        $b_actualizar=mysqli_query($con, $a_actualizar);
        break;
        case "cantidad":
        $a_actualizar="UPDATE productos SET Cantidad_en_almacen='$cantidad' WHERE id=$idP;";
        $b_actualizar=mysqli_query($con, $a_actualizar);
        break;
        case "fabricante":
        $a_actualizar="UPDATE productos SET Fabricante='$fabricante' WHERE id=$idP;";
        $b_actualizar=mysqli_query($con, $a_actualizar);
        break;
        case "origen":
        $a_actualizar="UPDATE productos SET Origen='$origen' WHERE id=$idP;";
        $b_actualizar=mysqli_query($con, $a_actualizar);
        break;
      }
    }
  }
  ?>

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
