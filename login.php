<?php
require('database.php');
session_start();
if(isset($_SESSION["email"]))
{
	session_destroy();
}
$ref=@$_GET['q'];		
if(isset($_POST['submit']))
{	
	
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$email = stripslashes($email);
	$email = addslashes($email);
	$pass = stripslashes($pass); 
	$pass = addslashes($pass);
	$email = mysqli_real_escape_string($con,$email);
	$pass = mysqli_real_escape_string($con,$pass);					
	$str = "SELECT * FROM user WHERE email='$email' and password='$pass'";
	$result = mysqli_query($con,$str);
	if((mysqli_num_rows($result))!=1) 
	{
		echo "<center><h3><script>alert('Sorry.. Wrong Username (or) Password');</script></h3></center>";
		
	}
	else
	{
		$_SESSION['logged']=$email;
		$row=mysqli_fetch_array($result);
		$_SESSION['name']=$row[1];
		$_SESSION['id']=$row[0];
		$_SESSION['email']=$row[2];
		$_SESSION['password']=$row[3];
		header('location: welcome.php?q=1'); 					
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<body>
<center> Online Quiz System</h4></center><br>
<form method="post" action="login.php" enctype="multipart/form-data">
<div class="form-group">
<label>Enter Your Email Id:</label>
<input type="email" name="email" class="form-control">
</div>
<div class="form-group">
<label class="fw">Enter Your Password:
</label>
<input type="password" name="password" class="form-control">
</div> 
<div class="form-group text-right">
<button class="btn btn-primary btn-block" name="submit">Login</button>
</body>
</html>