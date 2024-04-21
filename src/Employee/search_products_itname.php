<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-image: url('b1.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            font-family: 'Arial', sans-serif;
            color: #333;
        }
        .error-message {
            color: #D8000C;
            background-color: #FFD2D2;
            border: 1px solid #D8000C;
            padding: 10px;
            margin: 20px auto;
            width: 50%;
            text-align: center;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(216, 0, 12, 0.4);
            font-size: 16px;
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
    $value3 = $_POST['sitem_name'];
    $database = "grocery";
    $db = mysqli_connect('localhost', 'root', '', $database);

    if ($db === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    if (detectSQLInjection($value3)) {
        $stmt = $db->prepare("INSERT INTO injections (id, date) VALUES (?, ?)");
        $stmt->bind_param("is", $iid, $date1);
        $iid = 1;
        $date1 = date('Y-m-d');
        $stmt->execute();
        echo "<div class='error-message'>SQL Injection detected</div>";
    } else {
        $query = "SELECT * FROM PRODUCTS WHERE Item_name = ?";
        if ($stmt = $db->prepare($query)) {
            $stmt->bind_param("s", $value3);
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    echo "<table><tr><th>ID</th><th>Category</th><th>Item Name</th><th>Cost</th><th>No of items left</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["category"] . "</td><td>" . $row["Item_name"] . "</td><td>" . $row["cost"] . "</td><td>" . $row["no_of_items"] . "</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "No records matching your query were found.";
                }
            } else {
                echo "ERROR: Could not execute $query. " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "ERROR: Could not prepare query: $query. " . $db->error;
        }
    }
    $db->close();
}
?>
</body>
</html>
