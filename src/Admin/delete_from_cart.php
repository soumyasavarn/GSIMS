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


if(isset($_POST["submit"])){
        $cpid= $_POST['cpid'];
        $database = "grocery";
        $db = mysqli_connect('localhost','root','',$database);

        function detectSQLInjection($inputText) {
            $pattern = '/(union|select|insert|delete|update|where|drop table|show tables|#|--|\\*|;|=|\'|"|`)/i';
            return preg_match($pattern, $inputText);
        }
        if (detectSQLInjection($cpid)){
            $stmt = $db->prepare("INSERT INTO injections (id, date) VALUES (?, ?)");
        $stmt->bind_param("is", $iid, $date1);

        // Set parameters and execute
        $iid = 1;  // example ID
        $date1 = date('Y-m-d');  // current date in YYYY-MM-DD format
        $stmt->execute();
            echo "<div class='error-message'>SQL Injection detected</div>";
        } else {
        $count = "SELECT no_of_items from cart where pid=$cpid";
        $row2 = $db->query($count);
        $row1 = mysqli_fetch_assoc($row2);

        $pcount = "SELECT no_of_items from products where ID=$cpid";
        $prow2 = $db->query($pcount);
        $prow1 = mysqli_fetch_assoc($prow2);
        $add= $prow1['no_of_items']+$row1['no_of_items'];

        $sql1 = "update products set no_of_items=$add where ID=$cpid";

        $result = $db->query($sql1);
        //echo $add;
        $result1 = $db->query("delete FROM cart where pid=$cpid");
            header('Location: show_cart.php');
    } 
        
    ?>
    <form action="costomer_logged.php" method="post" enctype="multipart/form-data">
        <input type="submit" name="submit" value="Go BACK"/>
    </form>
    <?php
}
?>
</body>
</html>

