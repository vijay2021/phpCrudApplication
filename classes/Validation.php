<?php 
class Validation{
	
	public function checkFields($data, $fields){
		$message = null;
		
		foreach($fields as $field){
			if(empty($data[$field])){
				$message .= "$field field is empty<br/>.";
			}
		}
		
		return $message;
	}
	
	public function isValidEmail($email)
	{
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return true;
		}
		return false;	
	}
	
	
	public function isValidAge($age)
	{
		if(preg_match("/^[0-9]+$/", $age)){
			return true;
		}
		return false;	
	}
	
}
?>