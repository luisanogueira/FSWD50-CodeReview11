<?php
ob_start();
session_start();
include_once 'dbconnect.php';
$db = new Database();
$conn = $db->connectDB();

$email = '';
$emailError = '';
$passError = '';

// it will never let you open index(login) page if session is set
if ( isset($_SESSION['user'])!="" ) {
 header("Location: index.php");
 exit;
}

$error = false;

if( isset($_POST['btn-login']) ) {

 // prevent sql injections/ clear user invalid inputs
 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST['pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);
 // prevent sql injections / clear user invalid inputs

 if(empty($email)){
  $error = true;
  $emailError = "Please enter your email address.";
 } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 }

 if(empty($pass)){
  $error = true;
  $passError = "Please enter your password.";
 }

 // if there's no error, continue to login
 if (!$error) {
  
  $password = hash('sha256', $pass); // password hashing

  $res=mysqli_query($conn, "SELECT userId, userName, userPass, userRole FROM users WHERE userEmail='$email'");
  $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
  $count = mysqli_num_rows($res); // if uname/pass is correct it returns must be 1 row
  
  if($count == 1 && $row['userPass']==$password && $row['userRole'] == 1) {
   $_SESSION['user'] = $row['userId'];
   $_SESSION['urole'] = $row['userRole'];
   header("Location: admin.php");
  } elseif ($count == 1 && $row['userPass']==$password && $row['userRole'] == 2) {
   $_SESSION['user'] = $row['userId'];
   $_SESSION['urole'] = $row['userRole'];
   header("Location: index.php");
  }
  else {
   $errMSG = "Incorrect Credentials, Try again...";
  }
  
 }

}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login System</title>

<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/modern-business.css" rel="stylesheet">

</head>
<body>
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
   <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
            <h2 class="text-center p-3">Sign In here!</h2>
            <hr />
            
           <?php
  if ( isset($errMSG) ) {
echo $errMSG; ?>
              
               <?php
  }
  ?>
        
            <input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
        
            <span class="text-danger"><?php echo $emailError; ?></span>
  
            <input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
        
           <span class="text-danger"><?php echo $passError; ?></span>
            <hr />
            <button type="submit" name="btn-login">Sign In</button>

            <hr />
            <a href="register.php">Sign Up Here...</a>   
   </form>
   </div>
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
</body>
</html>
<?php ob_end_flush(); ?>