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
        <a class="navbar-brand" href="index.php">Dessert World</a>
      </div>
    </div>
  </nav>

  <body>
    <form method="post" action="" id="contactForm">
      <table style=100% align="center">
        <tr>
          <td valign="middle"><br><label>Correo electrónico:</label></td><td valign="middle"><input name="correo" size="20" type="text" maxlength="30" class="form-control"/></td>
        </tr>
        <tr>
          <td valign="middle"><label>Contrasena:</label></td><td valign="middle"><input name="contrasena" size="20" type="password" maxlength="8" class="form-control"/></td>
        </tr>
        <tr>
          <td align="center" colspan="2">
            <br><input name='Ingresar' type='submit' value='Ingresar'>
            <br>
          </td>
        </tr>
      </table>

      <?PHP
      if(isset($_POST['Ingresar'])){
        $con=mysqli_connect("localhost","ana","ana","final");
        if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        // escape variables for security
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];
        if($correo=="admin" && $contrasena=="admin"){
          echo '<script>window.location.href="bases.php";</script>';
          exit();
        }else{
          echo "*Usuario inválido<br>";
          exit();
        }
      }
      ?>

    </form>
  </body>
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

  </html>
