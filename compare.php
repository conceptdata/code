<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<?php
include ("func.php");

$name = $_POST['name'];

$pass = $_POST['pass'];

compare($name, $pass);



?>

</body>
</html>