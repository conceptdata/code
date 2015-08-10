<?php
	if($_POST) {
		$password = $_POST['password'];
		$confirm = $_POST['confirm'];	
		if($password != $confirm) { 
?><span style='color:red'>Error: Passwords do not match!</span>	

<?php	} 

else {
	
	?>
	
  <span style='color:green'>Sucess: Passwords  match!</span>
  
  <?php
   
}
	}
?>

