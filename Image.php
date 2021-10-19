<?php 
  include("conn.php");
  error_reporting(0);
  session_start();
  $email=$_SESSION['email'];
  $img=mysqli_query($conn,"select * from users");
  $query=mysqli_fetch_array($img);
  
    echo $query['image']."<br><br>";

?>
