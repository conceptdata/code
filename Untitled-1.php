

<?php

$name = $_POST["name"];
$pass = $_POST["pass"];


include('db_con.php');

if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
}

/*function sanatise($user)
{
$newstr = filter_var($user, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
}

/*function test_input($user) {
	filter_var(FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
  
 }*/

$sql = "SELECT Id FROM users WHERE Name ='$name'";
$result = mysqli_query($conn, $sql);

list($count) = mysql_fetch_row($result);
			if($count >= 1) { ?>
<span style='color:red'>Error: that username is taken.</span>
<?php		} else {
				$query = sprintf("INSERT INTO users(Username,Password) VALUES ('$name','$pass');",
					mysql_real_escape_string($_POST['Username']),
					mysql_real_escape_string(md5($password)));
				mysql_query($query);
			?>
<span style='color:green'>Congratulations, you registered successfully!</span>
<?php
}


?>



<?php
echo $name;


mysqli_close($conn);
?>




   

