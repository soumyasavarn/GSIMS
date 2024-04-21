<!DOCTYPE html>
<html>
   <head>
      <title>Grocery Store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Products :: w3layouts</title>
      <!-- for-mobile-apps -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
      Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
      <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
      function hideURLbar(){ window.scrollTo(0,1); } </script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
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
<!-- start-smoth-scrolling -->
</head>
   
<body>
<!-- header -->
   <div class="agileits_header">
      
      
      <div class="product_list_header">  
         <form action="#" method="post" class="last">
                <fieldset>
                    <input type="hidden" name="cmd" value="_cart" />
                    <input type="hidden" name="display" value="1" />
                    <input type="submit" name="submit" value="View your cart" class="button" />
                </fieldset>
            </form>
      </div>
      <div class="w3l_header_right">
         <ul>
            <li class="dropdown profile_details_drop">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
               <div class="mega-dropdown-menu">
                  <div class="w3ls_vegetables">
                     <ul class="dropdown-menu drp-mnu">
                        <li><a href="login.html">Login</a></li> 
                        <li><a href="login.html">Sign Up</a></li>
                     </ul>
                  </div>                  
               </div>   
            </li>
         </ul>
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
            <h1><a href="index.php"><span>Grocery</span> Store</a></h1>
         </div>
         
         
         <div class="clearfix"> </div>
      </div>
   </div>
<!-- //header -->
<!-- products-breadcrumb -->
   <div class="products-breadcrumb">
      <div class="container">
         <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
            <li>Transaction History</li>
         </ul>
      </div>
   </div>
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
   <?php
    $database = "grocery";
    $connect = mysqli_connect('localhost', 'root', '', $database);
   // Check connection
if (!$connect) {
   die("Connection failed: " . mysqli_connect_error());
}

$curr_user_id = 1;

// Fetch the current user ID from the curr_session table
$query1 = mysqli_query($connect, "SELECT * FROM curr_session");

if ($query1 && mysqli_num_rows($query1) > 0) {
   // Fetch the first row as an associative array
   $row = mysqli_fetch_assoc($query1);
   
   // Access the value of the id column in the first row
   $curr_user_id = $row['id'];
} else {
   echo "No rows found in curr_session table.";
}


$query = mysqli_query($connect, "SELECT * FROM purchase WHERE pcid = '$curr_user_id' and cost_of_items>0");
$monthlyExpenses = [];

while ($row = mysqli_fetch_array($query)) {
    $date = new DateTime($row["date_time"]);
    $monthYear = $date->format('Y-m'); // Format as Year-Month

    if (!isset($monthlyExpenses[$monthYear])) {
        $monthlyExpenses[$monthYear] = 0;
    }
    $monthlyExpenses[$monthYear] += $row["cost_of_items"];
}

// Sort by month and year
ksort($monthlyExpenses);
?>

<!-- HTML to display the table and the canvas for the chart -->
<div style="text-align:center;">
    <table cellpadding="45" cellspacing="45">
        <tr>
            <th>Product ID</th>
            <th>No of items</th>
            <th>Cost of items</th>
            <th>Date of purchase</th>
        </tr>
        <?php mysqli_data_seek($query, 0); // Reset query pointer ?>
        <?php while ($row = mysqli_fetch_array($query)): ?>
        <tr>
            <td><?= $row["ppid"]; ?></td>
            <td><?= $row["no_of_items"]; ?></td>
            <td><?= $row["cost_of_items"]; ?></td>
            <td><?= $row["date_time"]; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

<canvas id="monthlyExpenseChart" width="800" height="400"></canvas>
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
$curr_user_id = 1; // Default value, in case the curr_session does not contain any rows

// Fetch the current user ID from the curr_session table
$query1 = mysqli_query($conn, "SELECT * FROM curr_session");

if ($query1 && mysqli_num_rows($query1) > 0) {
   // Fetch the first row as an associative array
   $row = mysqli_fetch_assoc($query1);
   
   // Access the value of the id column in the first row
   $curr_user_id = $row['id'];
} else {
   echo "No rows found in curr_session table.";
}

// SQL to fetch the number of times each item is bought, along with the item name
$sql = "SELECT p.ppid, SUM(p.no_of_items) as total_bought, pr.Item_name 
        FROM purchase p
        JOIN products pr ON p.ppid = pr.ID
        WHERE p.pcid = '$curr_user_id'
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
<!-- Load Chart.js from CDN -->
<script>
    var ctx = document.getElementById('monthlyExpenseChart').getContext('2d');
    var monthlyExpenseChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode(array_keys($monthlyExpenses)); ?>,
            datasets: [{
                label: 'Monthly Expenses',
                data: <?php echo json_encode(array_values($monthlyExpenses)); ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Expense in Rs.'
                    }
                }
            }
        }
    });
</script>

<!-- //products-breadcrumb -->
<!-- banner -->
</body>
</html>