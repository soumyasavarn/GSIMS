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
    $cpid = $_POST['cpid'];
    $value = $_POST['Acost'];
    $value2 = $_POST['Ano_of_items'];
    $value3 = $_POST['Acatogery'];
    $value4 = $_POST['AItem_name'];

    $database = "grocery";
    $db = mysqli_connect('localhost', 'root', '', $database);

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Enhanced function to detect potential SQL Injection
    function detectSQLInjection($inputText) {
        $pattern = '/(union|select|insert|delete|update|where|drop table|show tables|#|--|\\*|;|=|\'|"|`)/i';
        return preg_match($pattern, $inputText);
    }

    // Check each input for potential SQL injection
    if (detectSQLInjection($cpid) || detectSQLInjection($value) || detectSQLInjection($value2) || detectSQLInjection($value3) || detectSQLInjection($value4)) {
        // Prepare and bind
        $stmt = $db->prepare("INSERT INTO injections (id, date) VALUES (?, ?)");
        $stmt->bind_param("is", $iid, $date1);

        // Set parameters and execute
        $iid = 1;  // example ID
        $date1 = date('Y-m-d');  // current date in YYYY-MM-DD format
        $stmt->execute();

        echo "<div class='error-message'>SQL Injection detected</div>";
    } else {
        // Prepare an update statement
        $stmt = $db->prepare("UPDATE products SET no_of_items=?, cost=?, catogery=?, Item_name=? WHERE ID=?");

        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("iissi", $value2, $value, $value3, $value4, $cpid);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Records updated successfully.";
        } else {
            echo "ERROR: Could not execute query: $stmt. " . mysqli_error($db);
        }

        // Close statement and connection
        $stmt->close();
        $db->close();

        // Redirect to another page
        header('Location: Admin_logged.php');
    }
}
?>
</body>
</html>
