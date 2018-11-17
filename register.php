<?php
ob_start();
session_start(); // start a new session or continues the previous

error_reporting(~E_DEPRECATED & ~E_NOTICE);

if( isset($_SESSION['user'])!="" ){
 header("Location: index.php"); // redirects to index.php
}
include_once 'dbconnect.php';
$db = new Database();
$conn = $db->connectDB();

$error = false;
if ( isset($_POST['btn-signup']) ) {
 
 // sanitize user input to prevent sql injection
 $name = trim($_POST['name']);

  //trim - strips whitespace (or other characters) from the beginning and end of a string
  $name = strip_tags($name);

  // strip_tags — strips HTML and PHP tags from a string

  $name = htmlspecialchars($name);
 // htmlspecialchars converts special characters to HTML entities
 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST['pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);

 // basic name validation
 if (empty($name)) {
  $error = true;
  $nameError = "Please enter your full name.";
 } else if (strlen($name) < 3) {
  $error = true;
  $nameError = "Name must have at least 3 characters.";
 } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
  $error = true;
  $nameError = "Name must contain alphabets and space.";
 }

 //basic email validation
 if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 } else {
  // checks whether the email exists or not
  $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
  $result = mysqli_query($conn, $query);
  $count = mysqli_num_rows($result);
  if($count!=0){
   $error = true;
   $emailError = "Provided Email is already in use.";
  }
 }
 // password validation
 if (empty($pass)){
  $error = true;
  $passError = "Please enter password.";
 } else if(strlen($pass) < 6) {
  $error = true;
  $passError = "Password must have atleast 6 characters.";
 }

 // password hashing for security
$password = hash('sha256', $pass);

$userRole = 2;

 // if there's no error, continue to signup
 if( !$error ) {
  
  $query = "INSERT INTO users(userName,userEmail,userPass,userRole) VALUES('$name','$email','$password', '$userRole')";
  $res = mysqli_query($conn, $query);
  
  if ($res) {
   $errTyp = "success";
   $errMSG = "Successfully registered, you may login now";
   unset($name);
   unset($email);
   unset($pass);
  } else {
   $errTyp = "danger";
   $errMSG = "Something went wrong, try again later...";
  }
  
 }

}
?>
<!DOCTYPE html>
<html>
<head>
<title>Registration System</title>

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
            <h2 class="text-center p-3">Sign Up here</h2>
            <hr />
          
   <?php
   if ( isset($errMSG) ) {
  
   ?>
           <div class="alert alert-<?php echo $errTyp ?>">
                        <?php echo $errMSG; ?>
       </div>

<?php
  }
  ?> 
            <input type="text" name="name" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>" />
      
               <span class="text-danger"><?php echo $nameError; ?></span>

            <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
    
               <span class="text-danger"><?php echo $emailError; ?></span>
      
            <input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
            
               <span class="text-danger"><?php echo $passError; ?></span>
      
            <hr />

            <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
            <hr />
          
            <a href="login.php">Sign in Here...</a>
          </form>

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