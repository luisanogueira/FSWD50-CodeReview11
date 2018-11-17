<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Travel Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

  </head>

  <body>
    <?php
      ob_start();
      session_start();
      require_once 'dbconnect.php';
      $db = new Database();
      $conn = $db->connectDB();

      // if session is not set this will redirect to login page
      if( !isset($_SESSION['user']) ) {
       header("Location: login.php");
       exit;
      }
      // select logged-in users details
      $res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
      $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
      ?>

      <?php ob_end_flush(); ?>
    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="admin.php">Travel o-matic Blog - Administrator</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="admin.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Choose category
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="restaurants.php">Restaurants/Cafes</a>
                <a class="dropdown-item" href="events.php">Events</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="insert.php">
                Insert new data
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php?logout">
                Logout
              </a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>

    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('img/vienna2.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Gloriette - Schönbrunn</h3>
              <p>This is one of the first pictures I took in Vienna when I first visited. The Schönbrunn Gardens are amazing, and this is just one of the things to visit there.</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('img/vienna3.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Belvedere Palace</h3>
              <p>The Palace and Museum are both worth the visit. The Kiss (in German Liebespaar, Lovers), from Gustav Klimt is just one of the famous paintings there.</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('img/vienna.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>The most charming city in the world</h3>
              <p>You probably fell in love in Vienna at first sight, right? You are not alone! Explore my blog to check what Vienna has to offer.</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>

    <!-- Page Content -->
    <div class="container">

      <h1 class="my-4">Insert here</h1>

      <button type="button" class="btn btn-info p-2 mb-2 text-center" id="insertRes">Restaurants</button>
      <button type="button" class="btn btn-info p-2 mb-2 text-center" id="insertThings">Things to do</button>
      <button type="button" class="btn btn-info p-2 mb-2 text-center" id="insertCon">Concerts</button>

      <form action="insert.php" method="POST" accept-charset="utf-8" id="formRes">
        <div class ="row">
          <div class="col-6 p-4">
              <div class="form-group">
                <label>Name</label>
                <input class="form-control" type="text" name="name" placeholder="name">
              </div>
              <div class="form-group">
                <label>Image</label>
                <input class="form-control" type="text" name="image" placeholder="image">
              </div>
              <div class="form-group">
                <label>Website</label>
                <input class="form-control" type="text" name="website" placeholder="website">
              </div>
              <div class="form-group">
                <label>Phone</label>
                <input class="form-control" type="text" name="phone" placeholder="phone">
              </div>
            </div>

            <div class="col-6 p-4">
              <div class="form-group">
                <label>Address</label>
                <input class="form-control" type="text" name="address" placeholder="address">
              </div>
              <div class="form-group">
                <label>City</label>
                <input class="form-control" type="text" name="city" placeholder="city">
              </div>
              <div class="form-group">
                <label>ZIP code</label>
                <input class="form-control" type="text" name="ZIP_code" placeholder="ZIP_code">
              </div>
              <div class="form-group">
                <label>Description</label>
                <input class="form-control" type="text" name="description" placeholder="description">
              </div>
              <div class="form-group">
                <label>Type</label>
                <input class="form-control" type="text" name="type" placeholder="type">
              </div>
            </div>
          </div>
            <input class="btn btn-info p-2 m-3 text-center col-2" type="submit" name="submitRes" id="btn">
      </form>
        
        <?php 
        include_once "classes/c_restaurants.php";
        include_once "classes/c_location.php";

        if(isset($_POST["submitRes"])){
          $newRestaurant = new Restaurant(
            $_POST["name"], 
            $_POST["image"],
            $_POST["website"],
            $_POST["phone"],
            $_POST["address"],
            $_POST["description"],
            $_POST["type"]);

          $restaurantId = $newRestaurant->writeDatabase();

          $newLocation = new Location(
            $_POST["address"], 
            $_POST["city"], 
            $_POST["ZIP_code"], 
            $restaurantId);

          $newLocation->writeDatabase();
        }

        ?>

        <form action="insert.php" method="POST" accept-charset="utf-8" id="formThings">
        <div class ="row">
          <div class="col-6 p-4">
              <div class="form-group">
                <label>Name</label>
                <input class="form-control" type="text" name="name" placeholder="name">
              </div>
              <div class="form-group">
                <label>Image</label>
                <input class="form-control" type="text" name="image" placeholder="image">
              </div>
              <div class="form-group">
                <label>Website</label>
                <input class="form-control" type="text" name="website" placeholder="website">
              </div>
              <div class="form-group">
                <label>Address</label>
                <input class="form-control" type="text" name="address" placeholder="address">
              </div>
            </div>

            <div class="col-6 p-4">
              <div class="form-group">
                <label>City</label>
                <input class="form-control" type="text" name="city" placeholder="city">
              </div>
              <div class="form-group">
                <label>ZIP code</label>
                <input class="form-control" type="text" name="ZIP_code" placeholder="ZIP_code">
              </div>
              <div class="form-group">
                <label>Description</label>
                <input class="form-control" type="text" name="description" placeholder="description">
              </div>
              <div class="form-group">
                <label>Type</label>
                <input class="form-control" type="text" name="type" placeholder="type">
              </div>
            </div>
          </div>
            <input class="btn btn-info p-2 m-3 text-center col-2" type="submit" name="submitThing" id="btn">
      </form>
        

        <?php 
        include_once "classes/c_things.php";
        include_once "classes/c_location.php";

        if(isset($_POST["submitThing"])){
          $newThings = new Things(
            $_POST["name"], 
            $_POST["image"],
            $_POST["website"],
            $_POST["address"],
            $_POST["description"],
            $_POST["type"]);

          $thingsId = $newThings->writeDatabase();

          $newLocation = new Location(
            $_POST["address"], 
            $_POST["city"], 
            $_POST["ZIP_code"], 
            $thingsId);

          $newLocation->writeDatabase();
        }

        ?>

        <form action="insert.php" method="POST" accept-charset="utf-8" id="formCon">
        <div class ="row">
          <div class="col-6 p-4">
              <div class="form-group">
                <label>Name</label>
                <input class="form-control" type="text" name="name" placeholder="name">
              </div>
              <div class="form-group">
                <label>Image</label>
                <input class="form-control" type="text" name="image" placeholder="image">
              </div>
              <div class="form-group">
                <label>Website</label>
                <input class="form-control" type="text" name="website" placeholder="website">
              </div>
              <div class="form-group">
                <label>Address</label>
                <input class="form-control" type="text" name="address" placeholder="address">
              </div>
              <div class="form-group">
                <label>City</label>
                <input class="form-control" type="text" name="city" placeholder="city">
              </div>
            </div>

            <div class="col-6 p-4">
              <div class="form-group">
                <label>ZIP code</label>
                <input class="form-control" type="text" name="ZIP_code" placeholder="ZIP_code">
              </div>
              <div class="form-group">
                <label>Type</label>
                <input class="form-control" type="text" name="type" placeholder="type">
              </div>
              <div class="form-group">
                <label>Price</label>
                <input class="form-control" type="text" name="price" placeholder="price">
              </div>
              <div class="form-group">
                <label>Date</label>
                <input class="form-control" type="text" name="date" placeholder="date">
              </div>
              <div class="form-group">
                <label>Time</label>
                <input class="form-control" type="text" name="time" placeholder="time">
              </div>
            </div>
          </div>
            <input class="btn btn-info p-2 m-3 text-center col-2" type="submit" name="submitCon" id="btn">
      </form>
        

        <?php 
        include_once "classes/c_concerts.php";
        include_once "classes/c_location.php";

        if(isset($_POST["submitCon"])){
          $newConcerts = new Concerts(
            $_POST["name"], 
            $_POST["image"],
            $_POST["website"],
            $_POST["address"],
            $_POST["type"],
            $_POST["price"],
            $_POST["date"],
            $_POST["time"]);

          $concertsId = $newConcerts->writeDatabase();

          $newLocation = new Location(
            $_POST["address"], 
            $_POST["city"], 
            $_POST["ZIP_code"], 
            $concertsId);

          $newLocation->writeDatabase();
        }

        ?>
    <!-- /.container -->
    </div>
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
      $("#insertRes").click(function(){
        $("#formRes").show();
        $("#formThings").hide();
        $("#formCon").hide();
      })

      $("#insertThings").click(function(){
        $("#formRes").hide();
        $("#formThings").show();
        $("#formCon").hide();
      })

      $("#insertCon").click(function(){
        $("#formRes").hide();
        $("#formThings").hide();
        $("#formCon").show();
      })

    </script>

  </body>

</html>