<?php
session_start();
?>

<?php

$user = $_POST['name'];
$pass = $_POST['pass'];

$_SESSION['name'] = $user;
$_SESSION['pass'] = $pass;


echo  $_SESSION['name'].$_SESSION['pass'] = $pass ;

 
?>

<p> <a href ="form.php">form</a></p>
<p> <a href ="session3.php">echo session</a></p>