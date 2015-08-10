<?php

/**
 * Save data to database
 * @param $str - string containing data
 * @return string
 */
function saveToDB($str) {
	return mysqli_real_escape_string($str);
}

/**
 * Read html from database
 * @param string containing html
 */
function readHTMLFromDB($str) {
	return stripslashes($str);
}

/**
 * Read data from database
 * @param $str - string containing data
 * @return string
 */
function readFromDB($str) {
	return htmlentities(stripslashes($str),ENT_COMPAT,'UTF-8');
}

function dboutput($user){
	
global $servername;
global $username;
global $password;
global $conn;
	
$sql = "SELECT * FROM users WHERE Name = '$user'  ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result))
	     {
				
        echo "id: " . $row["Id"]. " - Name: " . $row["Name"]. " -Password: " . $row["Password"]. " - Level: " . $row["Level"].
		     " - Suspend: " . $row["Suspend"].  " <br>";
         }
               } else {
                     echo "0 results";
         }


echo $user;
}


function match($check, $check2){
	if ($check != $check2){
		echo"<span style='color:red'>Error: Passwords do not match!</span>";}
		else{
		echo"<span style='color:green'>Sucess: Passwords  match!</span>";}
}


function cap($input){
	$upper = strtoupper($input);
	echo $upper;
}

	
function passvariable($variable){
		if (empty($_POST["name"])) {
     $nameErr = "Name is required";
   }
   echo $nameErr;
	}
 ?>