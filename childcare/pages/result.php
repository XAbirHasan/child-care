<!DOCTYPE html>
<html>
<head>
	<title>results</title>
	<link rel="stylesheet" type="text/css" href="../css/resultStyle.css">
	<link href="https://fonts.googleapis.com/css?family=Flamenco&display=swap" rel="stylesheet">
</head>
<body>
	<div class="results-box">
		<?php
		$location="";
		$post="";
		if( isset($_POST['location']) ){
			$location=$_POST['location'];
		}
		if( isset($_POST['post']) ){
			$post=$_POST['post'];
		}
		try{
			$conn = new PDO("mysql:host=localhost;dbname=project;","root","");
		}
		catch(PDOException $err){
			echo "<script>window.alert('db connection error');</script>";
			echo "<script>location.assign('../pages/search.html');</script>";
		}
		$sqlquery1="SELECT * FROM babysiter WHERE area_name like '%$location%' OR postal_code='$post'";
		$object1=$conn->query($sqlquery1);

		if($object1->rowCount()==0){

				echo "0 results found";
		}
		else{
			$nrow = $object1->rowCount();
			echo  "$nrow results found <br>";
			foreach( $object1 as $row ) {
				$fname = $row['first_name'];
				$lname = $row['last_name'];
				$gender = $row['gender'];
				$salary = $row['salary'];
				$email_id = $row['email_id'];
				$profile_id = $row['profile_id'];

				echo '<div class="show-result"> 
				 	<form action="profile_info.php" method="post">
	                	<h3> <input type="submit" value= "'.$fname.' '. $lname.'"></h3>
	                	<p>gender : '.$gender.' , expected salary : '.$salary. '<input type="hidden" name="email_id" id="email_id" value="'.$email_id.'"> 
	                	<input type="hidden" name="profile_id" id="profile_id" value="'.$profile_id.'"></p><br>
	             	</form>
	            </div>';
			}
		}

		?>
	</div>
</body>
</html>