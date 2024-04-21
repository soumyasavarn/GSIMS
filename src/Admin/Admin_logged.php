<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html>
<head>
<title>Grocery Store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<style>
        #alertBox {
            padding: 10px;
            margin-top: 10px;
            background-color: #f8d7da; /* Light red background */
            color: #721c24; /* Dark red text */
            border: 1px solid #f5c6cb; /* Light red border */
            border-radius: 5px;
            display: none; /* Hidden by default */
        }
    </style>
    <script>
        // Fetch product data from the server
        function fetchProductData() {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', 'trigger_check.php', true);
            xhr.onload = function () {
                if (this.status === 200 && this.responseText) {
                    try {
                        console.log(this.responseText);
                        const products = JSON.parse(this.responseText);
                        checkProductQuantities(products);
                    } catch (e) {
                        console.error('Error parsing JSON!', e);
                    }
                } else {
                    console.error('Failed to fetch products: ', this.statusText);
                }
            };
            xhr.onerror = function () {
                console.error('Request failed.');
            };
            xhr.send();
        }

        // JavaScript function to check product quantities and display alerts
        function checkProductQuantities(products) {
            const threshold = 200;  // Define the threshold for low stock alert
            const alertBox = document.getElementById('alertBox');
            let alertMessage = '';

            // Loop through each product in the array
            products.forEach(product => {
                // Check if the product quantity falls below the threshold
                if (product.no_of_items < threshold) {
                    // Create a message for this product
                    alertMessage += `Warning: Low stock for ${product.Item_name}. Current stock: ${product.no_of_items}<br>`;
                }
            });

            if (alertMessage) {
                alertBox.innerHTML = alertMessage;
                alertBox.style.display = 'block'; // Show the alert box if there are any alerts
            } else {
                alertBox.style.display = 'none'; // Hide the alert box if no alerts
            }
        }

        // Set interval to fetch and check product quantities every 20 seconds
        setInterval(() => {
            console.log("Fetching and checking product quantities...");
            fetchProductData();
        }, 20000);  // 20000 milliseconds = 20 seconds
    </script>




<style>
        #triggerLogBox {
            padding: 10px;
            margin-top: 10px;
            background-color: #d1ecf1; /* Light blue background */
            color: #0c5460; /* Dark blue text */
            border: 1px solid #bee5eb; /* Light blue border */
            border-radius: 5px;
            display: none; /* Hidden by default */
        }
    </style>
    <script>
        // Fetch trigger log data from the server
        function fetchTriggerLogData() {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', 'fetch_trigger_log.php', true);
            xhr.onload = function () {
                if (this.status === 200 && this.responseText) {
                    try {
                        console.log(this.responseText);
                        const logs = JSON.parse(this.responseText);
                        displayTriggerLogs(logs);
                    } catch (e) {
                        console.error('Error parsing JSON!', e);
                    }
                } else {
                    console.error('Failed to fetch trigger logs: ', this.statusText);
                }
            };
            xhr.onerror = function () {
                console.error('Request failed.');
            };
            xhr.send();
        }

        // JavaScript function to display trigger logs
        function displayTriggerLogs(logs) {
            const logBox = document.getElementById('triggerLogBox');
            let logMessage = '';

            // Loop through each log entry in the array
            logs.forEach(log => {
                // Add the log message to the display message
                logMessage += `${log.message}<br>`;
            });

            if (logMessage) {
                logBox.innerHTML = logMessage;
                logBox.style.display = 'block'; // Show the log box if there are any messages
            } else {
                logBox.style.display = 'none'; // Hide the log box if no messages
            }
        }

        // Set interval to fetch and check trigger logs every 20 seconds
        setInterval(() => {
            console.log("Fetching and checking trigger logs...");
            fetchTriggerLogData();
        }, 20000);  // 20000 milliseconds = 20 seconds
    </script>



<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>
	
<body>
<!-- header -->
	<div class="agileits_header">
		
		
		<div class="product_list_header">  
			<form action="#" method="post" class="last">
                
            </form>
		</div>
		<div class="w3l_header_right" >
			<div style="padding: 6px; ">
		<a href="index1.html" style="display: inline-block; padding: 10px 20px; background-color: #ff6347; color: #fff; text-decoration: none; border-radius: 5px; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#e74c3c'" onmouseout="this.style.backgroundColor='#ff6347'">Logout</a>
</div>
		</div>
		
		<div class="clearfix"> </div>
	</div>
<!-- script-for sticky-nav -->
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
<!-- //script-for sticky-nav -->
	<div class="logo_products">
		<div class="container">
			<div class="w3ls_logo_products_left">
				<h1><a href="index.html"><span>Grocery</span> Store</a></h1>
			</div>
			
			
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->

<!-- banner -->
	<div class="banner">
		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
			 <!-- Brand and toggle get grouped for better mobile display -->
			  <div class="navbar-header nav_2">
				  <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
			   </div> 
			   <!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav nav_1">
						<li><a href="#products_edit">Products Database</a></li>
						<li><a href="#customer">Customer</a></li>
						<li><a href="#add_employee">Employee</a></li>
						<li><a href="#All_transactions">All Transactions</a></li>
						<li><a href="#search_products">Search for Products Based on Specifications</a></li>
						<li><a href="#search_products_itname">Search for Products Based on Item Name</a></li>
						<li><a href="#search_products_range">Search for Products Based on Item Price Range</a></li>
						<li><a href="#search_products_itsort">Sort Products based on price</a></li>
						
					</ul>
				 </div><!-- /.navbar-collapse -->
			</nav>
		</div>
		<div class="w3l_banner_nav_right">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="w3l_banner_nav_right_banner">
								<h3>Make your <span>food</span> with Spicy.</h3>
								<div class="more">
									<a href="#" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
								</div>
							</div>
						</li>
						<li>
							<div class="w3l_banner_nav_right_banner1">
								<h3>Make your <span>food</span> with Spicy.</h3>
								<div class="more">
									<a href="#" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
								</div>
							</div>
						</li>
						<li>
							<div class="w3l_banner_nav_right_banner2">
								<h3>upto <i>50%</i> off.</h3>
								<div class="more">
									<a href="#" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</section>
			<!-- flexSlider -->
				<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
				<script defer src="js/jquery.flexslider.js"></script>
				<script type="text/javascript">
				$(window).load(function(){
				  $('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
					  $('body').removeClass('loading');
					}
				  });
				});
			  </script>
			<!-- //flexSlider -->
		</div>
		<div class="clearfix"></div>
	</div>
<!-- banner -->
	<!-- <div class="banner_bottom">
			<div class="wthree_banner_bottom_left_grid_sub">
			</div>
			<div class="wthree_banner_bottom_left_grid_sub1">
				<div class="col-md-4 wthree_banner_bottom_left">
					<div class="wthree_banner_bottom_left_grid">
						<img src="images/4.jpg" alt=" " class="img-responsive" />
						<div class="wthree_banner_bottom_left_grid_pos">
							<h4>Discount Offer <span>25%</span></h4>
						</div>
					</div>
				</div>
				<div class="col-md-4 wthree_banner_bottom_left">
					<div class="wthree_banner_bottom_left_grid">
						<img src="images/7.jpg" alt=" " class="img-responsive" />
						<div class="wthree_banner_btm_pos">
							<h3>introducing <span>best store</span> for <i>groceries</i></h3>
						</div>
					</div>
				</div>
				<div class="col-md-4 wthree_banner_bottom_left">
					<div class="wthree_banner_bottom_left_grid">
						<img src="images/6.jpg" alt=" " class="img-responsive" />
						<div class="wthree_banner_btm_pos1">
							<h3>Save <span>Upto</span> $10</h3>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
	</div> -->
<!-- top-brands -->
	
<!-- //top-brands -->
<!-- fresh-vegetables -->
<div id="alertBox"></div> <!-- Container for displaying alert messages -->
<div id="triggerLogBox"></div> <!-- Container for displaying trigger log messages -->

<style>
  /* Style for tables */
  table {
    border-collapse: collapse;
    width: 100%;
  }
  th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
  }
  th {
    background-color: #f2f2f2;
  }

  /* Style for forms */
  form {
    margin-bottom: 20px;
  }
  input[type="text"], input[type="number"], input[type="submit"] {
    padding: 8px;
    margin-right: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }

  /* Style for headings */
  h1 {
    margin-bottom: 20px;
  }
</style>
<center><h1> PRODUCTS</h1></center>
	<div id="products_edit">
		<?php
   $db="grocery";
   $connect = mysqli_connect('localhost','root','',$db);
   $query = mysqli_query($connect,"SELECT * FROM products");
   
   
      echo "<center>";
      ?><table cellpadding="5" cellspacing="5">
      	<?php
      echo "<tr>";
      echo "<th>"; echo "Product ID"; echo "</th>";
      echo "<th>"; echo "catogery"; echo "</th>";
      echo "<th>"; echo "Item_name"; echo "</th>";
      echo "<th>"; echo "cost of each item"; echo "</th>";
      echo "<th>"; echo "no_of_items"; echo "</th>";
      
      
      echo "</td>";
      echo "</tr>";
 while ($row = mysqli_fetch_array ($query)) {
      echo "<tr>";
      echo "<td>"; echo $row["ID"]; echo "</td>";
      echo "<td>"; echo $row["catogery"]; echo "</td>";
      echo "<td>"; echo $row["Item_name"]; echo "</td>";
      echo "<td>"; echo $row["cost"]; echo "</td>";
      echo "<td>"; echo $row["no_of_items"]; echo "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>";
      echo "</td>";
      echo "<td colspan='3'>";
      ?><form action="A_update_products.php" method="post">
 		
 		<input type="text" placeholder="<?php echo $row["catogery"];?>" value="<?php echo $row["catogery"];?>" name="Acatogery"/>
 		<input type="text" placeholder="<?php echo $row["Item_name"];?>" value="<?php echo $row["Item_name"];?>" name="AItem_name"/>
 		<input type="number" placeholder="<?php echo $row["cost"];?>" value="<?php echo $row["cost"];?>" name="Acost"/>
 		<input type="number" placeholder="<?php echo $row["no_of_items"];?>" value="<?php echo $row["no_of_items"];?>" name="Ano_of_items"/>
		<input type="hidden" name="cpid" value='<?php echo $row["ID"];?>'/>
      	<input type="submit" name="submit" value="Update"/>
    </form>
      <?php echo "</td>";
      echo "</tr>";
  }

  echo "</table>";
  echo "</center>";
?>
	</div>

<br><br><br><center><h1>Customer List</h1></center>
<div id="customer">
		<?php
   $db="grocery";
   $connect = mysqli_connect('localhost','root','',$db);
   $query = mysqli_query($connect,"SELECT * FROM customer");
   
   
      echo "<center>";
      ?><table cellpadding="5" cellspacing="5">
      	<?php
      echo "<tr>";
      echo "<th>"; echo "ID"; echo "</th>";
      echo "<th>"; echo "Username"; echo "</th>";
      echo "<th>"; echo "Password"; echo "</th>";
      echo "<th>"; echo "Phone number"; echo "</th>";
      echo "<th>"; echo "Date of join"; echo "</th>";
      echo "</tr>";
 while ($row = mysqli_fetch_array ($query)) {
      echo "<tr>";
      echo "<td>"; echo $row["ID"]; echo "</td>";
      echo "<td>"; echo $row["user"]; echo "</td>";
      echo "<td>"; echo $row["password"]; echo "</td>";
      echo "<td>"; echo $row["phone_no"]; echo "</td>";
      echo "<td>"; echo $row["Time_of_join"]; echo "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>";
      echo "</td>";
      echo "<td>";
      echo "</td>";
      echo "<td colspan='2'>";
      ?><form action="A_update_customer.php" method="post">
 		
 		<input type="text" placeholder="<?php echo $row["password"];?>" value="<?php echo $row["password"];?>" name="Cpassword"/>
 		<input type="number" placeholder="<?php echo $row["phone_no"];?>" value="<?php echo $row["phone_no"];?>" name="C_phone_number"/>
		<input type="hidden" name="Acid" value='<?php echo $row["ID"];?>'/>
      	<input type="submit" name="submit" value="Update"/>
    </form>
      <?php echo "</td>";
      echo "</tr>";


  }

  
  echo "</table>";
  echo "</center>";
?>
	</div>
<br><br><br><center><h1>Employee List</h1></center>
		<div id="add_employee">
		<?php
   $db="grocery";
   $connect = mysqli_connect('localhost','root','',$db);
   $query = mysqli_query($connect,"SELECT * FROM employee");
   
   
      echo "<center>";
      ?><table cellpadding="5" cellspacing="5">
      	<?php
      echo "<tr>";
      echo "<th>"; echo "ID"; echo "</th>";
      echo "<th>"; echo "Username"; echo "</th>";
      echo "<th>"; echo "Password"; echo "</th>";
      echo "<th>"; echo "Phone number"; echo "</th>";
      echo "<th>"; echo "Date of join"; echo "</th>";
      echo "</tr>";
 while ($row = mysqli_fetch_array ($query)) {
      echo "<tr>";
      echo "<td>"; echo $row["eid"]; echo "</td>";
      echo "<td>"; echo $row["e_username"]; echo "</td>";
      echo "<td>"; echo $row["e_password"]; echo "</td>";
      echo "<td>"; echo $row["e_phone_no"]; echo "</td>";
      echo "<td>"; echo $row["e_date_join"]; echo "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>";
      echo "</td>";
      echo "<td>";
      echo "</td>";
      echo "<td colspan='2'>";
      ?><form action="A_update_emp.php" method="post">
 		<input type="text" placeholder="<?php echo $row["e_password"];?>" value="<?php echo $row["e_password"];?>" name="Apassword"/>
 		<input type="number" placeholder="<?php echo $row["e_phone_no"];?>" value="<?php echo $row["e_phone_no"];?>" name="A_phno"/>
		<input type="hidden" name="Aeid" value='<?php echo $row["eid"];?>'/>
      	<input type="submit" name="submit" value="Update"/>
    </form>
      <?php echo "</td>";
      echo "</tr>";


  }

  echo "<tr>";
      echo "<td colspan='4'>";
      ?><form action="add_employee.php" method="post">
 		
 		<input type="text" placeholder="Username" name="e_username"/>
 		<input type="text" placeholder="Password" name="e_password"/>
 		<input type="number" placeholder="Phone Number" name="e_phone_no"/>
      	<input type="submit" name="submit" value="Add Employee"/>
    </form>
      <?php echo "</td>";
      
      echo "</tr>";
  echo "</table>";
  echo "</center>";
?>
	</div>
<br><br><br><center><h1>All transactions</h1></center>

<div id="All_transactions">
    <?php
    $db = "grocery";
    $connect = mysqli_connect('localhost', 'root', '', $db);
    if (!$connect) {
        die('Connection failed: ' . mysqli_connect_error());
    }
    $query = mysqli_query($connect, "SELECT * FROM purchase where cost_of_items>0 ORDER by date_time desc");
    
    $pcids = [];
    $ppids = [];
    $no_of_items = [];
    $cost_of_items = [];
    $dates = [];

    echo "<center><table cellpadding='45' cellspacing='45'>";
    echo "<tr><th>Customer ID</th><th>Product ID</th><th>No of items</th><th>cost of items</th><th>Date of purchase</th></tr>";
    while ($row = mysqli_fetch_array($query)) {
        echo "<tr>";
        echo "<td>" . $row["pcid"] . "</td>";
        echo "<td>" . $row["ppid"] . "</td>";
        echo "<td>" . $row["no_of_items"] . "</td>";
        echo "<td>" . $row["cost_of_items"] . "</td>";
        echo "<td>" . $row["date_time"] . "</td>";
        echo "</tr>";
        
        // Gather data for charts
        $pcids[] = $row["pcid"];
        $ppids[] = $row["ppid"];
        $no_of_items[] = $row["no_of_items"];
        $cost_of_items[] = $row["cost_of_items"];
        $dates[] = $row["date_time"];
    }
    echo "</table></center>";
	
	
	

	// Array to hold the aggregated data
	$aggregated_data = [];

	// Loop through the data arrays
	for ($i = 0; $i < count($dates); $i++) {
    $date = $dates[$i];
    // Extract only the year and month part from the date
    $yearMonth = date('Y-m', strtotime($date));

    $numItems = $no_of_items[$i];
    $costItems = $cost_of_items[$i];

    // Check if the year-month already exists in the aggregated data
    if (!isset($aggregated_data[$yearMonth])) {
        $aggregated_data[$yearMonth] = [
            'total_items' => 0,
            'total_cost' => 0
        ];
    }

    // Add current item and cost to the total for this year-month
    $aggregated_data[$yearMonth]['total_items'] += $numItems;
    $aggregated_data[$yearMonth]['total_cost'] += $costItems;
	}
	// Arrays to store separated data
$dates_array = [];
$costs_array = [];
$items_array = [];

// Extract data into separate arrays
foreach ($aggregated_data as $yearMonth => $data) {
    $dates_array[] = $yearMonth;              // Store the month-year
    $costs_array[] = $data['total_cost'];     // Store the total cost for this month-year
    $items_array[] = $data['total_items'];    // Store the total number of items for this month-year
}
    ?>
    <canvas id="costChart"></canvas>
    <canvas id="itemsChart"></canvas>
    <canvas id="SQLinjections"></canvas>
</div>
<?php

    $db = "grocery";
    $connect = mysqli_connect('localhost', 'root', '', $db);
    if (!$connect) {
        die('Connection failed: ' . mysqli_connect_error());
    }
    $query = mysqli_query($connect, "SELECT sum(id) as y_axis,date as x_axis FROM injections GROUP BY date ORDER BY date;
    ");

    $x = [];
    $y = [];

   while ($row = mysqli_fetch_array($query)) {
        $x[] = $row["x_axis"];
        $y[] = $row["y_axis"];
    }

?>
<?php
// Database credentials
$host = 'localhost'; // Host name
$username = 'root'; // Username
$password = ''; // Password
$database = 'grocery'; // Database name

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to fetch the number of times each item is bought, along with the item name
$sql = "SELECT p.ppid, SUM(p.no_of_items) as total_bought, pr.Item_name 
        FROM purchase p
        JOIN products pr ON p.ppid = pr.ID
        GROUP BY p.ppid, pr.Item_name";
$result = $conn->query($sql);

$labels = []; // To store item names
$data = []; // To store how many times each item was bought

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $labels[] = $row["Item_name"];
        $data[] = $row["total_bought"];
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>


<canvas id="ppidPieChart" width="400" height="400"></canvas>
    <script>
        var ctx = document.getElementById('ppidPieChart').getContext('2d');
        var ppidPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Number of Items Bought Per Product',
                    data: <?php echo json_encode($data); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                }
            }
        });
    </script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Combine dates, costs, and items into an array of objects
    var data = <?php echo json_encode(array_map(null, $dates_array, $costs_array, $items_array)); ?>;
    
    // Sort the data array based on dates
    data.sort(function(a, b) {
        return new Date(a[0]) - new Date(b[0]);
    });

    // Extract sorted dates, costs, and items from sorted data
    var sortedDates = data.map(function(item) {
        return item[0];
    });
    var sortedCosts = data.map(function(item) {
        return item[1];
    });
    var sortedItems = data.map(function(item) {
        return item[2];
    });

    var ctx1 = document.getElementById('costChart').getContext('2d');
    var costChart = new Chart(ctx1, {
        type: 'line',
        data: {
            labels: sortedDates,
            datasets: [{
                label: 'Cost of Items',
                data: sortedCosts,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    var ctx2 = document.getElementById('itemsChart').getContext('2d');
    var itemsChart = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: sortedDates,
            datasets: [{
                label: 'Number of Items',
                data: sortedItems,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        }
    });
});

var ctx3 = document.getElementById('SQLinjections').getContext('2d');

    var itemsChart = new Chart(ctx3, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($x); ?>,
            datasets: [{
                label: 'Number of Cyber Attacks',
                data: <?php echo json_encode($y); ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        }
    });


</script>




<h1 style="color: #5a5a5a;">Query over the Database in Natural Language</h1>
    <textarea id="inputText" placeholder="Enter your query in natural language..." rows="4" cols="50" style="width: 80%; padding: 10px; margin-top: 5px; margin-bottom: 10px; box-sizing: border-box; border-radius: 5px; border: 1px solid #ccc;"></textarea><br>
    <button id="generateBtn" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#45a049'" onmouseout="this.style.backgroundColor='#4CAF50'">Generate</button>
    <p><strong>Generated Text:</strong></p>
    <p id="outputText" style="font-size: 16px;"></p>

    <script type="importmap">
        {
            "imports": {
                "@google/generative-ai": "https://esm.run/@google/generative-ai"
            }
        }
    </script>
    <script type="module">
        import { GoogleGenerativeAI } from "@google/generative-ai";
        const API_KEY = "AIzaSyApnVIlemugPLy57No8t5LNzgOe7WWk2Hw"; // Replace with your actual API key
        const genAI = new GoogleGenerativeAI(API_KEY);

        function setup() {
            const button = document.getElementById("generateBtn");
            button.addEventListener("click", async () => {
                const prompt_start = "You have to deduce sql statements from the human like query. 1. 'customer' table consists of attributes: 'ID' is primary key,	'user' is name of the customer, 'password',	'phone_no', 'Time_of_join'.	'ID' is primary key and user is foreign key on purchase table. 2. 'purchase'	table consists of all the transaction details and column names of 'purchase' table are: 'pcid' links to customer table , 'ppid' product id no , 'no_of_items', 'cost_of_items', 'date_time'. 'pcid' is a foreign key linking it to the unique customer ID. Query:  " 
                const inputText = document.getElementById("inputText").value;
                const prompt_end = "I am using XAMMP and write codes that run for previous versions. Return a valid SQL syntax in normal text form and use column names provided here only. "
                const model = genAI.getGenerativeModel({ model: "gemini-pro" }); // Replace MODEL_NAME with the actual model name

                try {
                    const result = await model.generateContent(prompt_start+inputText+prompt_end);
                        const response = await result.response;
                        console.log(response);

                        const text = response.text();
                        console.log(text);

                    document.getElementById("outputText").innerText = text;
                } catch (error) {
                    console.error("Error generating text:", error);
                    document.getElementById("outputText").innerText = "Error in text generation.";
                }
            });
        }

        if (document.readyState === "loading") {
            document.addEventListener("DOMContentLoaded", setup);
        } else {
            setup();  // DOMContentLoaded event might have been missed if script loads after the document is ready
        }
    </script>

<form action="query_fetch.php" method="post" style="margin: 20px;" enctype="multipart/form-data">
        <input type="text" name="query" placeholder="SQL Query" style="padding: 10px; width: 300px; margin-right: 10px; border: 1px solid #ccc; border-radius: 4px;">
        <input type="submit" name="submit" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer;" value="Send it to the database"/>
</form>

<br><br><br><center><h1>SEARCH</h1></center>
<style>
    .centered-content {
        text-align: center;
        width: 100%;
    }
    .form-table {
        margin: 20px auto;
        padding: 5px;
    }
    .form-input, .form-submit {
        padding: 8px;
        margin-bottom: 10px;
        width: 100%;
        border: 2px solid #ccc;
        border-radius: 5px; /* Rounded borders */
        box-sizing: border-box; /* Include padding and border in the element's total width and height */
    }
    .form-submit {
        background-color: #4CAF50; /* Green background */
        color: white; /* White text */
        border: none; /* No borders */
        cursor: pointer; /* Pointer cursor on hover */
        transition: background-color 0.3s ease; /* Smooth transition for background color */
    }
    .form-submit:hover {
        background-color: #45a049; /* Slightly darker green on hover */
    }
    .form-submit:active {
        background-color: #397d39; /* Even darker green when pressed */
    }
</style>

<div id="search_products" class="centered-content">
    <?php
    $db = "grocery";
    $connect = mysqli_connect('localhost', 'root', '', $db);
    if (!$connect) {
        die('Connection failed: ' . mysqli_error($connect));
    }

    $forms = [
        [
            'action' => 'search_products.php',
            'inputs' => [
                ['type' => 'number', 'name' => 'spid', 'placeholder' => 'Product ID'],
                ['type' => 'text', 'name' => 'scategory', 'placeholder' => 'Category'],
                ['type' => 'text', 'name' => 'sitem_name', 'placeholder' => 'Item Name'],
                ['type' => 'number', 'name' => 'scost', 'placeholder' => 'Cost']
            ],
            'submitLabel' => 'Search For Products'
        ],
        [
            'action' => 'search_products_itname.php',
            'inputs' => [
                ['type' => 'text', 'name' => 'sitem_name', 'placeholder' => 'Item Name']
            ],
            'submitLabel' => 'Search For Products Based on Item Name'
        ],
        [
            'action' => 'search_products_range.php',
            'inputs' => [
                ['type' => 'number', 'name' => 'sitem_price_st', 'placeholder' => 'Price Start'],
                ['type' => 'number', 'name' => 'sitem_price_end', 'placeholder' => 'Price End']
            ],
            'submitLabel' => 'Search For Products Based on Item Price Range'
        ],
        [
            'action' => 'search_products_itsort.php',
            'inputs' => [],
            'submitLabel' => 'Sort Products Based on Item Price'
        ]
    ];

    foreach ($forms as $form) {
        echo "<form action='{$form['action']}' method='post'>";
        echo "<table class='form-table'>";
        foreach ($form['inputs'] as $input) {
            echo "<tr><td><input class='form-input' type='{$input['type']}' name='{$input['name']}' placeholder='{$input['placeholder']}'></td></tr>";
        }
        echo "<tr><td><input class='form-submit' type='submit' name='submit' value='{$form['submitLabel']}'></td></tr>";
        echo "</table>";
        echo "</form>";
    }
    ?>
</div>

<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->

</body>
</html>
