<?php
session_start(); 
?>
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

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="<?php if ($_SESSION['urole'] == 1) {echo 'admin.php';
            } else {echo 'index.php';}?>">Travel o-matic Blog</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?php if ($_SESSION['urole'] == 1) {echo 'admin.php';
            } else {echo 'index.php';}?>">Home</a>
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
            <li class="nav-item dropdown">
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

      <!-- Restaurants -->

      <?php

        include_once "dbconnect.php";
          $db = new Database();
          $conn = $db->connectDB();

          $query1 = "SELECT location.address, things_todo.* FROM things_todo
                    LEFT JOIN location ON things_todo.fk_location_id = location.id";

          $result1 = mysqli_query($conn, $query1);

              if ($result1->num_rows > 0) {
                  echo "<h2 class='p-3 text-center'>Things to do</h2><div class='row'>";
                  // output data of each row
                  while($row = $result1->fetch_assoc()) {
                      echo "<div class='col-lg-4 col-sm-6'><div class='card h-100'><h4 class='card-title text-center'>".$row["name"]."</h4><div class='card-body'><img class='card-img-top' src=".$row["image"]."><p>Website: ".$row["website"]."</p><p>Address: ".$row["address"]."</p><p>".$row["description"]."</p><p>Type: ".$row["type"]."</p></div></div></div>";

                    }
                    echo "</div>";
                  } else {
                    echo "0 results";
                }

          $query2 = "SELECT location.address, concerts.* FROM concerts
                    LEFT JOIN location ON concerts.fk_location_id = location.id";

            $result2 = mysqli_query($conn, $query2);

              if ($result2->num_rows > 0) {
                  echo "<h2 class='p-3 text-center'>Concerts</h2><div class='row'>";
                  // output data of each row
                  while($row = $result2->fetch_assoc()) {
                      echo "<div class='col-lg-4 col-sm-6'><div class='card h-100'><h4 class='card-title text-center'>".$row["name"]."</h4><div class='card-body'><img class='card-img-top' src=".$row["image"]."><p>Website: ".$row["website"]."</p><p>Address: ".$row["address"]."</p><p>Type: ".$row["type"]."</p><p>Price: ".$row["price"]."</p><p>Date: ".$row["date"]."</p><p>Time: ".$row["time"]."</p></div></div></div>";

                    }
                    echo "</div>";
                  } else {
                    echo "0 results";
                }

          //close connection
          mysqli_close($conn);
      ?>

    <!-- /.container -->

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

  </body>

</html>
