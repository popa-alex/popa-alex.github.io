<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "react-watches";

$productsJson = file_get_contents('php://input');
$products = json_decode($productsJson);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


if ($products->category === "all" && $products->limit == 0) {
    // get all products
    $sql = 'SELECT model_name, model_number, price FROM watches';
} elseif ($products->category != "all" && $products->limit == 0) {
    // get all products per category
    $sql = 'SELECT model_name, model_number, price FROM watches WHERE category="' . $products->category . '"';
} elseif ($products->category == "all" && $products->limit != 0) {
    // get a specified number of products of any category
    $sql = 'SELECT model_name, model_number, price FROM watches LIMIT ' . $products->limit;
}elseif ($products->category != "all" && $products->limit != 0) {
    // get a limited number of products from a certain category
    $sql = 'SELECT model_name, model_number, price FROM watches WHERE category="' . $products->category . '" LIMIT ' . $products->limit;
}

$result = $conn->query($sql);
$watches = array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $watches[] = $row;
    }
} else {
    $watches[] = "No results";    
}

echo json_encode($watches);
$conn->close();
?>