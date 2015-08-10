<?php
session_start();
?>

<?php

$user = $_SESSION["login"];

$pass = $_SESSION["pass"];



echo $user ;

echo $pass;

?>