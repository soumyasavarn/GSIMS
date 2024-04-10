<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST["submit"])) {
    $cpid= $_POST['cpid'];
    $ccost = $_POST['ccost'];
    //$item = $_POST['item'];
    $database = "grocery";
    $db = mysqli_connect('localhost','root','',$database);

    if(!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $result = $db->query("SELECT count(1) FROM cart where pid=$cpid");
    if(!$result) {
        die("Query failed: " . $db->error);
    }
    $row = mysqli_fetch_array($result);

    $total = $row[0];


    $count = "SELECT no_of_items from products where ID=$cpid";
    $row2 = $db->query($count);
    if(!$row2) {
        die("Query failed: " . $db->error);
    }
    $row1 = mysqli_fetch_assoc($row2);
    
    if($row1['no_of_items'] < 1) {
        header('Location: products.php');
        exit(); // Add exit to stop script execution after redirection
    } else {
        if($total == 0 ) {
            $prd= "UPDATE products set no_of_items=no_of_items-1 where ID=$cpid";
            $prd1= $db->query($prd);

            $q = "INSERT INTO cart VALUES(1,1,$cpid,1,$ccost)";
            $insert = $db->query($q);
            if($insert) {
                echo "Record inserted successfully.";
            } else {
                echo "Record insertion failed.";
            } 
        } else {
            $prd= "UPDATE products set no_of_items=no_of_items-1 where ID=$cpid";
            $prd1= $db->query($prd);

            $q1= "UPDATE cart set no_of_items = no_of_items + 1 WHERE pid = $cpid";
            $update = $db->query($q1);
        }
    }
    header('Location: products.php');
    exit(); // Add exit to stop script execution after redirection
}
?>
