<?php
include("conn.php");
error_reporting(0);
session_start();
$email=$_SESSION['email'];
if (!empty($_GET['del'])) {
  $id = $_GET['del'];
  if (mysqli_query($conn, "delete from users where id=$id")) {
    header("location:dashboard.php");
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="styleSheet" href="style.css">
  <style>
    #text{
    font-weight: bold;
}
  </style>
</head>

<body class="table-primary">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link table-success text-danger mt-3" id="text" href="dashboard.php">DASHBOARD <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?con=4"id="4">Change password</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"herf="?con=5">Change</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?con=name">Welcome:&emsp;<?php echo $email;?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="row">
    <div class="col-sm-2">
      <div class="jumbtron">
        <div class="list-group">
          <a href="?con=1" class="list-group-item list-group-item-action active bg-info">Display Image</a>
          <a href="?con=2" class="list-group-item list-group-item-action bg-light">Edit Profile</a>
          <a href="?con=3" class="list-group-item list-group-item-action bg-light">User Details</a>
          <a href="?con=orders" class="list-group-item list-group-item-action bg-light">Orders</a>
          <a href="?con=product" class="list-group-item list-group-item-action bg-light">Products</a>
          <a href="?con=feedback" class="list-group-item list-group-item-action bg-light">Feedback</a>
        </div>
      </div>
</div>
       <div class="col">
        <div class="col-sm-12">
          <div class="jumbtron">
            

            <?php 
              switch(@$_GET['con']){
                case 1 : include("Image.php");
                  break;
                case 2 : include("Edit_profile.php");
                break;
                case 3: include("showtable.php");
                break;
                case 4: include("Change_pass.php");
                break;
              }
             ?>

          </div>
        </div>
      </div>
  </div>
    

</body>

</html>