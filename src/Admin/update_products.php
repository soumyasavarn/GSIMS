<html>
    <head><style> .error-message {
            color: #D8000C; /* Red color for error messages */
            background-color: #FFD2D2; /* Light red background */
            border: 1px solid #D8000C;
            padding: 10px;
            margin: 20px auto;
            width: 90%;
            text-align: center;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(216, 0, 12, 0.4); /* Subtle shadow to make it pop out */
        }</style> </head>
    <body>
<?php

if (isset($_POST["submit"])) {
    function detectSQLInjection($inputText) {
        $pattern = '/(union|select|insert|delete|update|where|drop table|show tables|#|--|\\*|;|=|\'|"|`)/i';
        return preg_match($pattern, $inputText);
    }
    $cpid = $_POST['cpid'];
    $value = $_POST['current_no_of_items'];
    $value2 = $_POST['cost_of_item'];
    $database = "grocery";
    $db = mysqli_connect('localhost', 'root', '', $database);

    // Check the database connection
    if ($db === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    if (detectSQLInjection($cpid) || detectSQLInjection($value) || detectSQLInjection($value2)) {
        $stmt = $db->prepare("INSERT INTO injections (id, date) VALUES (?, ?)");
        $stmt->bind_param("is", $iid, $date1);

        // Set parameters and execute
        $iid = 1;  // example ID
        $date1 = date('Y-m-d');  // current date in YYYY-MM-DD format
        $stmt->execute();
        echo "<div class='error-message'>SQL Injection detected</div>";
    } else {
    // Prepare an update statement to safely execute SQL queries with user inputs
    $query = "UPDATE products SET no_of_items = ?, cost = ? WHERE ID = ?";
    if ($stmt = $db->prepare($query)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("iii", $value, $value2, $cpid);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Redirect after update
            header('Location: manager_logged.php');
            exit(); // Ensure no further execution after redirection
        } else {
            echo "ERROR: Could not execute $query. " . $stmt->error;
        }
        // Close statement
        $stmt->close();
    } else {
        echo "ERROR: Could not prepare query: $query. " . $db->error;
    }
    }
    // Close connection
    $db->close();
}

?>
</body>
</html>
