<?php 
class Database{
	private $_host = 'localhost:3309';
	private $_username = 'root';
	private $_password = '';
	private $_database = 'crudapp';
	
	protected $connection;
	
	public function __construct()
	{
		if (!isset($this->connection)) {
			
			$this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
			
			if (!isset($this->connection)) {
				echo 'Cannot connect to database server';
				exit;
			}			
		}	
		
		return $this->connection;
	}
	
}

?>