<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/resultStyle.css">
	<link href="https://fonts.googleapis.com/css?family=Flamenco&display=swap" rel="stylesheet">
</head>
<body>
	<?php
		session_start();
		$customerprofile_id = $_SESSION['customer_profile_id'];
		$customeremail_id = $_SESSION['customer_email_id'];

		try{
			$conn = new PDO("mysql:host=localhost;dbname=project;","root","");
		}
		catch(PDOException $err){
			echo "<script>window.alert('db connection error');</script>";
			echo "<script>location.assign('customer.php');</script>";
		}

		$sqlquery1="SELECT * FROM child WHERE customerprofile_id = '$customerprofile_id' AND customeremail_id = '$customeremail_id' ";
		$object1=$conn->query($sqlquery1);

		if($object1->rowCount()==0){

			echo "0 results found";
		}
		else{
			
			foreach( $object1 as $row ) {
				$fname = $row['first_name'];
				$lname = $row['last_name'];
				$profile_id = $row['profile_id'];

				echo '<div class="results-box"> 
				 	<form action="showBabyinfo.php" method="post">
	                	<h3> <input type="submit" value= "'.$fname.' '. $lname.'"></h3>
	                	<input type="hidden" name="profile_id" id="profile_id" value="'.$profile_id.'"><br>
	             	</form>
	            </div>';
			}
		}
	  ?>
</body>
</html>