<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<?php


function checkinput()
{
	if ($pass != $pass2)
	{
		echo 'password do not match';}
		
		else{
			
			echo'password match';}
			
}
 

function increment($val1,$val2 = 20)
    {
		
		
		
		$total = $val1 + $val2;
		
		echo $total;
	}
	
	
	
function tabledata($data)
{
echo"<table>";

reset ($data);

$value = current($data);

while ($value){
	
	echo "<tr><td>".$value."</td></tr>\n";
	$value = next($data);
	
	
}
echo"<\table>";
}

$val10 = 10;
	
	increment($vars1);
	
	echo $val10;
	
	$my_array = array('1.','2.','3.');
	tabledata($my_array);


?>
</body>
</html>