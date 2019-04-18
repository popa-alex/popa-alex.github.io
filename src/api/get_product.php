<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "react-watches";

$productJson = file_get_contents('php://input');
$product = json_decode($productJson);

//echo json_encode($product);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = 'SELECT model_name, model_number, description, case_diameter, case_thickness, band_material, band_width, water_resistance, mechanism, case_material, price FROM watches WHERE model_number="' . $product->model_no . '"';
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
    echo json_encode($row);
}

$conn->close();
?>