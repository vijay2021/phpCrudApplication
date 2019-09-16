<?php 
require_once('includes/header.php'); 
include_once('classes/Crud.php');
$crud = new Crud();

if(isset($_GET['delID']) && $_GET['delID']!=''){
	if($crud->delete($_GET['delID'],'users')){
		header('location:index.php?suc');
		exit;
	}else{
		header('location:index.php?err');
		exit;
	}
}

$query = "SELECT * from users";
$users = $crud->getData($query);
//echo '<pre>'; print_r($users); exit;
?>
<div class="container">
  <br>
  <span ><a href="addUpdate.php?action=new">Add New</a><br></span>
  		
  <div class="row">
    <div class="col-md-12 title" >
        <div class="col-md-1">
          ID
        </div>
        <div class="col-md-3">
          Name
        </div>
		<div class="col-md-3">
          Age
        </div>
		<div class="col-md-3">
          Email
        </div>
		<div class="col-md-2">
          Action
        </div>
    </div>
  </div>
  
  <?php foreach($users as $user){ ?>
  <div class="row">
    <div class="col-md-12">
        <div class="col-md-1">
          <?php echo $user['id']; ?>
        </div>
        <div class="col-md-3">
          <?php echo $user['name']; ?>
        </div>
		<div class="col-md-3">
          <?php echo $user['age']; ?>
        </div>
		<div class="col-md-3">
          <?php echo $user['email']; ?>
        </div>
		<div class="col-md-2">
          <?php echo "<a href=\"addUpdate.php?action=new&id=$user[id]\">Edit</a> | <a href=\"index.php?delID=$user[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>";		 ?>
        </div>
    </div>
  </div>
  <?php } ?>
  
  <?php require_once('includes/footer.php'); ?>

