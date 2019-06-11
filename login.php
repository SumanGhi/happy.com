<?php include_once("functions.php");?>
<!DOCTYPE HTML>
<html>
<head>
<title>login</title>



<link href="assets/cms/css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />


<link href="assets/cms/css/style.css" rel='stylesheet' type='text/css' />




</head>
<body>

<?php include_once("includes/navigation.php");?>

<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
       
        <li class="current-page">Login</li>
     </ul>
   </div>
   <div class="services">
   	  <div class="col-sm-6 login_left">
	   <form action="auth/auth.php?user=1" method="post">
  	    <div class="form-item form-type-textfield form-item-name">
	      <label for="edit-name">Username <span class="form-required" title="This field is required.">*</span></label>
	      <input type="text" id="edit-name" name="username" value="" size="60" maxlength="60" class="form-text required">
	    </div>
	    <div class="form-item form-type-password form-item-pass">
	      <label for="edit-pass">Password <span class="form-required" title="This field is required.">*</span></label>
	      <input type="password" id="edit-pass" name="password" size="60" maxlength="128" class="form-text required">
	    </div>
	    <div class="form-actions">
	    	<input type="submit" id="edit-submit" name="op" value="Log in" class="btn_1 submit">
	    </div>
	   </form>
	  </div>
	


</body>
</html>	