

<?php include ("db_con.php");?>

<?php

$name = $_POST["name"];
 // Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM users WHERE Name = '$name' ";
$result = mysqli_query($conn, $sql);


/* if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result))
	     {
				
        echo "id: " . $row["Id"]. " - Name: " . $row["Name"]. " -Password: " . $row["Password"]. " - Level: " . $row["Level"].
		     " - Suspend: " . $row["Suspend"].  " <br>";
         }
               } else {
                     echo "0 results";
         }
		 
		 */

if (mysqli_num_rows($result) >0) {
    // output data of each row
	while ($row = mysqli_fetch_assoc($result)) {
   
        echo " Name ". $row["Name"] . " <br />";
    }
}
     
	 
	  
 else
      {
    	    echo "no results";
      }




$conn->close();
 ?> 