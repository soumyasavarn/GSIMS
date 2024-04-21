<html>
    <head>
        <style>
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
        </style>
    </head>
    <body>
<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST["submit"])) {
    $cpid = $_POST['cpid'];
    $ccost = $_POST['ccost'];
    $database = "grocery";
    $db = mysqli_connect('localhost', 'root', '', $database);
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    function detectSQLInjection($inputText) {
        $pattern = '/(union|select|insert|delete|update|where|drop table|show tables|#|--|\\*|;|=|\'|"|`)/i';
        return preg_match($pattern, $inputText);
    }

    if (detectSQLInjection($cpid) || detectSQLInjection($ccost)) {
        $stmt = $db->prepare("INSERT INTO injections (id, date) VALUES (?, ?)");
        $stmt->bind_param("is", $iid, $date1);

        // Set parameters and execute
        $iid = 1;  // example ID
        $date1 = date('Y-m-d');  // current date in YYYY-MM-DD format
        $stmt->execute();
        echo "<div class='error-message'>SQL Injection detected</div>";
    } else {
        $stmt = $db->prepare("SELECT count(1) FROM cart WHERE pid = ?");
        $stmt->bind_param("i", $cpid);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = mysqli_fetch_array($result);
        $total = $row[0];

        $stmt = $db->prepare("SELECT no_of_items FROM products WHERE ID = ?");
        $stmt->bind_param("i", $cpid);
        $stmt->execute();
        $result = $stmt->get_result();
        $row1 = mysqli_fetch_assoc($result);

        if ($row1['no_of_items'] < 1) {
            header('Location: products.php');
            exit();
        }

        $stmt = $db->prepare("SELECT id FROM curr_session");
        $stmt->execute();
        $result = $stmt->get_result();
        $cid = 1; // default CID
        if ($row = mysqli_fetch_assoc($result)) {
            $cid = $row['id'];
        }

        if ($total == 0) {
            // $stmt = $db->prepare("UPDATE products SET no_of_items = no_of_items - 1 WHERE ID = ?");
            // $stmt->bind_param("i", $cpid);
            // $stmt->execute();

            $stmt = $db->prepare("INSERT INTO cart (cid, pid, no_of_items, cost_of_item) VALUES (?, ?, 1, ?)");
            $stmt->bind_param("iii", $cid, $cpid, $ccost);
            $stmt->execute();
        } else {
            // $stmt = $db->prepare("UPDATE products SET no_of_items = no_of_items - 1 WHERE ID = ?");
            // $stmt->bind_param("i", $cpid);
            // $stmt->execute();

            $stmt = $db->prepare("UPDATE cart SET no_of_items = no_of_items + 1 WHERE pid = ? AND cid = ?");
            $stmt->bind_param("ii", $cpid, $cid);
            $stmt->execute();
        }

        header('Location: products.php');
        exit();
    }
}
?>
    </body>
</html>
