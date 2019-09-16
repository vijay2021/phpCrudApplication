<?php 
class Validation{
	
	//we can use this function for checking empty values of form fields.
	public function checkFields($data, $fields){
		$message = null;
		
		foreach($fields as $field){
			if(empty($data[$field])){
				$message .= "$field field is empty<br/>.";
			}
		}
		
		return $message;
	}
	
	// this one we can use for checking valid email or not.
	public function isValidEmail($email)
	{
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return true;
		}
		return false;	
	}
	
	
	//this one we can use for valid age or not.
	public function isValidAge($age)
	{
		if(preg_match("/^[0-9]+$/", $age)){
			return true;
		}
		return false;	
	}
	
}
?>