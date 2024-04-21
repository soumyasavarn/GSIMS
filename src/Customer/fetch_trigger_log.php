<?php
header('Content-Type: application/json');
$host = 'localhost';  // Database host
$dbname = 'grocery';  // Database name
$user = 'root';  // Database username (usually 'root' for localhost)
$pass = '';  // Database password

// Enable error reporting for debugging (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    // Set the default PDO attributes to throw exceptions and use default fetch mode as associative
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    // Fetch messages from TriggerLog
    $stmt = $pdo->query("SELECT message FROM TriggerLog");
    $logs = $stmt->fetchAll();
    echo json_encode($logs);

    // Truncate the TriggerLog table
    $pdo->query("TRUNCATE TABLE TriggerLog");
} catch (PDOException $e) {
    // Output the error in JSON format
    echo json_encode(['error' => $e->getMessage()]);
}
?>
