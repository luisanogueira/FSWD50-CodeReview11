<?php
include_once "../dbconnect.php";
$db = new Database();
$conn = $db->connectDB();

if($_POST) {
	$image = $_POST['image'];
	$name = $_POST['name'];
	$website = $_POST['website'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$ZIP_code = $_POST['ZIP_code'];
	$description = $_POST['description'];
	$type = $_POST['type'];
	$locationId = $_POST['locationId'];
	$thingsId = $_POST['thingsId'];

	$sql = "UPDATE location SET address='".$address."', city='".$city."', ZIP_code='".$ZIP_code."' WHERE id='".$locationId."'";

	$sql2 = "UPDATE things_todo SET image='".$image."', name='".$name."', website='".$website."', description='".$description."', type='".$type."' WHERE fk_location_id='".$locationId."'";

	if($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
		echo "<p>Succcessfully Updated</p>";

        echo "<a href='u_things.php?thingsId=".$thingsId."'><button type='button'>Back</button></a>";
        echo "<a href='../admin.php'><button type='button'>Home</button></a>";

    } else {
        echo "Error while updating record : ". $conn->error;
    }    
}

if($_GET) {
    $thingsId = $_GET['thingsId'];
    $query = "SELECT location.address, location.city, location.ZIP_code, things_todo.* FROM things_todo 
    		  LEFT JOIN location ON things_todo.fk_location_id = location.id
    		  WHERE things_todo.id = {$thingsId}";
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
  	<form action="u_things.php" method="POST" accept-charset="utf-8">
  		<input type="hidden" name="locationId" value="<?php echo $data['fk_location_id']?>">
  		<input type="hidden" name="thingsId" value="<?php echo $thingsId?>">
  	    <div class ="row">
            <div class="col-6 p-4">
                <div class="form-group">
                  <label>Name</label>
                  <input class="form-control" type="text" name="name" value="<?php echo $data['name']?>">
                </div>
                <div class="form-group">
                  <label>Image</label>
                  <input class="form-control" type="text" name="image" value="<?php echo $data['image']?>">
                </div>
                <div class="form-group">
                  <label>Website</label>
                  <input class="form-control" type="text" name="website" value="<?php echo $data['website']?>">
                </div>
                <div class="form-group">
                  <label>Address</label>
                  <input class="form-control" type="text" name="address" value="<?php echo $data['address']?>">
                </div>
              </div>

              <div class="col-6 p-4">
                <div class="form-group">
                  <label>City</label>
                  <input class="form-control" type="text" name="city" value="<?php echo $data['city']?>">
                </div>
                <div class="form-group">
                  <label>ZIP code</label>
                  <input class="form-control" type="text" name="ZIP_code" value="<?php echo $data['ZIP_code']?>">
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <input class="form-control" type="text" name="description" value="<?php echo $data['description']?>">
                </div>
                <div class="form-group">
                  <label>Type</label>
                  <input class="form-control" type="text" name="type" value="<?php echo $data['type']?>">
                </div>
              </div>
            </div>
              
        	<button type="submit">Save Changes</button>
  	    <button type="button"><a href="../admin.php">Back</a></button>
  	  
  	</form>
  </body>
  </html>
  
<?php
	}
    $conn->close();
?>