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

$sql = "SELECT model_name, model_number, price FROM watches order by price desc limit 8";
$result = $conn->query($sql);
$watches = array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $watches[] = $row;
    }
    
    echo json_encode($watches);
} else {
    echo "0 results";
}
$conn->close();
?>