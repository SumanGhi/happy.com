<?php
function mysqlexec($sql){
	$host="localhost";
	$username="root";
	$password=""; 
	$db_name="matrimony"; 


	$conn=mysqli_connect("$host", "$username", "$password")or die("cannot connect");

	mysqli_select_db($conn,"$db_name")or die("cannot select DB");

	if($result = mysqli_query($conn, $sql)){
		return $result;
	}
	else{
		echo mysqli_error($conn);
	}


}





function isloggedin(){
	if(!isset($_SESSION['id'])){
		return false;
	}
	else{
		return true;
	}

}


function writepartnerprefs($id){
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		
		$maritalstatus=$_POST['maritalstatus'];
		
		$diet=$_POST['diet'];
		$religion=$_POST['religion'];
		$caste=$_POST['caste'];
		$mothertounge=$_POST['mothertounge'];
		$education=$_POST['education'];
		
		$country=$_POST['country'];
		
		$sex =$_POST['sex'];


		

		$sql = "UPDATE
		partnerprefs 
		SET

		maritalstatus = '$maritalstatus',

		diet = '$diet',
		religion='$religion',
		caste = '$caste',
		mothertounge = '$mothertounge',
		education='$education',


		country = '$country',
		sex= '$sex'
		WHERE
		custId = '$id'";
		$result = mysqlexec($sql);
		if ($result) {
			echo "<script>alert(\"Successfully updated Partner Preference\")</script>";
			echo "<script> window.location=\"jodi.php\"</script>";

		}
		else{
			echo "Error";
		}

	}


}


function match($id)
{

	$sql="SELECT * FROM partnerprefs where custId = $id";
	$result = mysqlexec($sql);
	if($result){
		$row=mysqli_fetch_assoc($result);
		$maritalstatus=$row['maritalstatus'];
		$sex=$row['sex'];
		$diet=$row['diet'];
		$country =$row['country'];
		$religion =$row['religion'];
		$caste =$row['caste'];
		$mothertounge = $row['mothertounge'];
		$education =$row['education'];
		$result = mysqlexec($sql);

		if ($result) 	{


			$sql="SELECT * FROM customer ";
			$query = mysqlexec($sql);

			if(mysqli_num_rows($query)<=0 ){
				echo "no data ";
			}
			else
			{
				$data=array();




				if ($query) {

					while($row =mysqli_fetch_array($query) ){

						$score=0;
						$matchper=0;
						$kada=0;

						$id1=$row['cust_id'];


						if (  $sex  ==  $row['sex']   )
						{

							if ($maritalstatus == $row['maritalstatus']) {
								$score = $score +2;

							}
							if ($country == $row['country']) {
								$score = $score +3;

							}
							if ($diet == $row['diet']) {
								$score = $score +1;

							}
							if($religion == $row['religion'])
							{
								$score = $score +2;
							}
							if($caste == $row['caste'])
							{
								$score = $score +3;
							}
							if($mothertounge == $row['mothertounge'])
							{
								$score = $score +1;
							}
							if($education == $row['education'])
							{
								$score = $score +1;
							}




							$matchper = $score/13*100;
							$kada = recipocal($id1 , $matchper);
							//if ($kada>50) {
								
								echo "$matchper";
								return $id1;


							
						}

					}

				}

			}
		}
	}

}



	function recipocal($id1 , $matchper)
	{
		$id=$_SESSION['id'];
		$sql="SELECT * FROM customer where cust_id = $id";
		$result = mysqlexec($sql);
		if($result){
			$row=mysqli_fetch_assoc($result);
			$maritalstatus=$row['maritalstatus'];
			$sex=$row['sex'];
			$diet=$row['diet'];
			$country =$row['country'];
			$religion=$row['religion'];
			$caste =$row['caste'];
			$mothertounge = $row['mothertounge'];
			$education =$row['education'];
			$result= mysqlexec($sql);

			if ($result) {
				$sql="SELECT * FROM partnerprefs where custId=$id1 ";
				$query2 = mysqlexec($sql);

					if ($query2) {

						while($row = mysqli_fetch_assoc($query2) ){

							$score=0;
							$matchper2=0;
							$match=0;



								if ($maritalstatus == $row['maritalstatus']) {
									$score = $score +2;

								}
								if ($country == $row['country']) {
									$score = $score +3;

								}
								if ($diet == $row['diet']) {
									$score = $score +1;

								}
								if($religion == $row['religion'])
								{
									$score = $score +2;
								}
								if($caste == $row['caste'])
								{
									$score = $score +3;
								}
								if($mothertounge == $row['mothertounge'])
								{
									$score = $score +1;
								}
								if($education == $row['education'])
								{
									$score = $score +1;
								}




								$matchper2= $score/13*100;

								$match=($matchper + $matchper2)/2;
								
								return $match;
								
							
						}


					
				}
			}
		}
	}



?>