<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>


</head>

<body>


<h1>login page</h1>
<form action="process.php" method="post">
 First name:<br>
<input type="text" name="firstname" >
<br>
 Last name:<br>
<input type="text" name="lastname" >
<br><br>
<?php 
?>
<select name="Name">
<?php

include ("db_con.php");
if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
}
 
$sql = mysqli_query("SELECT Name FROM users");
while ($row = mysqli_fetch_array($sql, $conn)){
echo "<option value=\"owner1\">" . $row['Name'] . "</option>";
}
?>
</select>
<input type="submit" value="Submit">
</form> 

<a href="update.php">update</a>
<a href="list.php">list</a>
</body>
</html>