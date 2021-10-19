<?php 
 include("conn.php");
 error_reporting(0);
  if(isset($_POST['login']))
  {
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    session_start();
    $_SESSION['email']=$email;
    $_SESSION['pass']=$pass;
    if(!empty($email) && !empty($pass))
    {
      $query=mysqli_query($conn,"select * from users where email='$email' and password='$pass'");
    
            $arr=mysqli_fetch_assoc($query);
            if($email==$arr['email'] && $pass==$arr['password'])
             {
                 
                 header("location:dashboard.php");
            }   
            else
            {
              $errMsg="Invalid Details";
            }
              
               
       
             
   }
    else 
    {
      $errMsg="Plz fill the blank fields";
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
    <h1><i class="align-center">MY PANEL</i></h1>
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
        <label>Email | Username</label>
        <input class="form-control" type="text" placeholder="abc@gmail.com" name="email" >
      </div>
      <div class="form-group">
        <label>Password</label>
        <input class="form-control" type="text" placeholder="password"  name="pass">
      </div>
      
      <div class="form-group">
        <input class="btn btn-success" type="submit" value="LOGIN" name="login">
        <a href="Register.php"class="btn btn-success">New User</a>
      </div><br><br><br>
    </form>
  </div>
</body>

</html>