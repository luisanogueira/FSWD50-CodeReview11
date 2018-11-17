<?php 

class Concerts {

	public $ID;
	public $name = '';
	public $image = '';
	public $website = '';
	public $address = '';
	public $type = '';
	public $price = '';
	public $date = '';
	public $time = '';

	function __construct($name, $image, $website, $address, $type, $price, $date, $time){
		$this->name = $name;
		$this->image = $image;
		$this->website = $website;
		$this->address = $address;
		$this->type = $type;
		$this->price = $price;
		$this->date = $date;
		$this->time = $time;

	}

	public function writeDatabase(){
		include_once "../dbconnect.php";
		$db = new Database();
		$conn = $db->connectDB();

		$query = "INSERT INTO concerts (
			name, 
			image,
			website,
			address,
			type,
			price,
			date,
			time)
			VALUES (
			'$this->name',
			'$this->image',
			'$this->website',
			'$this->address',
			'$this->type',
			'$this->price',
			'$this->date',
			'$this->time')";

		$result = mysqli_query($conn, $query);

		$concertsId = mysqli_insert_id($conn);

		//close connection
		mysqli_close($conn);

		return $concertsId;	
	}
}