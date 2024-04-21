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
        if (detectSQLInjection($cpid)) {
            $stmt = $db->prepare("INSERT INTO injections (id, date) VALUES (?, ?)");
        $stmt->bind_param("is", $iid, $date1);

        // Set parameters and execute
        $iid = 1;  // example ID
        $date1 = date('Y-m-d');  // current date in YYYY-MM-DD format
        $stmt->execute();
            echo "<div class='error-message'>SQL Injection detected</div>";
        } else {
        $count = "SELECT no_of_items from products where ID=$cpid";
        $row2 = $db->query($count);
        $row1 = mysqli_fetch_assoc($row2);
        //$count1=$row1[0];
        //print_r($row1);
        //echo $row1['no_of_items'];
        $curr_user_id = 1;

        // Fetch the current user ID from the curr_session table
        $query1 = mysqli_query($db, "SELECT * FROM curr_session");

        if ($query1 && mysqli_num_rows($query1) > 0) {
        // Fetch the first row as an associative array
        $row = mysqli_fetch_assoc($query1);
        
        // Access the value of the id column in the first row
        $curr_user_id = $row['id'];
        } else {
        echo "No rows found in curr_session table.";
        }
        if($row1['no_of_items']<1){
            //echo $row1['no_of_items'];
            header('Location: show_cart.php');
        }
        else{
        $result = $db->query("update cart set no_of_items=no_of_items+1 where pid=$cpid and cid=$curr_user_id");
        
            header('Location: show_cart.php');
        }
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
