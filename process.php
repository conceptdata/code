<?php
session_start();
?>

<?php



     // collect value of input field
     $name = $_POST['firstname']; 
     if (empty($name)) {
         echo "Name is empty";
     } else {
         echo $name;
     }
	 
	 $newstr = filter_var($name, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	 
$_SESSION["login"] = "$newstr";


 // collect value of input field
     $pass = $_POST['lastname']; 
     if (empty($pass)) {
         echo "Name is empty";
     } else {
         echo $pass;
     }
	 
	
	 
$_SESSION["login"] = "$newstr";

$_SESSION["pass"] = "$pass";
?>
<a href="session.php">session</a>

<p> <a href ="output.php">output</a></p>