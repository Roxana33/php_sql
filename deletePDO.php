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

// sql to delete a record
//$sql = "DELETE FROM MyGuests WHERE id=3";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$stmt = $conn->prepare("DELETE FROM MyGuests WHERE id=:id");
    $stmt->bindParam(':id', $id);
    
    $id = 4;
    $stmt->execute();

 	echo "Se ha borrado";
    

	if ($conn->query($sql) === TRUE) {
	    echo "Record deleted successfully";
	} else {
	    echo "Error deleting record: " . $conn->error;
	}
}
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
    
  	$conn->close();
?>