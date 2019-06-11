<?php include_once("includes/basic_includes.php");?>
<?php include_once("functions.php"); ?>
<?php

$id=$_GET['id'];
if(isloggedin()){

} else{
   header("location:login.php");
}


if ($_SERVER['REQUEST_METHOD'] == 'POST'){ uploadphoto($id); }
?>
<?php
function uploadphoto($id){
  $target = "profile/". $id ."/";
if (!file_exists($target)) {
    mkdir($target, 0777, true);
}

$target1 = $target . basename( $_FILES['pic1']['name']);
$target2 = $target . basename( $_FILES['pic2']['name']);
$target3 = $target . basename( $_FILES['pic3']['name']);
$target4 = $target . basename( $_FILES['pic4']['name']);



$pic1=($_FILES['pic1']['name']);
$pic2=($_FILES['pic2']['name']);
$pic3=($_FILES['pic3']['name']);
$pic4=($_FILES['pic4']['name']);

$sql="SELECT id FROM photos WHERE cust_id = '$id'";
$result = mysqlexec($sql);


if(mysqli_num_rows($result) == 0) {
     
    $sql="INSERT INTO photos (id, cust_id, pic1, pic2, pic3, pic4) VALUES ('', '$id', '$pic1' ,'$pic2', '$pic3','$pic4')";
    
    mysqlexec($sql);

    
} else {
    
     $sql="UPDATE photos SET pic1 = '$pic1', pic2 = '$pic2', pic3 = '$pic3', pic4 = '$pic4' WHERE cust_id=$id";
  
  mysqlexec($sql);
}


if(move_uploaded_file($_FILES['pic1']['tmp_name'], $target1)&&move_uploaded_file($_FILES['pic2']['tmp_name'], $target2)&&move_uploaded_file($_FILES['pic3']['tmp_name'], $target3)&&move_uploaded_file($_FILES['pic4']['tmp_name'], $target4))
{

echo "The files has been uploaded, and your information has been added to the directory";
}
else {


echo "Sorry, there was a problem uploading your file.";
}

}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>upload photo
</title>

<link href="assets/cms/css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />


<link href="assets/cms/css/style.css" rel='stylesheet' type='text/css' />

</head>
<body>

<?php include_once("includes/navigation.php");?>

<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
  
  
   <div class="services">
   	  <div class="col-sm-6 login_left">
        <a href="user-home.php">Home</a>
	   <form action="" method="post" enctype="multipart/form-data">
  	    <div class="form-item form-type-textfield form-item-name">
	      <label for="edit-name">Upload Your Photo(Upto 4 images, Use 300 x 250 dimensions) <span class="form-required" title="This field is required.">*</span></label>
	      <input type="file" id="edit-name" name="pic1" class="form-file required">
        <input type="file" id="edit-name" name="pic2" class="form-file required">
        <input type="file" id="edit-name" name="pic3" class="form-file required">
        <input type="file" id="edit-name" name="pic4" class="form-file required">
	    </div>
	    <div class="form-actions">
	    	<input type="submit" id="edit-submit" name="op" value="Upload" class="btn_1 submit">
	    </div>
	   </form>
	  </div>
	
	  <div class="clearfix"> </div>
   </div>
  </div>
</div>


<?php include_once("footer.php");?>

</body>
</html>	