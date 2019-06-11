
<?php include_once("includes/basic_includes.php"); ?>
<?php include_once("functions.php"); ?>
<?php require_once("includes/dbconn.php"); ?>
<?php


if(isloggedin()){

} else{
	header("location:login.php");
}


?>
<?php 

$id=$_SESSION['id'];
$profid=match($id);

if ($profid==0) {
	
}
else{
$sql="SELECT * FROM photos WHERE cust_id=$profid";
$result4=mysqlexec($sql);
if ($result4) {
$photo=mysqli_fetch_assoc($result4);
$pic=$photo['pic1'];

$sql="SELECT * FROM customer WHERE cust_id=$profid";
$result3=mysqlexec($sql);
if($result3){
	$row=mysqli_fetch_assoc($result3);
	$firstname= $row['firstname'];
	$lastname=$row['lastname'];
	$age=$row['age'];
	$religion=$row['religion'];



	echo "<div class=\"col-sm-6 paid_people-left\">"; 
	echo "<ul class=\"profile_item\">";
	echo "<a href=\"view_profile.php?id=$profid\">";
	echo "$profid";
	echo "<li class=\"profile_item-img\"><img src=\"profile\". $profid.\".$pic.\" . class=\"img-responsive\" alt=\"\"/></li>";
	echo "<li class=\"profile_item-desc\">";
	echo "<h4>" . $firstname . " " . $lastname . "</h4>";
	echo "<p>" . $age. "Yrs," . $religion . "</p>";
	echo "<h5>" . "View Full Profile" . "</h5>";
	echo "</li>";
	echo "</a>";
	echo "</ul>";
	echo "</div>"; 
}
}
}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Match</title>
	<link href="assets/cms/css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />


	<link href="assets/cms/css/style.css" rel='stylesheet' type='text/css' />


	<img src="sf">


</script>
</head>
<body>
	<a href="user-home.php">Home</a>


</body>
</html>
