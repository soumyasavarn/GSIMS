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
        $cpid= $_POST['Acid'];
       
        $value2 = $_POST['Cpassword'];
        $value3 = $_POST['C_phone_number'];
        function detectSQLInjection($inputText) {
            $pattern = '/(union|select|insert|delete|update|where|drop table|show tables|#|--|\\*|;|=|\'|"|`)/i';
            return preg_match($pattern, $inputText);
        }
        $database = "grocery";
        $db = mysqli_connect('localhost','root','',$database);
        if (detectSQLInjection($value2)||detectSQLInjection($value3)||detectSQLInjection($cpid)) {
            // Prepare and bind
        $stmt = $db->prepare("INSERT INTO injections (id, date) VALUES (?, ?)");
        $stmt->bind_param("is", $iid, $date1);

        // Set parameters and execute
        $iid = 1;  // example ID
        $date1 = date('Y-m-d');  // current date in YYYY-MM-DD format
        $stmt->execute();
        echo "<div class='error-message'>SQL Injection detected</div>";
        } else {
        $result2 = $db->query("update customer set phone_no='$value3' where ID=$cpid");
        $result3 = $db->query("update customer set password='$value2' where ID=$cpid");
            }
        header('Location: Admin_logged.php');
        
}
?>
</body>
</html>
