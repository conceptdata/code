<?php

global $servername;
global $username;
global $password;
define ('$dbname', 'users');
global $conn;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

// Create connection
 $conn = mysqli_connect($servername, $username, $password, $dbname);
 // Check connection
 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
}


?>
