<?php include_once("includes/basic_includes.php");?>
<?php include_once("functions.php"); ?>
<?php

if (isset($_POST['Registration'])){
	$err=array();
	function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
	//check for username
	if ($_SERVER["REQUEST_METHOD"] == "POST") {



  if (empty($_POST["name"])) {
    $err['name'] = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $err['name'] = "Only letters and white space allowed"; 
    }
  }

  if (empty($_POST["username"])) {
    $err['username'] = "Name is required";
  } else {
    $username = test_input($_POST["username"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
      $err['username'] = "Only letters and white space allowed"; 
    }
  }

	 if (empty($_POST["email"])) {
    $err['email'] = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $err['email'] = "Invalid email format"; 
    }
  }

	if (isset($_POST['password'])&& !empty($_POST['password'])){
		$password=($_POST['password']);

	}else{
		$err['password']= "Enter Password";
	}


	//check for number of error
	if(count($err)==0){
		$date= date('Y-m-d H:i:s');
		require "connect.php";
    $password = md5($password);
		$sql = "insert into users(username,password,email) values('$username','$password','$email')";
		// echo $sql;
		mysqli_query($conn,$sql);
		if(mysqli_insert_id($conn)>0){
			echo "User created successfully";

		}else{
			echo "User creation failed";
		}


	}
}
}


?>

<!DOCTYPE HTML>
<html>
<head>
<title>register
</title>

<link href="assets/cms/css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />


<link href="assets/cms/css/style.css" rel='stylesheet' type='text/css' />

</head>
<body>

<?php include_once("includes/navigation.php");?>


   
      <h1>Register</h1>
   
  
   	 <div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
    
  <form action="" method="post">
		<label for="name">Name</label>
		<input type="text" name="name" id="name" placeholder="Enter name">
 	<?php  if(isset($err['name'])){
 		echo $err['name'];
 	}   ?>
 	<br>
		<label for="username">UserName</label>

 	<input type="text" name="username" id="username" placeholder="Enter user name">
 	<?php  if(isset($err['username'])){
 		echo $err['username'];
 	}   ?>
 	<br> <label for="email">Email</label>
 		<input type="email" name="email" id="email" placeholder="Enter name">
 	<?php  if(isset($err['email'])){
 		echo $err['email'];
 	}   ?>
 	<br>
 	<label for="password">Password</label>
 	<input type="password" name="password" id="password" placeholder="Enter password">
<?php  if(isset($err['password'])){
 		echo $err['password'];
 	}   ?>
 	<br>
		<input type="submit" name="Registration" value="Registration">
		




	</form>

</body>
</html>