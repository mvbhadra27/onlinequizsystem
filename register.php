<?php
include("database.php");
session_start();
if(isset($_POST['submit']))
{	
	$name = $_POST['name'];
	$name = stripslashes($name);
	$name = addslashes($name);
	$email = $_POST['email'];
	$email = stripslashes($email);
	$email = addslashes($email);
	$password = $_POST['password'];
	$password = stripslashes($password);
	$password = addslashes($password);
	$college = $_POST['college'];
	$college = stripslashes($college);
	$college = addslashes($college);
	$str="SELECT email from user WHERE email='$email'";
	$result=mysqli_query($con,$str);
if((mysqli_num_rows($result))>0)	
{
        echo "<center><h3><script>alert('Sorry.. This email is already registered !!');</script></h3></center>";
        header("refresh:0;url=login.php");
}
else
{
        $str="insert into user set name='$name',email='$email',password='$password',college='$college'";
	if((mysqli_query($con,$str)))	
	echo "<center><h3><script>alert('Congrats.. You have successfully registered !!');</script></h3></center>";
	header('location: welcome.php?q=1');
	}
}
?>

<!DOCTYPE html>
<html>
<body>
<center>Online Quiz System</h4></center><br>
<form method="post" action="register.php" enctype="multipart/form-data">
<div class="form-group">
<label>Enter Your Username:</label>
<input type="text" name="name" class="form-control" required />
</div>
<div class="form-group">
<label>Enter Your Email Id:</label>
<input type="email" name="email" class="form-control" required />
</div>
<div class="form-group">
<label>Enter Your Password:</label>
<input type="password" name="password" class="form-control" required />
</div>
<div class="form-group">
<label>Enter Your College Name:</label>
<input type="text" name="college" class="form-control" required />
</div>
<div class="form-group text-right">
<button class="btn btn-primary btn-block" name="submit">Register</button>
</div>
<div class="form-group text-center">
<span class="text-muted">Already have an account! </span> <a href="login.php">Login </a> Here..
</body>
</html>