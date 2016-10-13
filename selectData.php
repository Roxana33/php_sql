<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDBPDO";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, firstname, lastname, email FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) { ?>
	<table>
	<tr>
    			<td>id:</td>
    			<td>firstname:</td>
    			<td>lastname:</td>
    			<td>email:</td>
        	</tr>
    // output data of each row
    <?php while($row = $result->fetch_assoc()) : ?> 
        
        	
        	<tr>
        		<td><?php echo $row["id"]?></td>
        		<td><?php echo $row["firstname"]?></td>
				<td><?php echo $row["lastname"]?></td>
				<td><?php echo $row["email"]?></td>
        	</tr>
       
 <?php endwhile;?>
    </table>
   <?php
 
} else {
    echo "0 results";
}
$conn->close();
?>

