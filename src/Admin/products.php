<!DOCTYPE html>
<html>
<head>
<title>Grocery Store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Products :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
    function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>
<style>
    .agileits_header {
        background-color: #333;
        color: white;
        padding: 10px 0;
    }
    .agileits_header.fixed {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
    }
    .logo_products h1 a {
        color: green; /* Example color */
    }
    table {
        width: 100%;
        margin: 20px 0;
        border-collapse: collapse;
    }
    th, td {
        padding: 10px;
        border: solid 1px #ccc;
        text-align: center;
    }
    th {
        background-color: #f2f2f2;
    }
    .button {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }
</style>
</head>
<body>
<div class="agileits_header">
    <div class="product_list_header">
        <form action="#" method="post" class="last">
            <fieldset>
                <input type="hidden" name="cmd" value="_cart" />
                <input type="hidden" name="display" value="1" />
                <a href="show_cart.php"><input type="button" value="View your cart" class="button" /></a>
            </fieldset>
        </form>
    </div>
    <div class="w3l_header_right">
        
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
            <li>All products</li>
        </ul>
    </div>
</div>
<div class="container">
    <?php
    $db="grocery";
    $connect = mysqli_connect('localhost','root','',$db);
    $query = mysqli_query($connect,"SELECT * FROM products");
    echo "<center><table cellpadding='5' cellspacing='5'>";
    echo "<tr><th>Product ID</th><th>Category</th><th>Item Name</th><th>Cost of Each Item</th><th>Number of Items</th><th>Cart</th></tr>";
    while ($row = mysqli_fetch_array($query)) {
        echo "<tr>";
        echo "<td>".$row["ID"]."</td>";
        echo "<td>".$row["category"]."</td>";
        echo "<td>".$row["Item_name"]."</td>";
        echo "<td>".$row["cost"]."</td>";
        echo "<td>".$row["no_of_items"]."</td>";
        echo "<td><form action='add_to_cart.php' method='post' enctype='multipart/form-data'>
            <input type='hidden' name='cpid' value='".$row["ID"]."'/>
            <input type='hidden' name='ccost' value='".$row["cost"]."'/>
            <input type='submit' name='submit' value='ADD' class='button'/></form></td>";
        echo "</tr>";
    }
    echo "</table></center>";
    ?>
</div>
<script>
$(document).ready(function() {
    var navoffset = $(".agileits_header").offset().top;
    $(window).scroll(function(){
        var scrollpos = $(window).scrollTop();
        if(scrollpos >= navoffset){
            $(".agileits_header").addClass("fixed");
        }else{
            $(".agileits_header").removeClass("fixed");
        }
    });
});
</script>
</body>
</html>
