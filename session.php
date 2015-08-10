<?php
session_start();
?>
<?php include ("functions.php");?>
<?php

$user = $_POST['pass'];

include ("db_con.php");

dboutput($user);
 
?>

<p> <a href ="form.php">form</a></p>