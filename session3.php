<?php
session_start();
?>

<?php

$user = $_SESSION['name'] ;
$pass = $_SESSION['pass'] ;

$user[$_SESSION['name']] = $name ;


foreach($user as $name)
{
	echo $name;
}


echo  $user;
echo"<br/>";
echo  $pass;

 
?>

<p> <a href ="form.php">form</a></p>
<p> <a href ="session3.php">echo session</a></p>