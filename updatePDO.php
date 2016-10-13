<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDBPDO";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// prepare sql and bind parameters
    $stmt = $conn->prepare("UPDATE MyGuests SET lastname='Dinu' WHERE id = :id");

    $stmt->bindParam(':id', $id);

    $id = 2;
    $stmt->execute();

echo "New records has been updated successfully";

}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>