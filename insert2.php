<?php


include ("functions.php");
 
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

$name= $_POST['name'];
$pass= $_POST['pass'];
$pass1= $_POST['pass1'];


   /*filledin();*/
   match($pass,$pass1);
   
   echo"<br>";
   
   cap($name); ?>
  
  <br>
  <br>
  <?php
  
  cap($pass);
echo"<br>";

$result = $conn->query ("SELECT * FROM users WHERE Name = '$name'  "); 


if ($result->num_rows>0){
	echo"That name is already in use";

}

else{
	
$result = $conn->query ("INSERT INTO users (Name,Password) VALUES ".saveToDB('$name')."  ".saveToDB('$pass')." ");


	echo"new user added";

}

$conn->close();
 ?> 