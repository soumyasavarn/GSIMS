<!DOCTYPE html>
<html>
<head>
<title>Grocery Store Management System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery-1.11.1.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

<style>
    body {
        font-family: 'Open Sans', sans-serif;
    }
    .agileits_header {
        background: #333;
        padding: 10px 0;
        color: white;
    }
    .fixed {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
    }
    .product_list_header {
        background: #fdfdfd;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.15);
    }
    .button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }
    table {
        width: 80%;
        margin-top: 20px;
        border-collapse: collapse;
    }
    th, td {
        padding: 12px;
        border: 1px solid #ccc;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
</style>
</head>

<body>
<div class="agileits_header">
 
    </div>
    <div class="clearfix"> </div>
</div>

<div class="logo_products">
    <div class="container">
        <div class="w3ls_logo_products_left">
            <h1><a href="index.php"><span>Grocery</span> Store</a></h1>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>

<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
            <li>My Cart</li>
        </ul>
    </div>
</div>

<div class="container">
    <?php
    $db="grocery";
    $connect = mysqli_connect('localhost','root','',$db);
    $query = mysqli_query($connect,"SELECT * FROM cart");

    $Cart_total=0;
    echo "<table>";
    echo "<tr><th>Product ID</th><th>No of items</th><th>Cost of item</th><th>Total cost</th><th>Add/Remove items</th></tr>";
    while ($row = mysqli_fetch_array ($query)) {
        echo "<tr>";
        echo "<td>".$row["pid"]."</td>";
        echo "<td>".$row["no_of_items"]."</td>";
        echo "<td>".$row["cost_of_item"]."</td>";
        echo "<td>".$row["no_of_items"]*$row["cost_of_item"]."</td>";
        $Cart_total += $row["no_of_items"]*$row["cost_of_item"];
        echo "<td><form action='add_one_to_cart.php' method='post'><input type='hidden' name='cpid' value='".$row["pid"]."'/><input type='submit' name='submit' value='+'/></form>
        <form action='remove_from_cart.php' method='post'><input type='hidden' name='cpid' value='".$row["pid"]."'/><input type='submit' name='submit' value='-'/></form></td>";
        
        echo "</tr>";
    }
    echo "<tr><td colspan='4'><strong>TOTAL COST OF ALL ITEMS:</strong></td><td>".$Cart_total."</td></tr>";
    echo "</table>";
    ?>
    <form action="purchase.php" method="post">
        <input type="hidden" name="cpid" value="<?php echo $row["pid"]; ?>"/>
        <input type="hidden" name="ccost" value="<?php echo $row["cost_of_item"]; ?>"/>
        <input type="submit" name="submit" value="CHECK OUT" class="button"/>
    </form>
</div>

<script>
$(document).ready(function() {
    var navoffeset=$(".agileits_header").offset().top;
    $(window).scroll(function(){
        var scrollpos=$(window).scrollTop(); 
        if(scrollpos >=navoffeset){
            $(".agileits_header").addClass("fixed");
        }else{
            $(".agileits_header").removeClass("fixed");
        }
    });
});
</script>
</body>
</html>
