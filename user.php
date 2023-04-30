<?php
// 'user' object
class User{
	// database connection and table name
	public $conn;
	public $table_name = "user";
	// object properties
	public $id;
	
	public $email;
	public $password;
	// constructor
	public function __construct($db){
		$this->conn = $db;
	}
// create() method will be here
// create new user record
function create(){
	// insert query
	$query = "INSERT INTO " . $this->table_name . "
            SET
				
				email = :email,
				password = :password";

				
	// prepare the query
	$stmt = $this->conn->prepare($query);
	// sanitize
	
	$this->email=htmlspecialchars(strip_tags($this->email));
	$this->password=htmlspecialchars(strip_tags($this->password));
	// bind the values
	
	$stmt->bindParam(':email', $this->email);
	// hash the password before saving to database
	$password_hash = password_hash($this->password, PASSWORD_BCRYPT);
	$stmt->bindParam(':password', $password_hash);
	echo $email;
				echo $password_hash;
	// execute the query, also check if query was successful
	if($stmt->execute()){
		return true;
	}
	return false;
}



}


?>
