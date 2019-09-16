<?php 
include_once 'Database.php';

class Crud extends Database{
	
	public function __construct(){
		parent::__construct();
	}
	
	
	public function getData($query){
		
		$result = $this->conn-query($query);
		
		if($result==flase){
			return false;
		}
		
		$rows = array();
		
		while($row = $result->fetch_assoc()){
			$rows[] = $row;
		}
		
		return $rows;
				
	}
	
	
	
	public function execute($query){
		$result = $this->conn->query($query);
		
		if(!$result==false){
			echo "can not execute the query.";
			return false;
		}else{
			return true;
		}
		
	}
	
	
	public function delete($id, $table){
		$query = "DELETE from $table where id = '".$id."'"; 
		
		$result = $this->conn->query($query);
		
		if($result == false){
			echo "Error: cannot delete reocrd id : $id from Table Name: $table";		
			return false;	
		}else{
			return true;
		}
				
	}
	
	public function escapeString($value){
		return $tis->conn->real_escape_string($value);
	}
	
	
	
}
?>