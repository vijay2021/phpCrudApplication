<?php 
require_once('includes/header.php'); 
include_once('classes/Crud.php');
include_once('classes/Validation.php');

//initaiting crud class object.
$crud = new Crud();

//here we can define input valid.
$name = "";
$age = "";
$email = "";

//bootstrap error class. we will pass value here dynamically.
$errorClass = "";

if(isset($_POST['addUpdate'])){
	
	//initaiting validation class object.	
	$validation = new Validation();
	
	
	// checking all form field for empty check
	$checkField = $validation->checkFields($_POST,array('name','age','email'));
		
	$id = $crud->escape_string($_POST['id']);
	$name = $crud->escape_string($_POST['name']);
	$age = $crud->escape_string($_POST['age']);
	$email = $crud->escape_string($_POST['email']);
	
	// checking valid age
	$ageCheck = $validation->isValidAge($_POST['age']);
	
	// checking valid email
	$emailCheck = $validation->isValidEmail($_POST['email']);
	
	$errorMessage = "";
	// in case of error, we are calling bootstrap error classes. 
	$errorClass = "alert alert-danger";
	if($checkField){
		$errorMessage = $checkField;
	}elseif(!$ageCheck){
		$errorMessage = "Please provide valid age.";
	}elseif(!$emailCheck){
		$errorMessage = "Please provide valid email.";	
	}else{
		
		
		$sql = "";
			
		if($id==''){
			$sql .= "INSERT INTO users SET ";
			$sucMessage = "inserted";
		}else{
			$sql .= "UPDATE users set ";
			$sucMessage = "updated";
		}
		
		
		$sql .= "name='".$name."',age='".$age."',email='".$email."' ";
		
		if($id!=''){
			$sql .= " where id='".$id."'";
		}
		//running add/update query
		if($crud->execute($sql)){
			$errorMessage = "your record successfully ".$sucMessage;
			// in case of error, we are calling bootstrap success classes. 
			$errorClass = "alert alert-success";
		}
		
		
		
	}	

	
	
	
}else if(isset($_GET['id']) && $_GET['id']!=''){
	// in case of url id, we are showing list of users. 
	$query = "SELECT * from users where id='".$_GET['id']."'";
	$users = $crud->getData($query);	
	
	foreach($users as $user){
		$name = $user['name'];
		$age = $user['age'];
		$email = $user['email'];
	}
	
}	


?>
<div class="container">
	<div class="col-md-12 mt-title text-left <?php echo $errorClass; ?>" ><?php if(isset($errorMessage)){ echo $errorMessage; }  ?></div>
	<form name="addUpdate" id="addUpdate" action="" method="post" >
  <br>
  <div class="row">
    <div class="col-md-12">
        <div class="col-md-2">
          Name:
        </div>
        <div class="col-md-10">
          <input type="text" name="name" value="<?php echo $name; ?>">
        </div>
    </div>
  </div>
<br>

  <div class="row">
    <div class="col-md-12">
        <div class="col-md-2">
          Age:
        </div>
        <div class="col-md-10">
          <input type="text" name="age" value="<?php echo $age; ?>">
        </div>
    </div>
  </div>

<br>
  <div class="row">
    <div class="col-md-12">
        <div class="col-md-2">
          Email:
        </div>
        <div class="col-md-10">
          <input type="text" name="email" value="<?php echo $email; ?>">
        </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-3 text-left">
		  <input type="hidden" name="id" value="<?php if(isset($_GET['id'])){ echo $_GET['id']; } ?>">	
          <input type="submit" name="addUpdate" value="Submit">
    </div>
	
	<div class="col-md-7 text-left">
		  <a href="index.php">Back</a>
    </div>
  </div>
  </form>
</div>

  <?php require_once('includes/footer.php'); ?>