<?php include_once("includes/basic_includes.php");?>
<?php include_once("functions.php"); ?>
<?php require_once("includes/dbconn.php");?>
<?php
if(isloggedin()){

} else{
   header("location:login.php");
}

$id=$_SESSION['id'];
writepartnerprefs($id);



		$sql="SELECT * FROM partnerprefs WHERE custId = $id";
		$result=mysqlexec($sql);
		if($result){
			$row=mysqli_fetch_assoc($result);
			$agemin=$row['agemin'];
			$agemax=$row['agemax'];
			$marital_status=$row['maritalstatus'];
			$complexion=$row['complexion'];
			$height=$row['height'];
			$diet=$row['diet'];
			$religion=$row['religion'];
			$caste=$row['caste'];
			$sub_caste=$row['subcaste'];
			$mother_tounge=$row['mothertounge'];
			$education=$row['education'];
			$occupation=$row['occupation'];
			$country=$row['country'];
			$descr=$row['descr'];
			$sex =$row['sex'];
			
		}
		else{
			echo mysqli_error($conn);
		}
 


?>
<!DOCTYPE HTML>
<html>
<head>
<title>Partner Prefs</title>

<link href="assets/cms/css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />

<script src="assets/cms/js/jquery.min.js"></script>
<script src="assets/cms/js/bootstrap.min.js"></script>

<link href="assets/cms/css/style.css" rel='stylesheet' type='text/css' />

<link href="assets/cms/css/font-awesome.css" rel="stylesheet"> 


</script>
</head>
<body>

 <?php include_once("includes/navigation.php");?> 

<div class="grid_3">
  <div class="container">
  	<a href="user-home.php">Home</a>
   <div class="breadcrumb1">
    <h1>partner preference</h1>
   </div>
   <div class="profile">
   	 <div class="col-md-12 profile_left">   	 	
		<div class="col_4">
		    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
			
			   <form action="" method="post" name="partner">
			   <div id="myTabContent" class="tab-content">
				  <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
				   
				    <div class="basic_1-left">
				    	  <table class="table_working_hours">
				        	<tbody>
				        		<!-- <tr class="opened">
									<td class="day_label">Age   :</td>
									<td class="day_value">
									<input type="text" name="agemin" value="<?php echo $agemin; ?>">to <input type="text" name ="agemax" value="<?php echo $agemax; ?>"> 
									</td>
								</tr> -->
				        		<tr class="opened">
									<td class="day_label">Marital Status :</td>
									<td class="day_value">
										<div class="select-block1">
										<select name="maritalstatus">
						                   

						                    <option value="Single">Single</option>
						                    <option value="Married">Married</option> 
						                    <option value="Widowed">widowed</option>
						               		<option value="Divorsed">Divorsed</option>
						                </select>
						                </div>
									</td>
								</tr>
							<!--     <tr class="opened">
									<td class="day_label">Complexion :</td>
									<td class="day_value closed">
									<div class="select-block1">
						                <select name="colour">
						                    <option value="">Black</option>
						                    <option value="">Fair</option> 
						               		<option value="">Normal</option> 
						                </select>
								    </div>
								    </td>
								</tr> -->
								<!-- <tr class="opened">
									<td class="day_label">Height</td>
									<td class="day_value closed"><input type="text"  id="edit-name" name="height" value="<?php echo $height;?>" size="60" maxlength="60" class="form-text">cm</td>
								</tr> -->
								<tr class="opened">
									<td class="day_label">Diet :</td>
									<td class="day_value closed"><div class="select-block1">
					                <select name="diet">
					                    <option value="Veg">Veg</option>
					                    <option value="Non Veg">Non Veg</option> 
					                </select>
							    	</div>
							    	</td>
								</tr>
								<tr class="opened">
									<td class="day_label">Religion :</td>
									<td class="day_value closed"><span>
									<div class="select-block1">
					                    <select name="religion">
						                    
						                    <option value="Hindu">Hindu</option>
						                    <option value="Christian">Christian</option>
						                    <option value="Muslim">Muslim</option>
						                    <option value="Jain">Jain</option>
						                    <option value="Sikh">Sikh</option>
						                    
					                    </select>
	                 				</div></span>
	                  			</td>
								</tr>
								<tr class="opened">
									<td class="day_label">Caste :</td>
									<td class="day_value closed">
									<div class="select-block1">
	                    				<select name="caste">
			                   				 <option value="Bramhin">Bramhin</option>
		                    <option value="Chettri">Chettri</option>
		                    <option value="Newar">Newar</option>
		                    <option value="Dalit">Dalit</option>
		                    <option value="Janjati">Janjati</option>
					                    </select>
		                 			</div></td>
								</tr>
								<tr class="opened">
									<td class="day_label">Mother Tongue :</td>
									<td class="day_value closed">
									<div class="select-block1">
						                <select name="mothertounge">
						                     <option value="Nepali">Nepali</option>
	                    <option value="Newari">Newari</option>
	                    <option value="Tharu">Tharu</option>
	                    
	                    <option value="Hindi">Hindi</option> 
	               		<option value="English">English</option> 
	               		<option value="Maithali">Maithali</option>
						                </select>
								    </div>
								    </td>
								</tr>
								<tr class="opened">
									<td class="day_label">Education :</td>
									<td class="day_value closed"><div class="select-block1">
						                <select name="education">
						              <option value="Primary">Primary</option>
	                    <option value="Tenth level">Tenth level</option> 
	               		<option value="+2">+2</option> 
	               		<option value="Degree">Degree</option> 
	               		<option value="PG">PG</option> 
	               		<option value="Doctorate">Doctorate</option> 
	               		<option value="Csit">Csit</option>
	               		<option value="Bsw">Bsw</option>
	               		<option value="Bbs">Bbs</option>
	               		<option value="Bba">Bba</option>
	               		<option value="Bim">Bim</option>
	               		<option value="Bhm">Bhm</option>
	               		<option value="Engineering">Engineering</option>
	               		<option value="Mbbs">Bbbs</option>
	               		<option value="Llb">Llb</option>> 
						                </select>
								    </div>
								    </td>
								</tr>
								<!-- <tr class="opened">
									<td class="day_label">Occupation :</td>
									<td class="day_value closed"> <input type="text" id="edit-name" name="occupation" value="" size="60" maxlength="60" value="<?php echo $occupation;?>" class="form-text"></td>
								</tr> -->
								<tr class="opened">
									<td class="day_label">Country of Residence :</td>
									<td class="day_value closed">
										<div class="select-block1">
						                    <select name="country">
							                    
					<option value="India">India</option>
                        <option value="China">China</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Japan">Japan</option>
                        <option value="Korea">Korea</option>
                        <option value="Srilanka">Srilanka</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Germany">Geramny</option>
                        <option value="Spain">Spain</option>
                        <option value="Portugal">Portugal</option>
                        <option value="France">France</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Argentina">Argentina</option>
						                    </select>
						                 </div>
						            </td>
								</tr>
								<tr class="opened">
									<td class="day_label">sex:</td>
									<td class="day_value closed">
									<div class="select-block1">
						                <select name="sex">
						                    <option value="Male">male</option>
						                    <option value="Female">female</option> 
						               		
						                </select>
								    </div>
								    </td>
								</tr>
							 </tbody>
				          </table>
				        </div>
				  
				  </div>
				 <input type="submit" value="Update Preferences">
		     </div>
		     </form>
		  </div>
	   </div>
   	 </div>
       <div class="clearfix"> </div>
    </div>
  </div>
</div>


<?php include_once("footer.php");?>
