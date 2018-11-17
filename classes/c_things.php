<?php 

class Things {

	public $ID;
	public $name = '';
	public $image = '';
	public $website = '';
	public $address = '';
	public $description = '';
	public $type = '';

	function __construct($name, $image, $website, $address, $description, $type){
		$this->name = $name;
		$this->image = $image;
		$this->website = $website;
		$this->address = $address;
		$this->description = $description;
		$this->type = $type;

	}

	public function writeDatabase(){
		include_once "../dbconnect.php";
		$db = new Database();
		$conn = $db->connectDB();

		$query = "INSERT INTO things_todo (
			name, 
			image,
			website,
			address,
			description,
			type)
			VALUES (
			'$this->name',
			'$this->image',
			'$this->website',
			'$this->address',
			'$this->description',
			'$this->type')";

		$result = mysqli_query($conn, $query);

		$thingsId = mysqli_insert_id($conn);

		//close connection
		mysqli_close($conn);

		return $thingsId;	
	}
}

?>