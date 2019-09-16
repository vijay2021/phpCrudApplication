<?php 
class Database{
	private $host = "localhost:7080";
	private $username = "root";
	private $password = "";
	private $db = "crudApp";
	
	protected $conn;
	
	
	public __construct(){
		
		if(!isset($this->conn)){
			
			$this->conn = new mysqli($this->host, $this->username, $this->password, $this->db);
			
			if(!isset($this->conn)){
				echo  "There is some problem in database connection.";				
				exit();
			}
			
		}
		
		return $this->conn;
	}
	
	
}

?>