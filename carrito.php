<?php
session_start();
$_SESSION["userid"] = 24;
?>

<!DOCTYPE html>
<html lang="es">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tu cuenta</title>

  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
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
          <li>
            <a href="carrito.php">Mi carrito <span class="glyphicon glyphicon-shopping-cart"></span></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <!-- Itemss Section -->
  <section id="items">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Tu carrito de compras</h1>
        </div>
      </div>
      <div class="row text-center">
        <?php
        $total = 0;
        $con=mysqli_connect("localhost","ana","ana","final");
        if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $result = mysqli_query($con,"SELECT COUNT(*) FROM carrito;");
        while($row = mysqli_fetch_array($result)) {
          $has_shopped = $row['COUNT(*)'];
          echo "<h4><span class=\"label label-success\">Tienes " . $has_shopped . " artículos</span></h4>";
        }
        echo "<br><br><br><br>";
        if($has_shopped != 0){
          $result = mysqli_query($con,"SELECT p.nombre, p.foto, p.precio, c.cantidad
            FROM productos p, carrito c, usuarios u WHERE p.id=c.idProductos AND u.id=c.idUsuarios AND c.idUsuarios={$_SESSION['userid']}
            AND p.id IN (SELECT idProductos FROM carrito);");
            while($row = mysqli_fetch_array($result)) {
              echo "<div class='row' align='center'>";
              echo "<img src='img/" . $row['foto'] ."' class='img-responsive' width='250px' height='250px'></img>";
              echo "<p><strong>" . $row['nombre'] . "</strong></p>";
              echo "<p><strong>Precio: </strong>\$" . $row['precio'] . "</p>";
              echo "<p><strong>Cantidad: </strong>" . $row['cantidad'] . "</p>";
              echo "<p><strong>Total: </strong>\$" . $row['precio']*$row['cantidad'] . "</p>";
              echo "</div>";
              $total += $row['precio']*$row['cantidad'];
            }
            echo '<form method="post" action="">
            <div class="row" align="center">
            <button type="submit" name="clear_button" class="btn btn-warning btn-lg">Vaciar carrito</button>
            </div>
            </form>';
          }else{
            echo "<p>No hay artículos en tu carrito de compra.</p>";
          }
          mysqli_close($con);
          ?>
        </div>
      </div>
    </section>

    <!-- Checkout Section -->
    <br><br><br><br><br><br><br><br><br><br><br>
    <section id="checkout">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-subheading text-muted">Confirma tu compra.</h2>
          </div>
        </div>
        <div class="row text-center" align="center">
          <?php
          $con=mysqli_connect("localhost","ana","ana","final");
          if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }
          if($has_shopped != 0){
            echo "<table class=\"table\">";
            echo "<thead>";
            echo "<tr>";
            echo "<th></th>";
            echo "<th></th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            echo "<tr>";
            echo "<th>Tu compra será enviada a</th>";
            $result = mysqli_query($con,"SELECT correo FROM usuarios WHERE id={$_SESSION['userid']};");
            while($row = mysqli_fetch_array($result)) {
              echo "<th>" . $row['correo'] . "</th></tr>";
              echo "<tr><th>Tiempo de espera</th><th>1 día</th></tr>";
            }
            $result = mysqli_query($con,"SELECT p.nombre, c.cantidad FROM productos p, carrito c
              WHERE p.id=c.idProductos AND p.id IN (SELECT idProductos FROM carrito);");
              while($row = mysqli_fetch_array($result)) {
                echo "<tr><th>Artículo</th><th>" . $row['nombre'] . "(" . $row['cantidad'] . ")</th></tr>";
              }
              echo "<tr><th>TOTAL</th><th>\$" . $total . "</th></tr>";
              echo "</tbody>";
              echo "</table>";
              echo "<form action='' method='post'>";
              echo "<button type='submit' name='checkout_button' class='btn btn-xl'>Confirmar y comprar</button>";
              echo "<input type='hidden' name='purchase_total' value='" . $total . "'></input>";
              echo "</form>";
            }else{
              echo "<p>No hay artículos en tu carrito de compra.</p>";
            }
            mysqli_close($con);
            ?>
          </div>
        </div>
      </section>

      <?php
      if(isset($_POST['clear_button'])){
        $con=mysqli_connect("localhost","ana","ana","final");
        if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $sql="DELETE FROM carrito WHERE idUsuarios={$_SESSION['userid']};";

        if (!mysqli_query($con,$sql)) {
          die('Error: ' . mysqli_error($con));
        }else{
          echo "<meta http-equiv='refresh' content='0'>";
        }
        $has_shopped=0;
        mysqli_close($con);
      }

      if(isset($_POST['checkout_button'])){
        $con=mysqli_connect("localhost","ana","ana","final");
        if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $total = $_POST['purchase_total'];
        $id = array();
        $cantidad= array();
        $x = 0;
        $result = mysqli_query($con,"SELECT * FROM carrito WHERE idUsuarios={$_SESSION['userid']};");
        while($row = mysqli_fetch_array($result)) {
          $id[$x] = $row['idProductos'];
          $cantidad[$x] = $row['Cantidad'];
          $x++;
        }
        mysqli_query($con,"INSERT INTO ordenes(id, Monto_a_pagar, Fecha_compra, idUsuarios)
        VALUES (NULL, $total, CURRENT_TIMESTAMP(), {$_SESSION['userid']});");
        $orden=mysqli_query($con,"SELECT MAX(id) FROM ordenes;");
        while($row = mysqli_fetch_array($orden)) {
          $idO = $row['MAX(id)'];
        }
        for($i = 0; $i < $x; $i++){
          mysqli_query($con,"INSERT INTO ordenes_productos(idOrden, idProductos, Cantidad)
          VALUES ($idO,$id[$i],$cantidad[$i]);");
          mysqli_query($con,"UPDATE productos SET Cantidad_en_almacen=Cantidad_en_almacen-$cantidad[$i] WHERE id=$id[$i];");
        }
        if (!mysqli_query($con,"DELETE FROM carrito WHERE idUsuarios={$_SESSION['userid']};")) {
          die('Error: ' . mysqli_error($con));
        }else{
          echo "<meta http-equiv='refresh' content='0'>";
          echo '<div class="alert alert-success">';
          echo '<strong>Tus datos fueron agregados exitosamente</strong>';
          echo '</div>';
        }
        mysqli_close($con);
        $has_shopped=0;
      }
      ?>
      <!-- /.container -->

      <!-- Footer -->
      <footer>
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <ul class="list-inline">
                <li>
                  <a href="index.html">Home</a>
                </li>
                <li class="footer-menu-divider">&sdot;</li>
                <li>
                  <a href="nosotros.html">Acerca de nosotros</a>
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
