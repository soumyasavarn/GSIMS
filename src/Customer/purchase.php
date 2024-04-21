<?php
   session_start();
   $db="grocery";
   $connect = mysqli_connect('localhost','root','',$db);
   $query = mysqli_query($connect,"SELECT * FROM cart");

  $qc = mysqli_query($connect,"DELETE from cart where pid>0");
header('Location: index.php');
?>
