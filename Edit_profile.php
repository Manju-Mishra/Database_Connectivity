<?php
include("conn.php");
error_reporting(0);
session_start();
$id=$_GET['edit'];
$sel=mysqli_query($conn,"select * from users where id=$id");
$arr=mysqli_fetch_assoc($sel);
if(isset($_POST['sub'])){
    $email=$_POST['email'];
    $uname=$_POST['uname'];
    $pass=$_POST['pass'];
    $name=$_POST['name'];
    $age=$_POST['age'];
    $city=$_POST['city'];
    $gender=$_POST['gender'];
    $tmp=$_FILES['att']['tmp_name'];
    $fname=$_FILES['att']['name'];
    if(mysqli_query($conn,"update users set email='$email',uname='$uname',password='$pass',name='$name',age=$age,city='$city',gender='$gender',image='$fname' where id=$id"))
    {
        header("location:Index.php");
    }
    else
    echo "Updating Error";
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="styleSheet" href="style.css">
</head>

<body class="table-danger">
    <h1 class="jumbtron container bg-light" id="t">Enter Details</h1>
    <div class="table-primary " id="p">
        <img src="https://www.seekpng.com/png/detail/138-1387775_login-to-do-whatever-you-want-login-icon.png" class="img-circle" height="150" width="180" id="img">

        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="email@gmail.com" value="<?php echo $arr['email'];?>">
            </div>
            <div class="form-group">
                <label>Uname</label>
                <input type="text" class="form-control" name="uname" placeholder="enter name@" value="<?php echo $arr['uname'];?>">
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="enter name"value="<?php echo $arr['name'];?>">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="pass" placeholder="enter password" value="<?php echo $arr['password'];?>">
            </div>
            <div class="form-group">
                <label>Age</label>
                <input type="text" class="form-control" name="age" placeholder="enter age"value="<?php echo $arr['age'];?>">
            </div>
            <div class="form-group">
                <label>City</label>
                <input type="text" class="form-control" name="city" placeholder="enter city" value="<?php echo $arr['city'];?>">
            </div>
            <div class="form-group">
                <label>Gender</label>
                <input type="text" class="form-control" name="gender" placeholder="enter gender" value="<?php echo $arr['gender'];?>">
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control" name="att"value="<?php echo $arr['image'];?>">
            </div>
            <div class="form-froup">
                <input type="submit" class="btn btn-success" value="ADD DETAILS" name="sub">
            </div>
        </form>
    </div>
</body>

</html>
