<?php
session_start();
$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$conn= mysqli_connect('localhost', 'root', '', 'matrimony');

$userlevel=$_GET['user'];

$myusername=$_POST['username']; 
$mypassword=$_POST['password']; 


$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$mypassword = ($mypassword);

$sql="SELECT * FROM users WHERE username='$myusername' AND password='$mypassword'";
$result=mysqli_query($conn,$sql);

$count=mysqli_num_rows($result);
$row=mysqli_fetch_assoc($result);
$id=$row['id'];

if($count==1){


	$_SESSION['username']= $myusername;
	$_SESSION['id']=$id;
	if($userlevel=='1')
		header("location:../user-home.php");
	else
		header("location:../admin.php");
}
else {
echo "Wrong Username or Password";
}
?>