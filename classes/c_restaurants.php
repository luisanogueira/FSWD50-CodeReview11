<?php 

class Restaurant {

	public $ID;
	public $name = '';
	public $image = '';
	public $website = '';
	public $phone = '';
	public $description = '';
	public $type = '';
	public $locationId = '';

	function __construct($name, $image, $website, $phone, $description, $type, $locationId){
		$this->name = $name;
		$this->image = $image;
		$this->website = $website;
		$this->phone = $phone;
		$this->description = $description;
		$this->type = $type;
		$this->locationId = $locationId;
	}

	public function writeDatabase(){
		include_once "../dbconnect.php";
		$db = new Database();
		$conn = $db->connectDB();

		$query = "INSERT INTO restaurants (
			name, 
			image,
			website,
			phone,
			description,
			type,
			fk_location_id)
			VALUES (
			'$this->name',
			'$this->image',
			'$this->website',
			'$this->phone',
			'$this->description',
			'$this->type',
			'$this->locationId')";

		$result = mysqli_query($conn, $query);

		$restaurantId = mysqli_insert_id($conn);

		//close connection
		mysqli_close($conn);

		return $restaurantId;
	}
}

?>