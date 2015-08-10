

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


function createUser($uname,$pword) {
    $server->connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    $result = $server->query("SELECT * FROM user_list WHERE uname='".$server->real_escape_string($uname)."'");
    if ($result->num_rows() === 0) {
        if ($server->query("INSERT INTO user_list (uname) VALUES ('".$server->real_escape_string($uname)."'")) {
            echo "User added Successfully";
        } else {
            echo "Error while adding user!";
        }
    } else {
        echo "User already exists!";
    }


?>



<?php
echo $name;


mysqli_close($conn);
?>




   

