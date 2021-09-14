<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		session_start();
		$babysiter_profile_id = $_SESSION['babysiter_profile_id'];
		$babysiter_email_id = $_SESSION['babysiter_email_id'];

		try{
			$conn = new PDO("mysql:host=localhost;dbname=project;","root","");
		}
		catch(PDOException $err){
			echo "<script>window.alert('db connection error');</script>";
			echo "<script>location.assign('babysiter.php');</script>";
		}

		$sqlquery1="SELECT * FROM booking WHERE babysiterprofile_id = '$babysiter_profile_id' AND babysiteremail_id = '$babysiter_email_id' ";
		$object1=$conn->query($sqlquery1);

		if($object1->rowCount()==0){

			echo "0 results found";
		}
		else{
			$nrow = $object1->rowCount();
			echo  "$nrow request found <br>";
			foreach( $object1 as $row ) {
				$customerprofile_id = $row['customerprofile_id'];
				$customeremail_id = $row['customeremail_id'];

				$sqlquery2="SELECT * FROM customer WHERE profile_id = '$customerprofile_id' AND email_id = '$customeremail_id' ";
				$object2=$conn->query($sqlquery2);
				if($object2->rowCount()==1){
					foreach( $object2 as $row2 ) {
						$fname = $row2['first_name'];
						$lname = $row2['last_name'];
						$email_id = $row2['email_id'];
						$profile_id = $row2['profile_id'];
						$area_name = $row2['area_name'];
						$postal_code = $row2['postal_code'];

						echo '<div class="show-result"> 
						 	<form action="customer_profile_info.php" method="post">
			                	<h3> <input type="submit" value= "'.$fname.' '. $lname.'"></h3>
			                	<p>Area : '.$area_name.' , Post : '.$postal_code. '<input type="hidden" name="email_id" id="email_id" value="'.$email_id.'"> 
			                	<input type="hidden" name="profile_id" id="profile_id" value="'.$profile_id.'"></p><br>
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