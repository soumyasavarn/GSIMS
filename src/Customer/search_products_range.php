<html>
<head>
    <style>
        body {
            background-image: url('b1.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
        .error-message {
            color: #D8000C; /* Red color for error messages */
            background-color: #FFD2D2; /* Light red background */
            border: 1px solid #D8000C;
            padding: 10px;
            margin: 20px auto;
            width: 90%;
            text-align: center;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(216, 0, 12, 0.4); /* Subtle shadow to make it pop out */
        }
        table {
            margin: 20px auto;
            width: 80%;
            border-collapse: collapse;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px 16px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        input[type="submit"], input[type="button"] {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }
        input[type="submit"]:hover, input[type="button"]:hover {
            background-color: #45a049;
        }
        form {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<?php
if (isset($_POST["submit"])) {
    function detectSQLInjection($inputText) {
                $pattern = '/(union|select|insert|delete|update|where|drop table|show tables|#|--|\\*|;|=|\'|"|`)/i';
                return preg_match($pattern, $inputText);
    }
    $value3 = $_POST['sitem_price_st'];
    $value4 = $_POST['sitem_price_end'];
    $database = "grocery";
    $db = mysqli_connect('localhost', 'root', '', $database);
    
    // Check the database connection
    if ($db === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    if (detectSQLInjection($value3)||detectSQLInjection($value4)) {
        $stmt = $db->prepare("INSERT INTO injections (id, date) VALUES (?, ?)");
        $stmt->bind_param("is", $iid, $date1);

        // Set parameters and execute
        $iid = 1;  // example ID
        $date1 = date('Y-m-d');  // current date in YYYY-MM-DD format
        $stmt->execute();
        echo "<div class='error-message'>SQL Injection detected</div>";
    } else {
    // Prepare a select statement to avoid SQL injection
    $query = "SELECT * FROM PRODUCTS WHERE cost >= ? AND cost <= ?";
    if ($stmt = $db->prepare($query)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("ii", $value3, $value4);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            $result = $stmt->get_result();

            // Check if the query returned any rows
            if ($result->num_rows > 0) {
                echo "<table cellpadding='5' cellspacing='5'>";
                echo "<tr><th>ID</th><th>Category</th><th>Item Name</th><th>Cost</th><th>No of items left</th></tr>";
                // Fetch result rows as an associative array
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["catogery"] . "</td><td>" . $row["Item_name"] . "</td><td>" . $row["cost"] . "</td><td>" . $row["no_of_items"] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "No records matching your query were found.";
            }
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
