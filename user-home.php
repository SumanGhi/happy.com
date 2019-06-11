  <?php include_once("includes/basic_includes.php");?>
  <?php include_once("functions.php"); ?>
    <?php


    if(isloggedin()){
     
    } else{
       header("location:login.php");
    }


    ?>
  <!DOCTYPE HTML>
  <html>
  <head>  
  <title>userhome
  </title>

  <!-- <link href="assets/cms/css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' /> -->


  <!-- <link href="assets/cms/css/style.css" rel='stylesheet' type='text/css' /> -->

  <link href="assets/cms/css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />

  <script src="assets/cms/js/bootstrap.min.js"></script>
  <script src="assets/cms/js/jquery.min.js"></script>


  <link href="assets/cms/css/font-awesome.css" rel="stylesheet"> 



  <link href="assets/cms/css/style.css" rel='stylesheet' type='text/css' />

  </head>
  <body>

   <?php include_once("includes/navigation.php");?>



  <div class="grid_3">
    <div class="container">
     <div class="breadcrumb1">
       <ul>
         
         
          <li class="current-page">User Home</li>
       </ul>
     </div>
     <div class="navigation" style="background-color: #B22222;"><!-- Innernavigation starts -->
      
          <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
              <ul class="nav navbar-nav nav_1">
                <li><a href="view_profile.php?id=<?php echo $id;?>">View Profile</a></li>
              <li><a href="photouploader.php?id=<?php echo $id;?>">Upload Photos</a>  </l>
                <li><a href="partner_preference.php?id=<?php echo $id;?>">Partner Preference</a></li>
                   <li><a href="create_profile.php?id=<?php echo $id;?>">Edit Profile</a></li>
                  <li><a href="search.php">Regular Search</a></li>
                  <li><a href="jodi.php">Match</a></li>
                    
              </ul>
      </div>
     </div><!-- End of inner navigation -->
     </div>
    </div>
    <div class="grid_1">
        <div class="container">
          <h1>Featured Profiles</h1>
          <div class="heart-divider">
        <span class="grey-line"></span>
       
        <span class="grey-line"></span>
          </div>
          <ul id="flexiselDemo3">
          <?php
            $sql="SELECT * FROM customer";
            $result=mysqlexec($sql);
            if($result){
              while($row=mysqli_fetch_assoc($result)){
                $name=$row['firstname'] . " " . $row['lastname'];
                $profileid=$row['cust_id'];
                $age=$row['age'];
                $place=$row['state'] . "," . $row['district'];
                $job=$row['occupation'];

                
                  $pic1='';
              $sql2="SELECT * FROM photos WHERE cust_id = $profileid";
              $result2 = mysqlexec($sql2);
              if($result2){
                $row2=mysqli_fetch_array($result2);
                $pic1=$row2['pic1'];
              }
            
            echo "<li><div class=\"col_1\"><a href=\"view_profile.php?id={$profileid}\">";
            echo "<img src=\"profile/{$profileid}\/{$pic1}\" alt=\"\" class=\"hover-animation image-zoom-in img-responsive\"/>";
            echo "<div class=\"layer m_1 hidden-link hover-animation delay1 fade-in\">";
           
            echo "</div>";
            echo "<h3><span class=\"m_3\"></span><br>{$age}, {$place}<br>{$job}</h3></a></div>";
            echo "</li>";
          
              }
            }

          ?>
            </ul>
        <script type="text/javascript">
       $(window).load(function() {
        $("#flexiselDemo3").flexisel({
          visibleItems: 6,
          animationSpeed: 1000,
          autoPlay:false,
          autoPlaySpeed: 3000,        
          pauseOnHover: true,
          enableResponsiveBreakpoints: true,
            responsiveBreakpoints: { 
              portrait: { 
                changePoint:480,
                visibleItems: 1
              }, 
              landscape: { 
                changePoint:640,
                visibleItems: 2
              },
              tablet: { 
                changePoint:768,
                visibleItems: 3
              }
            }
          });
          
      });
       </script>
       <script type="text/javascript" src="assets/cms/js/jquery.flexisel.js"></script>
      </div>
  </div>



  <?php include_once("footer.php")?>

  <script defer src="assets/cms/js/jquery.flexslider.js"></script>
  <link rel="stylesheet" href="assets/cms/css/flexslider.css" type="text/css" media="screen" />
  <script>

  $(window).load(function() {
    $('.flexslider').flexslider({
      animation: "slide",
      controlNav: "thumbnails"
    });
  });
  </script>  

  <?php include_once("footer.php");?>
  </body>
  </html> 





























































































