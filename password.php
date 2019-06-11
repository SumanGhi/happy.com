<?php include_once("includes/basic_includes.php");?>
<?php include_once("functions.php"); ?>
<?php 
if(! isloggedin()){
   header("location:login.php");
}
?>


<!DOCTYPE HTML>
<html>
<head>
<title>userhome
</title>

<link href="assets/cms/css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />


<link href="assets/cms/css/style.css" rel='stylesheet' type='text/css' />


</head>
<body>

 <?php include_once("includes/navigation.php");?>


<?php


$user =$_SESSION['username'];
if($user)
{
    if (isset($_POST['submit'])) {

    $oldpassword=($_POST['oldpassword']);
    $newpassword=($_POST['newpassword']);
    $repeatpassword=($_POST['rpassword']);
    include ('connect.php');
    $sql="SELECT password from users where username='$user'";
    $quer=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($quer);
    $oldpassworddb=$row['password'];
    $oldpassword = md5($oldpassword);
    if ($oldpassword==$oldpassworddb) {
       if ($newpassword==$repeatpassword) {
        $newpassword = md5($newpassword);
      $sqli="update users set password='$newpassword' where username='$user'";
      $querr=mysqli_query($conn,$sqli);
      session_destroy();
      die("your password is changed.<a href='index.php'>Return</a>to the main page");

       } else {
           echo " password notnot mtch";
       }
       
    } else {
        echo " old password doesnot match";

    }
    
   
 } else{
     echo"
    <form action='password.php' method='POST'>
    old password=<input type='text'  name='oldpassword'><p>
    new password =<input type='password'  name='newpassword'><p>
    Repeat password =<input type='password'  name='rpassword'><p>

    <input type='submit' name='submit' value='changepassword'><p>

    </form>
    ";
 }

}else{
    die("your must be logged in to change password");
}
?>
  
</body>
</html>