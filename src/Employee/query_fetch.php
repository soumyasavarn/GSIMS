<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabular Data Display</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
            color: #333;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"] {
            padding: 8px 10px;
            width: calc(100% - 84px); /* Adjust width based on button width */
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        button:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9em;
            min-width: 400px;
            background: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.15);
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        h3 {
            color: #2c3e50;
            font-size: 1.5em;
            text-align: center;
            margin-top: 0;
            padding-top: 20px;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body >
   <h3>Here is the query result from database</h3>
   <?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Enable exception handling for mysqli

    if (isset($_POST["submit"])) {
        try {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "grocery";

            $query = $_POST['query'];

            $conn = new mysqli($servername, $username, $password, $dbname);

            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                echo '<table>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    foreach ($row as $value) {
                        echo '<td>' . htmlspecialchars($value) . '</td>';
                    }
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo "0 results";
            }

            $conn->close();
        } catch (mysqli_sql_exception $e) {
            echo "Error: " . $e->getMessage(); // Display the error message if an exception occurs
        }
    }
    ?>
</body>
</html>
