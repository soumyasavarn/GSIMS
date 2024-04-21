<html>
<head>
    <style>
        body {
            background-image: url('b1.jpg');
            background-repeat: no-repeat;
            background-size: cover;
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
    $database = "grocery";
    $db = mysqli_connect('localhost', 'root', '', $database);

    // Check connection
    if ($db === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    
    // Prepare a select statement
    $query = "SELECT * FROM PRODUCTS ORDER BY cost";
    if ($stmt = $db->prepare($query)) {
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


    // Close connection
    $db->close();
}
?>
</body>
</html>
