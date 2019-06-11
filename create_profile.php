	<?php include_once("includes/basic_includes.php");?>
	<?php include_once("functions.php"); ?>
	<?php 
	if(! isloggedin()){
	   header("location:login.php");
	}
	 ?>
	 <?php
	 function processprofile_form($id){
	   
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$sex=$_POST['sex'];
		$email=$_POST['email'];
		
			$day=$_POST['day'];
			$month=$_POST['month'];
			$year=$_POST['year'];
		$dob=$year ."-" . $month . "-" .$day ;
		
		$religion=$_POST['religion'];
		$caste = $_POST['caste'];
		$subcaste=$_POST['subcaste'];
		
		$country = $_POST['country'];
		$state=$_POST['state'];
		$district=$_POST['district'];
		$age=$_POST['age'];
		$maritalstatus=$_POST['maritalstatus'];
		$profileby=$_POST['profileby'];
		$education=$_POST['education'];
		$edudescr=$_POST['edudescr'];
		$bodytype=$_POST['bodytype'];
		$physicalstatus=$_POST['physicalstatus'];
		$drink=$_POST['drink'];
		$smoke=$_POST['smoke'];
		$mothertounge=$_POST['mothertounge'];
		$bloodgroup=$_POST['bloodgroup'];
		$weight=$_POST['weight'];
		$height=$_POST['height'];
		$colour=$_POST['colour'];
		$diet=$_POST['diet'];
		$occupation=$_POST['occupation'];
		$occupationdescr=$_POST['occupationdescr'];
		$fatheroccupation=$_POST['fatheroccupation'];
		$motheroccupation=$_POST['motheroccupation'];
		$income=$_POST['income'];
		$bros=$_POST['bros'];
		$sis=$_POST['sis'];
		$aboutme=$_POST['aboutme'];
		


		require_once("includes/dbconn.php");
		$sql="SELECT cust_id FROM customer WHERE cust_id=$id";
		$result=mysqlexec($sql);

	if(mysqli_num_rows($result)>=1){
		
		$sql="UPDATE
	   			customer 
			SET
			   email = '$email',
			   age = '$age',
			   sex = '$sex',
			   religion = '$religion',
			   caste = '$caste',
			   subcaste = '$subcaste',
			   district = '$district',
			   state = '$state',
			   country = '$country',
			   maritalstatus = '$maritalstatus',
			   profilecreatedby = '$profileby',
			   education  = '$education',
			   education_sub = '$edudescr',
			   firstname = '$fname',
			   lastname = '$lname',
			   body_type = '$bodytype',
			   physical_status = '$physicalstatus',
			   drink =  '$drink',
			   mothertounge = '$mothertounge',
			   colour = '$colour',
			   weight = '$weight',
			   smoke = '$smoke',
			   dateofbirth = '$dob', 
			   occupation = '$occupation', 
			   occupation_descr = '$occupationdescr', 
			   annual_income = '$income', 
			   fathers_occupation = '$fatheroccupation',
			   mothers_occupation = '$motheroccupation',
			   no_bro = '$bros', 
			   no_sis = '$sis', 
			   aboutme = '$aboutme'
			WHERE cust_id=$id; "
			   ;
	   $result=mysqlexec($sql);
	   if ($result) {
	   	echo "<script>alert(\"Successfully Updated Profile\")</script>";
	   	echo "<script> window.location=\"user-home.php?id=$id\"</script>";
	   }
	}else{
		
		$sql = "INSERT 
					INTO
					   customer
					   (cust_id, email, age, sex, religion, caste, subcaste, district, state, country, maritalstatus, profilecreatedby, education, education_sub, firstname, lastname, body_type, physical_status, drink, mothertounge, colour, weight, height, blood_group, diet, smoke,   dateofbirth, occupation, occupation_descr, annual_income, fathers_occupation, mothers_occupation, no_bro, no_sis, aboutme, profilecreationdate  ) 
					VALUES
					   ('$id','$email', '$age', '$sex', '$religion', '$caste', '$subcaste', '$district', '$state', '$country', '$maritalstatus', '$profileby', '$education', '$edudescr', '$fname', '$lname', '$bodytype', '$physicalstatus', '$drink', '$mothertounge', '$colour', '$weight', '$height', '$bloodgroup', '$diet', '$smoke', '$dob', '$occupation', '$occupationdescr', '$income', '$fatheroccupation', '$motheroccupation', '$bros', '$sis', '$aboutme', CURDATE())
				";
		if (mysqli_query($conn,$sql)) {
		  echo "Successfully Created profile";
		  echo "<a href=\"homee.php?id={$id}\">";
		  echo "Back to home";
		  echo "</a>";
		  
		  $sql2="INSERT INTO partnerprefs (id, custId) VALUES('', '$id')";
		  mysqli_query($conn,$sql2);
		  $sql2="UPDATE TABLE users SET profilestat=1 WHERE id=$id";
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

		 
	}
	 ?>
	<?php
	$id=$_SESSION['id'];
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			processprofile_form($id);
	}
	?>



	<!DOCTYPE HTML>
	<html>
	<head>
	<title>create profile
	</title>


	<link href="assets/cms/css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />


	<link href="assets/cms/css/style.css" rel='stylesheet' type='text/css' />






	</head>
	<body>

	<?php include_once("includes/navigation.php");?>

	<div class="grid_3">
	  <div class="container">
	  	<a href="user-home.php">Home</a>
	   <div class="breadcrumb1">
	     <h1>Create Your Profile</h1>
	   </div>
	   <div class="services">
	   	  <div class="col-sm-12 login_left">
		     <form action="" method="POST">
		  	    <div class="form-group col-sm-6">
			      <label for="edit-name">First Name <span class="form-required" title="This field is required.">*</span></label>
			      <input type="text" id="edit-name" name="fname" value="" size="60" maxlength="60" class="form-text required" >
			    </div>
			    <div class="form-group col-sm-4">
			      <label for="edit-pass">Last Name <span class="form-required" title="This field is required.">*</span></label>
			      <input type="text" id="edit-last" name="lname" size="30" maxlength="128" class="form-text required" reqired="">
			    </div>
			     <div class="form-group col-sm-2">
			      <label for="edit-name">Sex <span class="form-required" title="This field is required.">*</span></label>
				    <div class="select-block1">
		                <select name="sex" >
		                  <option value=""></option>

		                    <option value="Male">Male</option>
		                    <option value="Female">Female</option> 
		               
		                </select>
				    </div>
			    </div>
			    <div class="form-group col-sm-6">
			      <label for="edit-name">Email <span class="form-required" title="This field is required.">*</span></label>
			      <input type="text" id="edit-name" name="email" value="" size="60" maxlength="60" class="form-text required" >
			    </div>

		    <div class="form-group col-sm-6">
				    <div class="age_select">
				      <label for="edit-pass">
	 Date Of Birth <span class="form-required" title="This field is required.">*</span></label>
				        <div class="age_grid">
				         <div class="col-sm-4 form_box">
		                  <div class="select-block1">
		                    <select name="day" >

			                    <option value=""></option>
			                    <option value="1">1</option>
			                    <option value="2">2</option>
			                    <option value="3">3</option>
			                    <option value="4">4</option>
			                    <option value="5">5</option>
			                    <option value="6">6</option>
			                    <option value="7">7</option>
			                    <option value="8">8</option>
			                    <option value="9">9</option>
			                    <option value="10">10</option>
			                    <option value="11">11</option>
			                    <option value="12">12</option>
			                    <option value="13">13</option>
			                    <option value="14">14</option>
			                    <option value="15">15</option>
			                    <option value="16">16</option>
			                    <option value="17">17</option>
			                    <option value="18">18</option>
			                    <option value="19">19</option>
			                    <option value="20">20</option>
			                    <option value="21">21</option>
			                    <option value="22">22</option>
			                    <option value="23">23</option>
			                    <option value="24">24</option>
			                    <option value="25">25</option>
			                    <option value="26">26</option>
			                    <option value="27">27</option>
			                    <option value="28">28</option>
			                    <option value="29">29</option>
			                    <option value="30">30</option>
			                    <option value="31">31</option>
		                    </select>
		                  </div>
		            </div>
		            <div class="col-sm-4 form_box2">
		                   <div class="select-block1">
		                    <select name="month" >
		                    	 <option value=""></option>
			                    <option value="">Month</option>
			                    <option value="01">January</option>
			                    <option value="02">February</option>
			                    <option value="03">March</option>
			                    <option value="04">April</option>
			                    <option value="05">May</option>
			                    <option value="06">June</option>
			                    <option value="07">July</option>
			                    <option value="08">August</option>
			                    <option value="09">September</option>
			                    <option value="10">October</option>
			                    <option value="11">November</option>
			                    <option value="12">December</option>
		                    </select>
		                  </div>
		                 </div>
		                 <div class="col-sm-4 form_box1">
		                   <div class="select-block1">
		                    <select name="year" >
		                    	 <option value=""></option>
			                    <option value="">Year</option>
			                    <option value="1980">1980</option>
			                    <option value="1981">1981</option>
			                    <option value="1981">1981</option>
			                    <option value="1983">1983</option>
			                    <option value="1984">1984</option>
			                    <option value="1985">1985</option>
			                    <option value="1986">1986</option>
			                    <option value="1987">1987</option>
			                    <option value="1988">1988</option>
			                    <option value="1989">1989</option>
			                    <option value="1990">1990</option>
			                    <option value="1991">1991</option>
			                    <option value="1992">1992</option>
			                    <option value="1993">1993</option>
			                    <option value="1994">1994</option>
			                    <option value="1995">1995</option>
			                    <option value="1996">1996</option>
			                    <option value="1997">1997</option>
			                    <option value="1998">1998</option>
			                    <option value="1999">1999</option>
			                    <option value="2000">2000</option>
			                    <option value="2001">2001</option>
			                    <option value="2002">2002</option>
			                    <option value="2003">2003</option>
			                    <option value="2004">2004</option>
			                    <option value="2005">2005</option>
			                    <option value="2006">2006</option>
			                    <option value="2007">2007</option>
			                    <option value="2008">2008</option>
			                    <option value="2009">2009</option>
			                    <option value="2010">2010</option>
			                    <option value="2011">2011</option>
			                    <option value="2012">2012</option>
			                    <option value="2013">2013</option>
			                    <option value="2014">2014</option>
			                    <option value="2015">2015</option>
			                    <option value="2016">2016</option>
			                    <option value="2017">2017</option>
			                    <option value="2018">2018</option>
			                    <option value="2019">2019</option>
		                    </select>
		                   </div>
		                  </div>
		                  <div class="clearfix"> </div>
		                 </div>
		              </div>
	            </div>
	            <div class="form-group col-sm-6">
				    <div class="age_select">
				      <label for="edit-pass">Religion <span class="form-required" title="This field is required.">*</span></label>
				        <div class="age_grid">
				         <div class="col-sm-4 form_box">
		                  <div class="select-block1">
		                    <select name="religion" >
		                    	 <option value="">religion</option>
			                    <option value="Not Applicable">Not Applicable</option>
			                    <option value="Hindu">Hindu</option>
			                    <option value="Christian">Christian</option>
			                    <option value="Muslim">Muslim</option>
			                    <option value="Jain">Jain</option>
			                    <option value="Sikh">Sikh</option>
			                    
		                    </select>
		                  </div>
		            </div>
		         
		            <div class="col-sm-4 form_box2">
		                   <div class="select-block1">
		                    <select name="caste" >
		                    	<option value="">caste</option>
			                    <option value="Bramhin">Bramhin</option>
			                    <option value="Chettri">Chettri</option>
			                    <option value="Newar">Newar</option>
			                    <option value="Dalit">Dalit</option>
			                    <option value="Janjati">Janjati</option>
			                     

		                    </select>
		                  </div>
		                 </div>
		                 <div class="col-sm-4 form_box1">
		                   <div class="select-block1">
		                    <select name="subcaste">
		                    	<option value=""> subcaste</option>
			                    <option value="Not Applicable">Not Applicable</option>
			                     <option value="Magar">Magar</option>
			                    <option value="Limbu">Limbu</option>
			                    <option value="Tamang">Tamang</option>
			                    <option value="Shrestha">Tamang</option>
			                    <option value="Tharu">Tamang</option>
			                    <option value="Baniya">Baniya</option>   
			                    <option value="Chepang">Chepang</option> 
			                    <option value="Danuwar">Danuwar</option>
			                    <option value="Dhami">Dhami</option> 
			                    <option value="Gaine">Gaine</option> 
			                    <option value="Kumal">Kumal</option>
			                    <option value="Jha">Jha</option>
			                    <option value="Dahal">Dahal</option>
			                    <option value="Majhi">Majhi</option> 
			                    <option value="Meche">Meche</option> 
			                    <option value="Rai">Rai</option>
			                    <option value="Rajbansi">Rajbansi</option>
			                    <option value="Mainali">Mainali</option>
			                    <option value="Pokhrel">Pokhrel</option>
			                    <option value="Rana">Rana</option>
			                    <option value="Khanal">Khanal</option>
			                    <option value="Pandey">Pandey</option>
			                    <option value="Rajak">Rajak</option>
			                    <option value="Ghimire">Ghimire</option>
			                    <option value="Katuwal">Katuwal</option>
			                    <option value="Neupane">Neupani</option>
			                    <option value="Maharjan">Maharjan</option>
			                    <option value="Chaudhary">Chaudhary</option>
			                    <option value="Timelsena">Timelsena</option>
			                    <option value="Gautam">Gautam</option>
			                    <option value="Others">Others</option>  
			                 
			                  
		                    </select>
		                   </div>
		                  </div>
		                  <div class="clearfix"> </div>
		                 </div>
		              </div>
	            </div>

	          
	              <div class="form-group col-sm-6">
				    <div class="age_select">
				      <label for="edit-pass">Address <span class="form-required" title="This field is required.">*</span></label>
				        <div class="age_grid">
				         <div class="col-sm-4 form_box">
		                  <div class="select-block1">
		                    <select name="country" >
		                    	 <option value=""></option>
			                    <option value="Not Applicable">Country</option>
			                    <option value="UAE">UAE</option>
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
		            </div>
		         
		            <div class="col-sm-4 form_box2">
		                   <div class="select-block1">
		                    <select name="state">
			                     <option value="">State</option>
			                    <option value="Provinces 1">Province 1</option>
			                    <option value="Provinces 2">Provinces 2</option>
			                    <option value="Provinces 3">Provinces 3</option>
			                    <option value="Provinces 4">Provinces 4</option> 
			                    <option value="Provinces 5">Provinces 5</option> 
			                    <option value="Provinces 6">Provinces 6</option> 
			                    <option value="Provinces 7">Provinces 7</option>
		                    </select>
		                  </div>
		                 </div>
		                 <div class="col-sm-4 form_box1">
		                   <div class="select-block1">
		                    <select name="district">
			                   <option value="Taplejung">Taplejung</option>
			                    <option value="Panchthar">Panchthar</option>
			                    <option value="Ilam">Ilam</option>
			                    <option value="Jhapa">Jhapa</option>
			                    <option value="Morang">Morang</option>
			                    <option value="Sunsari">Sunsari</option>
			                    <option value="Dhankutta">Dhankutta</option>
			                    <option value="Sankhuwasabha">Sankhuwasabha</option>
			                    <option value="Bhojpur">Bhojpur</option>
			                    <option value="Okhaldunga">Okhaldunga</option>
			                    <option value="Khotang">Khotang</option>
			                    <option value="Solukhumbu">Solukhumbu</option>
			                    <option value="Saptari">Saptari</option>
			                    <option value="Siraha">Siraha</option>
			                    <option value="Mahottari">Mahottari</option>
			                    <option value="Sarlahi">Sarlahi</option>
			                    <option value="Sindhuli">Sindhuli</option>
			                    <option value="Ramechhap">Ramechhap</option>
			                    <option value="Dolkha">Dolkha</option>
			                    <option value="Sindhupalchauk">Sindhupalchauk</option>
			                    <option value="Kavreplanchauk">Kavreplanchauk</option>
			                    <option value="Lalitpur">Lalitpur</option>
			                    <option value="Bhaktapur">Bhaktapur</option>
			                    <option value="Kathmandu">Kathmandu</option>
			                    <option value="Nuwakot">Nuwakot</option>
			                    <option value="Rasuwa">Rasuwa</option>
			                    <option value="Dhading">Dhading</option>
			                    <option value="Makwanpur">Makwanpur</option>
			                    <option value="Rauthat">Rauthat</option>
			                    <option value="Bara">Bara</option>
			                    <option value="Parsa">Parsa</option>
			                    <option value="Chitwan">Chitwan</option>
			                    <option value="Gorkha">Gorkha</option>
			                    <option value="Lamjung">Lamjung</option>
			                    <option value="Tanahun">Tanahun</option>
			                    <option value="Syangja">Syangja</option>
			                    <option value="Kaski">Kaski</option>
			                    <option value="Manag">Manag</option>
			                    <option value="Mustang">Mustang</option>
			                    <option value="Parwat">Parwat</option>
			                    <option value="Myagdi">Myagdi</option>
			                    <option value="Baglung">Baglung</option>
			                    <option value="Gulmi">Gulmi</option>
			                    <option value="Palpa">Palpa</option>
			                    <option value="Nawalpur">Nawalpur</option>
			                    <option value="Rupandehi">Rupandehi</option>
			                    <option value="Arghakhanchi">Arghakhanchi</option>
			                    <option value="Kapilvastu">Kapilvastu</option>
			                    <option value="Pyuthan">Pyuthan</option>
			                    <option value="Rolpa">Rolpa</option>
			                    <option value="Rukum Purba">Rukum Purba</option>
			                    <option value="Rukum Paschim">Rukum Paschim</option>
			                    <option value="Salyan">Salyan</option>
			                    <option value="Dang">Dang</option>
			                    <option value="Bardiya">Bardiya</option>
			                    <option value="Surkhet">Surkhet</option>
			                    <option value="Dailekh">Dailekh</option>
			                    <option value="Banke">Banke</option>
			                    <option value="Jajarkot">Jajarkot</option>
			                    <option value="Dolpa">Dolpa</option>
			                    <option value="Humla">Humla</option>
			                    <option value="Kalikot">Kalikot</option>
			                    <option value="Mugu">Mugu</option>
			                    <option value="Jumla">Jumla</option>
			                    <option value="Bajura">Bajura</option>
			                    <option value="Bajhang">Bajhang</option>
			                    <option value="Achham">Achham</option>
			                    <option value="Doti">Doti</option>
			                    <option value="Kailali">Kailali</option>
			                    <option value="Dadeldhura">Dadeldhura</option>
			                    <option value="Baitadi">Baitadi</option>
			                    <option value="Darchula">Darchula</option>
		                    </select>
		                   </div>
		                  </div>
		                  <div class="clearfix"> </div>
		                 </div>
		              </div>
	            </div>

	            <div class="form-group col-sm-2">
			      <label for="edit-name">Age<span class="form-required" title="This field is required.">*</span></label>
				    <div class="select-block1">
		                <select name="age" >
		                     <option value="">
	</option>
			                    <option value="1">1</option>
			                    <option value="2">2</option>
			                    <option value="3">3</option>
			                    <option value="4">4</option>
			                    <option value="5">5</option>
			                    <option value="6">6</option>
			                    <option value="7">7</option>
			                    <option value="8">8</option>
			                    <option value="9">9</option>
			                    <option value="10">10</option>
			                    <option value="11">11</option>
			                    <option value="12">12</option>
			                    <option value="13">13</option>
			                    <option value="14">14</option>
			                    <option value="15">15</option>
			                    <option value="16">16</option>
			                    <option value="17">17</option>
			                    <option value="18">18</option>
			                    <option value="19">19</option>
			                    <option value="20">20</option>
			                    <option value="21">21</option>
			                    <option value="22">22</option>
			                    <option value="23">23</option>
			                    <option value="24">24</option>
			                    <option value="25">25</option>
			                    <option value="26">26</option>
			                    <option value="27">27</option>
			                    <option value="28">28</option>
			                    <option value="29">29</option>
			                    <option value="30">30</option>
			                    <option value="31">31</option>
			                    <option value="32">32</option>
			                    <option value="33">33</option>
			                    <option value="34">34</option>
			                    <option value="35">35</option>
			                    <option value="36">36</option>
			                    <option value="37">37</option>
			                    <option value="38">38</option>
			                    <option value="39">39</option>
			                    <option value="40">40</option>
			                    <option value="41">41</option>
			                    <option value="42">42</option>
			                    <option value="43">43</option>
			                    <option value="44">44</option>
			                    <option value="45">45</option>
			                    <option value="46">46</option>
			                    <option value="47">47</option>
			                    <option value="48">48</option>
			                    <option value="49">49</option>
			                    <option value="50">50</option>
			                    <option value="51">51</option>
			                    <option value="52">52</option>
			                    <option value="53">53</option>
			                    <option value="54">54</option>
			                    <option value="55">55</option>
			                    <option value="56">56</option>
			                    <option value="57">57</option>
			                    <option value="58">58</option>
			                    <option value="59">59</option>
			                    <option value="60">60</option>
			                    <option value="61">61</option>
			                    <option value="62">62</option>
			                    <option value="63">63</option>
			                    <option value="64">64</option>
			                    <option value="65">65</option>
			                    <option value="66">66</option>
			                    <option value="67">67</option>
			                    <option value="68">68</option>
			                    <option value="69">69</option>
			                    <option value="70">70</option>
			                    <option value="71">71</option>
			                    <option value="72">72</option>
			                    <option value="73">73</option>
			                    <option value="74">74</option>
			                    <option value="75">75</option>
			                    <option value="76">76</option>
			                    <option value="77">77</option>
			                    <option value="78">78</option>
			                    <option value="79">79</option>
			                    <option value="80">80</option>
			                    <option value="81">81</option>
			                    <option value="82">82</option>
			                    <option value="83">83</option>
			                    <option value="84">84</option>
			                    <option value="85">85</option>
			                    <option value="86">86</option>
			                    <option value="87">87</option>
			                    <option value="88">88</option>
			                    <option value="89">89</option>
			                    <option value="90">90</option>
		                </select>
				    </div>
			    </div>
	             <div class="form-group col-sm-2">
			      <label for="edit-name">Marital status <span class="form-required" title="This field is required.">*</span></label>
				    <div class="select-block1">
		                <select name="maritalstatus" >
		                	 <option value=""></option>
		                    <option value="Single">Single</option>
		                    <option value="Married">Married</option> 
		               		<option value="Divorsed">Divorsed</option>
		               		<option value="Widowed">Widowed</option>
		               		
		               		<option value="Separated d">Separated </option>
		               		<option value="any">any</option>
		                </select>
				    </div>
			    </div>
			    <div class="form-group col-sm-2">
			      <label for="edit-name">Profile Created by <span class="form-required" title="This field is required.">*</span></label>
				    <div class="select-block1">
		                <select name="profileby" >
		                	 <option value=""></option>
		                    <option value="Self">Self</option>
		                    <option value="Son/Daughter">Son/Daughter</option> 
		               		<option value="Other">Other</option> 
		                </select>
				    </div>
			    </div>
			    <div class="form-group col-sm-2">
			      <label for="edit-name">Education <span class="form-required" title="This field is required.">*</span></label>
				    <div class="select-block1">
		                <select name="education" >
		                	 <option value=""></option>
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
		               		<option value="Llb">Llb</option>

		                </select>
				    </div>
			    </div>
			    <div class="form-group col-sm-2">
			      <label for="edit-name">Specialization <span class="form-required" title="This field is required."></span></label>
				  <input type="text" id="edit-name" name="edudescr" value="" size="10" maxlength="60" class="form-text" >
			    </div>
			     <div class="form-group col-sm-2">
			      <label for="edit-name">Body type<span class="form-required" title="This field is required.">*</span></label>
				    <div class="select-block1">
		                <select name="bodytype">
		                    <option value="Slim">Slim</option>
		                    <option value="Fat">Fat</option> 
		               		<option value="Average">Average</option> 
		                </select>
				    </div>
			    </div>
			     <div class="form-group col-sm-2">
			      <label for="edit-name">Physical Status<span class="form-required" title="This field is required.">*</span></label>
				    <div class="select-block1">
		                <select name="physicalstatus" >
		                	 <option value=""></option>
		                    <option value="No Problem">No Problem</option>
		                    <option value="Blind">Blind</option> 
		               		<option value="Deaf">Deaf</option> 
		                </select>
				    </div>
			    </div>
	           
	            <div class="form-group col-sm-2">
			      <label for="edit-name">Drinks<span class="form-required" title="This field is required.">*</span></label>
				    <div class="select-block1">
		                <select name="drink">
		                    <option value="No">No</option>
		                    <option value="Yes">Yes</option> 
		               		<option value="Sometimes">Sometimes</option> 
		                </select>
				    </div>
			    </div>
			    <div class="form-group col-sm-2">
			      <label for="edit-name">Smoke<span class="form-required" title="This field is required.">*</span></label>
				    <div class="select-block1">
		                <select name="smoke">
		                    <option value="No">No</option>
		                    <option value="Yes">Yes</option> 
		               		<option value="Sometimes">Sometimes</option>
		                </select>
				    </div>
			    </div>
			    
			    <div class="form-group col-sm-2">
			      <label for="edit-name">Mother Tounge<span class="form-required" title="This field is required.">*</span></label>
				    <div class="select-block1">
		                <select name="mothertounge" >
		                	 <option value=""></option>
		                    <option value="Nepali">Nepali</option>
		                    <option value="Newari">Newari</option>
		                    <option value="Tharu">Tharu</option>
		                    
		                    <option value="Hindi">Hindi</option> 
		               		<option value="English">English</option> 
		               		<option value="Maithali">Maithali</option>
		                    
		                    
		                </select>
				    </div>
			    </div>
			    <div class="form-group col-sm-2">
			      <label for="edit-name">Blood Group<span class="form-required" title="This field is required.">*</span></label>
				    <div class="select-block1">
		                <select name="bloodgroup" >
		                	 <option value=""></option>
		                    <option value="O +ve">A +ve</option>
		                    <option value="O -ve">A -ve</option> 
		               		<option value="AB -ve">AB -ve</option> 
		               		<option value="AB +ve">AB +ve</option>
		               		<option value="A +ve">B +ve</option>
		               		<option value="A -ve">B -ve</option>
		               		<option value="B +ve">O +ve</option>
		               		<option value="B -ve">O -ve</option>
		                </select>
				    </div>
			    </div>
			    <div class="form-group col-sm-2">
			      <label for="edit-name">Weight <span class="form-required" title="This field is required."></span></label>
				  <input type="number" id="edit-name" name="weight" value="" size="10" maxlength="60" class="form-text" 	>
			    </div>
			   
			    <div class="col-lg-12">
			    <div class="form-group col-sm-2">
			      <label for="edit-name">Height <span class="form-required" title="This field is required."></span></label>
				  <input type="number" id="edit-name" name="height" value="" size="2" maxlength="60" class="form-text" >
			    </div>
			   	<div class="form-group col-sm-2">
			      <label for="edit-name">Colour<span class="form-required" title="This field is required.">*</span></label>
				    <div class="select-block1">
		                <select name="colour">
		                    <option value="Dark">Dark</option>
		                    <option value="Fair">Fair</option> 
		               		<option value="Normal">Normal</option> 
		                </select>
				    </div>
			    </div>
			    <div class="form-group col-sm-2">
			      <label for="edit-name">Diet<span class="form-required" title="This field is required.">*</span></label>
				    <div class="select-block1">
		                <select name="diet">
		                    <option value="Veg">Veg</option>
		                    <option value="Non Veg">Non Veg</option> 
		               		
		                </select>
				    </div>
			    </div>
			     <div class="form-group col-sm-2">
			      <label for="edit-name">Occupation <span class="form-required" title="This field is required."></span></label>
				  <input type="text" id="edit-name" name="occupation" value="" size="10" maxlength="60" class="form-text">
			    </div>
			    <div class="form-group col-sm-2">
			      <label for="edit-name">Occupation Descr <span class="form-required" title="This field is required."></span></label>
				  <input type="text" id="edit-name" name="occupationdescr" value="" size="10" maxlength="120" class="form-text">
			    </div>
			    <div class="form-group col-sm-2">
			      <label for="edit-name">Annual Income <span class="form-required" title="This field is required."></span></label>
				  <input type="text" id="edit-name" name="income" value="" size="10" maxlength="60" class="form-text">
			    </div>
			   
			   
			    
	</div>


	          
	           <div class="col-lg-12">
	            <div class="form-group col-sm-3">
			    		<label for="edit-name">Fathers Occupation <span class="form-required" title="This field is required."></span></label>
				  		<input type="text" id="edit-name" name="fatheroccupation" value="" size="20" maxlength="500" class="form-text">
			   </div>
	           <div class="form-group col-sm-3">
			      <label for="edit-name">Mothers Occupation <span class="form-required" title="This field is required."></span></label>
				  <input type="text" id="edit-name" name="motheroccupation" value="" size="20" maxlength="500" class="form-text">
			    </div>
			    
	          <div class="form-group col-sm-3">
			      <label for="edit-name">No . Of sisters<span class="form-required" title="This field is required.">*</span></label>
				    <div class="select-block1">
		                <select name="sis" >
		                	 <option value=""></option>
		                	<option value="0">0</option>
		                    <option value="1">1</option>
		                    <option value="2">2</option> 
		                    <option value="3">3</option> 
		                    <option value="4">4</option> 
		                    <option value="5">5</option> 	
		                </select>
				    </div>
			    </div>
			    <div class="form-group col-sm-3">
			      <label for="edit-name">No . Of brothers<span class="form-required" title="This field is required.">*</span></label>
				    <div class="select-block1">
		                <select name="bros" >
		                	 <option value=""></option>
		                	<option value="0">0</option>
		                    <option value="1">1</option>
		                    <option value="2">2</option> 
		                    <option value="3">3</option> 
		                    <option value="4">4</option> 
		                    <option value="5">5</option> 	
		                </select>
				    </div>
			    </div>
			    <div class="form-group">
			    	<label for="about me">About Me<span class="form-required" title="This field is required.">*</span></label>
			    	<textarea rows="5" name="aboutme" placeholder="Write about you" class="form-text" ></textarea>
			    </div>
			    <div class="form-actions">
				    <input type="submit" id="edit-submit" name="op" value="Submit" class="btn_1 submit">
				  </div>
				  </div>
	            
	         <hr/>
				  

			 </form>
		  </div>
		 
		  <div class="clearfix"> </div>
	   </div>
	  </div>
	</div>




	</body>
	</html>	