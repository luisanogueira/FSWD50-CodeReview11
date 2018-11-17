<?php 

class Location {

	public $ID;
	public $address = '';
	public $city = '';
	public $ZIP_code = '';
	public $event_id = '';

	function __construct($address, $city, $ZIP_code, $event_id){
		$this->address = $address;
		$this->city = $city;
		$this->ZIP_code = $ZIP_code;
		$this->event_id = $event_id;
	}

	public function writeDatabase(){
		include_once "../dbconnect.php";
		$db = new Database();
		$conn = $db->connectDB();

		$query = "INSERT INTO location (
			address,
			city,
			ZIP_code,
			event_id)
			VALUES (
			'$this->address',
			'$this->city',
			'$this->ZIP_code',
			'$this->event_id')";

		$result = mysqli_query($conn, $query);

		$locationId = mysqli_insert_id($conn);

		//close connection
		mysqli_close($conn);

		return $locationId;	
	}
}

?>