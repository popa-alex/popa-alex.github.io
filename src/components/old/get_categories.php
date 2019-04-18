<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "react-watches";

header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT name FROM categories";
$result = $conn->query($sql);
$categoriesArray = array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "Name: " . $row["model_name"] . "<br>Model number " . $row["model_number"]. "<br> Collection: " . $row["collection"]. "<br>Mechanism: " . $row["mechanism"] . "<br><br>";
        $categoriesArray[] = $row["name"];
    }
    
    echo json_encode($categoriesArray);
    //print_r ($categoriesArray);
} else {
    echo "0 results";
}
$conn->close();
?>