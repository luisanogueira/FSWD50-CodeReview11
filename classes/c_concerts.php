<?php 

class Concerts {

	public $ID;
	public $name = '';
	public $image = '';
	public $website = '';
	public $type = '';
	public $price = '';
	public $date = '';
	public $time = '';
	public $locationId = '';

	function __construct($name, $image, $website, $type, $price, $date, $time, $locationId){
		$this->name = $name;
		$this->image = $image;
		$this->website = $website;
		$this->type = $type;
		$this->price = $price;
		$this->date = $date;
		$this->time = $time;
		$this->locationId = $locationId;
	}

	public function writeDatabase(){
		include_once "../dbconnect.php";
		$db = new Database();
		$conn = $db->connectDB();

		$query = "INSERT INTO concerts (
			name, 
			image,
			website,
			type,
			price,
			date,
			time,
			fk_location_id)
			VALUES (
			'$this->name',
			'$this->image',
			'$this->website',
			'$this->type',
			'$this->price',
			'$this->date',
			'$this->time',
			'$this->locationId')";

		$result = mysqli_query($conn, $query);

		$concertsId = mysqli_insert_id($conn);

		//close connection
		mysqli_close($conn);

		return $concertsId;	
	}
}