<?php
$inputuser= $_POST['user'];
$inputpass = $_POST['pass'];
$login_type = $_POST['login_type'];

$user="root";
$password="";
$database = "grocery";
$connect=mysqli_connect('localhost',$user,$password,$database);

global $user_id;
if($login_type ==  "Customer"){
$query = "SELECT * FROM customer WHERE user = '$inputuser' " ;
$querypass = "SELECT * FROM customer WHERE password = '$inputpass' " ;

$result = mysqli_query($connect,$query);
$resultpass = mysqli_query($connect,$querypass);

$row = mysqli_fetch_assoc($result);

$rowpass = mysqli_fetch_array($resultpass);

$serveruser = $row["user"];
$serverpass = $row["password"];
$user_id = $row["ID"];
session_start();
$_SESSION['cid12'] = $user_id;
//echo $user_id;
if ($serveruser == $inputuser && $serverpass == $inputpass) {
    // Establish a connection to the database (assuming $connect already exists)
    // Prepare the DELETE statement
    $query1 = "DELETE FROM curr_session";
    
    // Execute the DELETE statement
    if (mysqli_query($connect, $query1)) {
        // Prepare the INSERT statement
        $query2 = "INSERT INTO curr_session (id) VALUES (?)";
        
        // Prepare the statement
        $stmt = mysqli_prepare($connect, $query2);
        
        // Bind the variable to the prepared statement as a parameter
        mysqli_stmt_bind_param($stmt, "i", $user_id);
        
        // Execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Redirect to index.php
            header('Location: index.php');
            exit; // Make sure to exit after a header redirect
        } else {
            echo "Error executing prepared statement: " . mysqli_error($connect);
        }
    } else {
        echo "Error deleting rows: " . mysqli_error($connect);
    }
}

else{
	echo "NO";
	header('Location: index1.html');
}
}

elseif ($login_type == "Admin") {
	if($inputuser=="admin" && $inputpass=="123"){
	//echo "YES";
	header('Location: Admin_logged.php');
}
else{
	echo "NO";
	header('Location: index1.html');
}
}
elseif ($login_type = "Employee"){
	$equery = "SELECT * FROM employee WHERE e_username = '$inputuser' " ;

$equerypass = "SELECT * FROM employee WHERE e_password = '$inputpass' " ;

$eresult = mysqli_query($connect,$equery);
$eresultpass = mysqli_query($connect,$equerypass);

$erow = mysqli_fetch_assoc($eresult);

$erowpass = mysqli_fetch_array($eresultpass);

$eserveruser = $erow["e_username"];
$eserverpass = $erow["e_password"];
echo $eserveruser;
echo $eserverpass;
if($eserveruser==$inputuser && $eserverpass==$inputpass){
	//echo "YES";
	header('Location: manager_logged.php');
}
else{
	//echo "NO";
	header('Location: index1.html');
}
}


?>