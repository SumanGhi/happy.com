<?php include_once("includes/basic_includes.php");?>
<?php include_once("functions.php"); ?>
<?php 
if(isloggedin()){
 
} else{
   header("location:login.php");
}

?>
<?php
function search(){
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $agemin=$_POST['agemin'];
    $agemax=$_POST['agemax'];
    $maritalstatus=$_POST['maritalstatus'];
    $country=$_POST['country'];
    $state=$_POST['state'];
    $religion=$_POST['religion'];
    $mothertounge=$_POST['mothertounge'];
    $sex = $_POST['sex'];

    $sql="SELECT * FROM customer WHERE 
    sex='$sex' 
    OR age>='$agemin'
     OR age<='$agemax'
    OR maritalstatus = '$maritalstatus'
    OR country = '$country'
    OR state = '$state'
    OR religion = '$religion'
    OR mothertounge = '$mothertounge'
    ";

    $result = mysqlexec($sql);
    return $result;

  }
}
?>

<?php
$result=search();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>
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
     <h1>Regular search</h1>
   </div>
  
  
<div class="col-md-9 search_left">
  <form action="" method="post">  
   <div class="form_but1">
  <label class="col-sm-5 control-lable1" for="sex">Gender : </label>
  <div class="col-sm-7 form_radios">
    <input type="radio" class="radio_1" name="sex" value="male" <?php echo "checked";?>/> Groom &nbsp;&nbsp;
    <input type="radio" class="radio_1" name="sex" value="female"/> Bride
    
    
  </div>
  <div class="clearfix"> </div>
  </div>
  <div class="form_but1">
  <label class="col-sm-5 control-lable1" for="Marital Status">Marital Status : </label>
  <div class="col-sm-7 form_radios">
    <input type="checkbox" class="radio_1" name="maritalstatus" value="Single" <?php echo "checked" ?>/> Single 
    <input type="checkbox" class="radio_1" name="maritalstatus" value="divorced" /> Divorced 
    <input type="checkbox" class="radio_1" name="maritalstatus" value="widowed" /> Widowed
    <input type="checkbox" class="radio_1" name="maritalstatus" value="seperated"/> Separated 
    <input type="checkbox" class="radio_1" name="maritalstatus" value="any" /> Any
  </div>
  <div class="clearfix"> </div>
  </div>
  <div class="form_but1">
    <label class="col-sm-5 control-lable1" for="country">Country : </label>
    <div class="col-sm-7 form_radios">
      <div class="select-block1">
        <select name="country">
            <option value="China">China</option>
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
    <div class="clearfix"> </div>
  </div>
  <div class="form_but1">
    <label class="col-sm-5 control-lable1" for="District / City">District / City : </label>
    <div class="col-sm-7 form_radios">
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
  <div class="form_but1">
    <label class="col-sm-5 control-lable1" for="State">State : </label>
    <div class="col-sm-7 form_radios">
      <div class="select-block1">
        <select name="state">
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
    <div class="clearfix"> </div>
  </div>
  <div class="form_but1">
    <label class="col-sm-5 control-lable1" for="Religion">Religion : </label>
    <div class="col-sm-7 form_radios">
      <div class="select-block1">
        <select name="religion">
            
                        <option value="Hindu">Hindu</option>
                        <option value="Christian">Christian</option>
                        <option value="Muslim">Muslim</option>
                        <option value="Jain">Jain</option>
                        <option value="Sikh">Sikh</option> 
        </select>
      </div>
    </div>
    <div class="clearfix"> </div>
  </div>
  <div class="form_but1">
    <label class="col-sm-5 control-lable1" for="Mother Tongue">Mother Tongue : </label>
    <div class="col-sm-7 form_radios">
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
    </div>
    <div class="clearfix"> </div>
  </div>
  <div class="form_but1">
	<label class="col-sm-5 control-lable1" for="Age">Age : </label>
	<div class="col-sm-7 form_radios">
	  <div class="col-sm-5 input-group1">
        <input class="form-control has-dark-background" name="agemin" id="slider-name" placeholder="min" type="text" required="" />
      </div>
      
      <div class="col-sm-5 input-group1">
        <input class="form-control has-dark-background" name="agemax" id="slider-name" placeholder="max" type="text" required="" />
      </div>
      <div class="clearfix"> </div>
	</div>
	<div class="clearfix"> </div>
  <input type="submit" name="search" value="Search"/>
  </div>
 </form>

   <h1>Profiles</h1>
<?php

if(isset($_POST['search'])){



$c_count = '1';

while ($row = mysqli_fetch_assoc($result))
  {
    
    $profid=$row['cust_id'];
   
    $sql="SELECT * FROM photos WHERE cust_id=$profid";
    $result2=mysqlexec($sql);
    $photo=mysqli_fetch_assoc($result2);
    $pic=$photo['pic1'];
 
  echo "<div class=\"row_1\">";  
  if ($c_count == '1')
    {
    
    echo "<div class=\"col-sm-6 paid_people-left\">"; 
    echo "<ul class=\"profile_item\">";
    echo "<a href=\"view_profile.php?id=$profid\">";
    echo "<li class=\"profile_item-img\"><img src=\"profile/". $profid."/".$pic ."\"" . "class=\"img-responsive\" alt=\"\"/></li>";
    echo "<li class=\"profile_item-desc\">";
    echo "<h4>" . $row['firstname'] . " " . $row['lastname'] . "</h4>";
    echo "<p>" . $row['age']. "Yrs," . $row['religion'] . "</p>";
    echo "<h5>" . "View Full Profile" . "</h5>";
    echo "</li>";
    echo "</a>";
    echo "</ul>";
    echo "</div>"; //left end
    $c_count++;
    }
    else
    {
    echo "<div class=\"col-sm-6\">"; //right statrted
    echo "<ul class=\"profile_item\">";
    echo "<a href=\"view_profile.php?id=$profid\">";
    echo "<li class=\"profile_item-img\"><img src=\"profile/". $profid."/".$pic ."\"" . "class=\"img-responsive\"" ;
    echo "alt=\"\"/></li>";
    echo "<li class=\"profile_item-desc\">";
    echo "<h4>" . $row['firstname'] . " " . $row['lastname'] . "</h4>";
    echo "<p>" . $row['age']. "Yrs," . $row['religion'] . "</p>";
    echo "<h5>" . "View Full Profile" . "</h5>";
    echo "</li>";
    echo "</a>";
    echo "</ul>";
    echo "</div class=\"test\">"; 

    

    
    $c_count = '1';
    }
    echo "</div>"; 
  } 
  
}
?>
   
  </div>
</div>



     <div class="clearfix"> </div>
  </div>
</div>






</body>
</html>	