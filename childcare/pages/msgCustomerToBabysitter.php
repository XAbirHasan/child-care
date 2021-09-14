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

		$sqlquery1="SELECT * FROM booking WHERE customerprofile_id = '$customerprofile_id' AND customeremail_id = '$customeremail_id' ";
		$object1=$conn->query($sqlquery1);

		if($object1->rowCount()==0){

			echo "0 results found";
		}
		else{
			$nrow = $object1->rowCount();
			foreach( $object1 as $row ) {
				$babysiterprofile_id = $row['babysiterprofile_id'];
				$babysiteremail_id = $row['babysiteremail_id'];

				$sqlquery2="SELECT * FROM babysiter WHERE profile_id = '$babysiterprofile_id' AND email_id = '$babysiteremail_id' ";
				$object2=$conn->query($sqlquery2);
				if($object2->rowCount()==1){
					foreach( $object2 as $row2 ) {
						$fname = $row2['first_name'];
						$lname = $row2['last_name'];
						$email_id = $row2['email_id'];
						$profile_id = $row2['profile_id'];

						echo '<div class="results-box"> 
						 	<form action="customer_babysiter/msg.php" method="post">
			                	<h3> <input type="submit" value= "'.$fname.' '. $lname.'"></h3>
			                	<input type="hidden" name="email_id" id="email_id" value="'.$email_id.'"> 
			                	<input type="hidden" name="profile_id" id="profile_id" value="'.$profile_id.'"><br>
			             	</form>
			            </div>';
					}
				}
				else echo "no";

				
			}
		}


	  ?>
</body>
</html>