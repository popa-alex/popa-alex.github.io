<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "react-watches";
$filename = "watches.js";
$watches = [];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = 'SELECT * FROM watches ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {        
        $watches[] = $row;
    }
}

$data = "export const watches = " . json_encode($watches);

file_put_contents($filename, $data);

//echo json_encode($watches);

$conn->close();
?>