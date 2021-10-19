<?php
include("conn.php");
error_reporting(0);
session_start();
$_SESSION['pass1']=$pass;
$sel = mysqli_query($conn, "select password from users");
$a=mysqli_fetch_assoc($sel);
if (isset($_POST['pass']))
 {
  $pass = $_POST['pass'];
  $c_pass = $_POST['c_pass'];
  if (!empty($pass) && !empty($c_pass))
   {
    
      $query=mysqli_query($conn,"update users set password='$pass'");
       $arr=mysqli_fetch_assoc($query);
       echo $arr['password'];
      if ($pass==$c_pass && $pass!=$arr['password'] && $c_pass!=$arr['password']) 
      {
           $errMsg="Password changed SuccessFully";
       }
       else
             $errMsg="Password not matched";
  } 
  else 
  { 
     $errMsg="All fields are required";
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="styleSheet" href="style.css">

</head>

<body class="bg-danger">
  <div class="jumbtron table-danger container" id="p1">
    <h1><i class="align-center">Change Password</i></h1>
  </div>
  <?php
  if (!empty($errMsg)) {
  ?>
    <div class="alert alert-danger"> <?php echo $errMsg; ?></div>
  <?php
  }
  ?>
  <div class="jumbtron table-success container" id="p2">
    <img src="https://www.seekpng.com/png/detail/138-1387775_login-to-do-whatever-you-want-login-icon.png" class="img-circle" height="150" width="180" id="img">
    <form method="post">
      <div class="form-group">
        <label>Password</label>
        <input class="form-control" type="text" placeholder="password" name="pass">
      </div>
      <div class="form-group">
        <label>Confirm Password</label>
        <input class="form-control" type="text" placeholder="password" name="c_pass">
      </div>

      <div class="form-group">
        <input href="?c_pass=" class="btn btn-success" type="submit" value="Change password" name="pass1">
      </div><br><br><br>
    </form>
  </div>
</body>

</html>