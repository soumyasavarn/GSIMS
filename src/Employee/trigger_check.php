<?php
header('Content-Type: application/json');
ini_set('display_errors', 0);
ini_set('log_errors', 1);

$host = 'localhost';  // Host name
$username = 'root';  // Database username
$password = '';  // Database password
$database = 'grocery';  // Database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to fetch products
$sql = "SELECT Item_name, no_of_items FROM products";
$result = $conn->query($sql);

$products = [];
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    echo json_encode($products);
} else {
    echo json_encode([]);
}

$conn->close();
?>
