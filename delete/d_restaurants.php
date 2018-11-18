<?php
include_once "../dbconnect.php";
$db = new Database();
$conn = $db->connectDB();

if($_POST) {
	$locationId = $_POST['locationId'];
	$restaurantId = $_POST['restaurantId'];

	$sql1 = "DELETE FROM restaurants WHERE id='".$restaurantId."'";
	$sql2 = "DELETE FROM location WHERE id='".$locationId."'";

	if($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
		echo "<p>Succcessfully Deleted</p>";
        echo "<a href='../admin.php'><button type='button'>Back</button></a>";

    } else {
        echo "Error while updating record : ". $conn->error;
    }    
}

if($_GET) {
    $restaurantId = $_GET['restaurantId'];
    $query = "SELECT restaurants.* FROM restaurants 
    		  LEFT JOIN location ON restaurants.fk_location_id = location.id
    		  WHERE restaurants.id = {$restaurantId}";
    $result = $conn->query($query);
    $data = $result->fetch_assoc();
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
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/modern-business.css" rel="stylesheet">

  </head>

  <body>
		<h3>Do you really want to delete this information?</h3>

		<form action="d_restaurants.php" method="post">
		    <input type="hidden" name="locationId" value="<?php echo $data['fk_location_id']?>">
			<input type="hidden" name="restaurantId" value="<?php echo $restaurantId?>">

		    <button type="submit">Yes, delete it!</button>
		    <button type="button"><a href="../admin.php">No, go back!</a></button>

		</form>
  </body>

</html>

<?php
}
$conn->close();
?>