<?php include_once("includes/basic_includes.php");?>
<?php include_once("functions.php"); ?>
<?php if(isloggedin()){

} else{
   header("location:login.php");
}
 ?>

<!DOCTYPE HTML>
<html>
<head>
<title>
</title>

<link href="/assets/cms/css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />

<script src="/assets/cms/js/jquery.min.js"></script>
<script src="/assets/cms/js/bootstrap.min.js"></script>

<link href="/assets/cms/css/style.css" rel='stylesheet' type='text/css' />

<link href="/assets/cms/css/font-awesome.css" rel="stylesheet"> 

</script>
</head>
<body>

 <?php include_once("includes/navigation.php");?>

<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
       
        <li class="current-page">Contact</li>
     </ul>
   </div>
   <div class="grid_5">
      <p> Every year, hundreds of thousands of people find love on Happywedding.com. Happywedding.com pioneered the Internet dating industry, launching in 1995 and today serves millions of singles in 24 countries. Happywedding.com continues to redefine the way single men and single women meet, flirt, date and fall in love, proving time and again that you can make love happen through online dating and that lasting relationships are possible. Happywedding.com singles are serious about finding love. And Match puts you in control of your love life; meeting that special someone and forming a lasting relationship is as easy as clicking on any one of the photos and singles ads available online. Whether you're interested in Christian Dating, Jewish Dating, Asian Dating, Black Dating, Senior Dating, Gay Dating, Lesbian Dating,Happywedding.com can help you find the date or relationship that fits you best. Search free through all of our online personals. Literally, hundreds of thousands of single men and single women right in your area have posted personal ads on Happywedding.com</p>
      <address class="addr row">
        <dl class="grid_4">
            <dt>Address :</dt>
            <dd>
                Sinamangal,kathmandu <br>
               
            </dd>
        </dl>
        <dl class="grid_4">
            <dt>Telephones :</dt>
            <dd>
                9843495051 <br>
                9843703819
            </dd>
        </dl>
        <dl class="grid_4">
            <dt>E-mail :</dt>
            <dd><a href="#">raizelslash@gmail.com</a></dd>
        </dl>
      </address>
    </div>
   </div>
</div>


<?php include_once("footer.php");?>

