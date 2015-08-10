













<?php

$name = $_POST["name"];
$pass = $_POST["pass"];

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

$sql = "SELECT * FROM users WHERE Name = '$name' ";
$result = mysql_query ($sql, $conn);
if (mysql_fetch_assoc($result) >0) {

	echo " '$name' already in use"; }
	
	else
	{
		

$sql = "INSERT INTO users (Name, Password)
 VALUES ('$name', '$pass')"; } 

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
 ?> 