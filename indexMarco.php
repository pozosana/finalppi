<!DOCTYPE html>
<?php
  $cookie_name = "authorization";
  $numero = -1;
  $nombre = "";

  if(isset($_POST['login_button1'])) {
		$user = $_POST['email2'];
		$pass = $_POST['password2'];
    //echo "alert($user);";

    setcookie($cookie_name, $user, time() + (86400 * 30), "/");

    $con=mysqli_connect("localhost","marcoppi","marcoppi","marcoppi");

    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $result = mysqli_query($con,"SELECT COUNT(name) FROM user WHERE email='$user' AND password='$pass';");

    while($row = mysqli_fetch_array($result)) {
      $numero = $row['COUNT(name)'];
      if ($numero != 0){
        //echo "The user exists!";
      }else{
        //echo "Wrong username or password ";
      }
      //echo "alert(" . $row['COUNT(name)'] . ");";
    }

    if($numero > 0){
      $result = mysqli_query($con,"SELECT name FROM user WHERE email='$user';");
      while($row = mysqli_fetch_array($result)) {
        //echo "Welcome,  " . $row['name'] . "!;";
        $nombre = $row['name'];
      }
    }

    mysqli_close($con);
	}

  if(isset($_POST['login_button2'])) {
    $name_new = $_POST['name'];
    $email = $_POST['email'];
    $pass_new = $_POST['password'];
    $birthday = $_POST['birthday'];
    $ccnumber = $_POST['ccnumber'];
    $address = $_POST['address'];

    $con=mysqli_connect("localhost","marcoppi","marcoppi","marcoppi");

    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $result = mysqli_query($con,"INSERT INTO user(name,email,password,birthday,ccnumber,address) VALUES('$name_new','$email','$pass_new','$birthday','$ccnumber','$address');");

    $q = mysqli_query( $con, $result);
  	if(!$q){
  		//echo "Ha ocurrido un error";
  	}else
  	{
  		//echo "Persona se ingreso satisfactoriamente... ";
  	}
  }

  if(isset($_POST['logout_button'])) {
      $numero = -1;
  }

  if(isset($_POST['buy_button'])) {
      $numero = 1;

      $valor_boton = $_POST['buy_button'];
      $cadena = "qty_watches" . $valor_boton;
      $select_qty = $_POST[$cadena];
      $con=mysqli_connect("localhost","marcoppi","marcoppi","marcoppi");
      mysqli_query($con,"INSERT INTO shopping_cart(id_product,qty) VALUES($valor_boton,$select_qty);");

      $user = $_COOKIE["authorization"];
      $result = mysqli_query($con,"SELECT name FROM user WHERE email='$user';");
      while($row = mysqli_fetch_array($result)) {
        //echo "Welcome,  " . $row['name'] . "!;";
        $nombre = $row['name'];
      }
  }

  if(isset($_POST['regreso'])) {
      $numero = 1;
      echo "alert($user);";
  }

?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>The Coolest Watches</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/agency.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">
    <?php
        $sesion_iniciada=1;
    ?>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">The Coolest Watches</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#login_section">Login</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Services</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio">Products</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="admin_login.php">Admin</a>
                    </li>
                    <?php
                        if($numero == 1){
                            echo "<li><a class=\"page-scroll\" href=\"my_account.php\">My account</a></li>";
                            echo "<li><a class=\"page-scroll\" href=\"my_cart.php\">My cart</a></li>";
                        }
                    ?>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Welcome To Our Store!</div>
                <div class="intro-heading">We sell only the best watches in the world</div>
                <a href="#services" class="page-scroll btn btn-xl">Wanna see them</a>
            </div>
        </div>
    </header>

    <!-- Login Section -->
    <section id="login_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"  >
                    <?php
                    if($numero == 1){
                        echo "<h2 class=\"section-heading\">Welcome, " . $nombre . "!</h2>";
                        echo "<button type=\"submit\" name=\"logout_button\" class=\"btn btn-info btn-sm\">Logout</button>";
                    }else{
                        echo "<h2 class=\"section-heading\">Login</h2>";
                        echo "<h3 class=\"section-subheading text-muted\">Login or register.</h3>";
                    }
                    ?>
                  </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">

                    <div class="row">
                        <div class="col-md-5">
                          <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"  >
                            <h4>Existing users</h4>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your email *" name="email2" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Your password *" name="password2" required data-validation-required-message="Please enter your password.">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="session" value="yes">
                            </div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" name="login_button1" class="btn btn-xl">Login</button>
                            </div>
                          </form>
                        </div>
                      <div class="col-md-2"></div>
                      <div class="col-md-5">
                        <h4>New users</h4>
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"  >
                          <div class="form-group">
                              <input type="text" class="form-control" placeholder="Your full name *" name="name" required data-validation-required-message="Please enter your full name.">
                              <p class="help-block text-danger"></p>
                          </div>
                          <div class="form-group">
                              <input type="text" class="form-control" placeholder="Your email address *" name="email" required data-validation-required-message="Please enter your email address.">
                              <p class="help-block text-danger"></p>
                          </div>
                          <div class="form-group">
                              <input type="password" class="form-control" placeholder="Your password *" name="password" required data-validation-required-message="Please enter your password.">
                              <p class="help-block text-danger"></p>
                          </div>
                          <div class="form-group">
                              <input type="date" class="form-control" placeholder="Your birthday *" name="birthday" required data-validation-required-message="Please enter your birthday.">
                              <p class="help-block text-danger"></p>
                          </div>
                          <div class="form-group">
                              <input type="text" class="form-control" placeholder="Your credit card number *" name="ccnumber" required data-validation-required-message="Please enter your credit card number.">
                              <p class="help-block text-danger"></p>
                          </div>
                          <div class="form-group">
                              <input type="text" class="form-control" placeholder="Your address *" name="address" required data-validation-required-message="Please enter your full address.">
                              <p class="help-block text-danger"></p>
                          </div>
                          <div class="form-group">
                              <input type="hidden" id="session" value="no">
                          </div>
                          <div class="col-lg-12 text-center">
                              <div id="success"></div>
                              <button type="submit" name="login_button2" class="btn btn-xl">Create account</button>
                          </div>
                        </form>
                      </div>
                      <div class="clearfix"></div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Services</h2>
                    <h3 class="section-subheading text-muted">We provide a catalog of selected watches.</h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Shop online</h4>
                    <p class="text-muted">The ultimate online shopping way. Our store is completely online to respond the necessities of the modern world.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Be everywhere</h4>
                    <p class="text-muted">No matter where you are, browse for the coolest watches ever made. Receive your purchase at the door of your house.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Web Security</h4>
                    <p class="text-muted">Your shopping is totaly secure within our online system. We provide an anti-fraud feature so you can feel safe in your purchase.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">The watches</h2>
                    <h3 class="section-subheading text-muted">Get delighted with our selection of watches.</h3>
                </div>
            </div>
            <div class="row">
              <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"  >
                <?php
                  $con=mysqli_connect("localhost","marcoppi","marcoppi","marcoppi");

                  // Check connection
                  if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }

                  $result = mysqli_query($con,"SELECT * FROM product;");

                  $counter = 1;
                  //SE DESPLEGAN LOS PRODUCTOS
                  while($row = mysqli_fetch_array($result)) {
                    echo "<div class=\"col-md-4\" align=\"center\">";
                    echo "<img src=\"img/watches/" . $row['picture'] . "\" class=\"img-responsive\" width=\"250px\" height=\"250px\">";
                    echo "<div class=\"portfolio-caption\">";
                    echo "<h4>" . $row['name'] . "</h4>";
                    echo "<p class=\"text-muted\">" . $row['description'] . "</p>";
                    echo "<h3>\$" . $row['price'] . "</h3>";
                    echo "<div class=\"form-group\">
                        <button type=\"submit\" name=\"buy_button\" value=\"". $counter. "\" class=\"btn btn-success btn-lg\">Add to cart</button>
                        <select name=\"qty_watches" . $counter . "\">
                          <option value=\"1\">1</option><option value=\"2\">2</option><option value=\"3\">3</option><option value=\"4\">4</option>
                          <option value=\"5\">5</option><option value=\"6\">6</option><option value=\"7\">7</option><option value=\"8\">8</option>
                          <option value=\"9\">9</option><option value=\"10\">10</option>
                        </select>
                    </div>";
                    echo "</div>";
                    echo "</div>";
                    $counter++;
                  }

                  mysqli_close($con);
                ?>
              </form>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">About</h2>
                    <h3 class="section-subheading text-muted">Get to know us.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/5.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="subheading">Our Humble Beginnings</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">We started in a garage in Mexico City and sold watches door by door. Our mission was to sell what we believe are the coolest watches in the market for men.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/3.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="subheading">Transition to Full Service</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">We realized that an online store is the best way to reach our clients. We our now proud to say that our store is fully online and anyone in the wolrd con get delighted with our selection.</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/6.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="subheading">Our selection</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Our famous catalog contains the coolest watches for men, regardless of the brand and the price. We select the watches based on different attributes such a style and ultimate fashion.</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/8.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="subheading">Our next goals</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">We are now developping a new feature for our store: the coolest watches for women. This service for our beloved women will be available at the middle of this year. We can't wait to show you our selection!</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4>Be Part
                                    <br>Of Our
                                    <br>Story!</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Clients Aside -->
    <aside class="clients">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        <img src="img/logos/envato.jpg" class="img-responsive img-centered" alt="">
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        <img src="img/logos/designmodo.jpg" class="img-responsive img-centered" alt="">
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        <img src="img/logos/themeforest.jpg" class="img-responsive img-centered" alt="">
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        <img src="img/logos/creative-market.jpg" class="img-responsive img-centered" alt="">
                    </a>
                </div>
            </div>
        </div>
    </aside>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contact Us</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; The Coolest Wacthes 2016</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>

</body>

</html>
