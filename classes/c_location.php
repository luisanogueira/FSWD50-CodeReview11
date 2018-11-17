<?php 

class Location {

	public $ID;
	public $address = '';
	public $city = '';
	public $ZIP_code = '';

	function __construct($address, $city, $ZIP_code){
		$this->address = $address;
		$this->city = $city;
		$this->ZIP_code = $ZIP_code;
	}

	public function writeDatabase(){
		include_once "../dbconnect.php";
		$db = new Database();
		$conn = $db->connectDB();

		$query = "INSERT INTO location (
			address,
			city,
			ZIP_code)
			VALUES (
			'$this->address',
			'$this->city',
			'$this->ZIP_code')";

		$result = mysqli_query($conn, $query);

		$locationId = mysqli_insert_id($conn);

		//close connection
		mysqli_close($conn);

		return $locationId;	
	}
}

?>