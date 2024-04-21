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

    function detectSQLInjection($inputText) {
        $pattern = '/(union|select|insert|delete|update|where|drop table|show tables|#|--|\\*|;|=|\'|"|`)/i';
        return preg_match($pattern, $inputText);
    }
    
    // Connect to the database
    $database = "grocery";
    $db = mysqli_connect('localhost', 'root', '', $database);
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check for SQL Injection
    if (detectSQLInjection($cpid)) {
        $stmt = $db->prepare("INSERT INTO injections (id, date) VALUES (?, ?)");
        $stmt->bind_param("is", $iid, $date1);

        // Set parameters and execute
        $iid = 1;  // example ID
        $date1 = date('Y-m-d');  // current date in YYYY-MM-DD format
        $stmt->execute();
        echo "<div class='error-message'>SQL Injection detected</div>";
    } else {
        // Updating cart items using prepared statements
        if ($stmt = $db->prepare("UPDATE cart SET no_of_items=no_of_items-1 WHERE pid=?")) {
            $stmt->bind_param("i", $cpid);
            $stmt->execute();
            $stmt->close();
        }

        // Updating product items
        if ($stmt = $db->prepare("UPDATE products SET no_of_items=no_of_items+1 WHERE ID=?")) {
            $stmt->bind_param("i", $cpid);
            $stmt->execute();
            $stmt->close();
        }

        // Deleting items from cart if no items left
        if ($stmt = $db->prepare("SELECT count(1) FROM cart WHERE no_of_items<1 AND pid=?")) {
            $stmt->bind_param("i", $cpid);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_array();
            $total = $row[0];

            if ($total > 0) {
                if ($deleteStmt = $db->prepare("DELETE FROM cart WHERE pid=?")) {
                    $deleteStmt->bind_param("i", $cpid);
                    $deleteStmt->execute();
                    $deleteStmt->close();
                }
            }
            $stmt->close();
        }

        header('Location: show_cart.php');
        exit;
    }
}
?>
<form action="customer_logged.php" method="post" enctype="multipart/form-data">
    <input type="submit" name="submit" value="Go BACK"/>
</form>
</body>
<html>