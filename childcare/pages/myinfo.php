<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script src="https://use.fontawesome.com/d1341f9b7a.js"></script>
    <link rel="stylesheet" href="../css/profileinfoStyle.css">
    <title>Personal info</title>
  </head>
  <body>
		<div class="box">
		  <img src="../img/profile.jpg" alt="" class="box-img">
		  
		  <?php
		  		session_start();
		  		$customerprofile_id = $_SESSION['customer_profile_id'];
				$customeremail_id = $_SESSION['customer_email_id'];
			try{
				$conn = new PDO("mysql:host=localhost;dbname=project;","root","");
			}
			catch(PDOException $err){
				echo "<script>window.alert('db connection error');</script>";
				echo "<script>location.assign('babysiter.php');</script>";
			}

			$sqlquery1="SELECT * FROM customer WHERE email_id='$customeremail_id' AND profile_id='$customerprofile_id'";
			$object1=$conn->query($sqlquery1);

			if($object1->rowCount()==1){

				foreach( $object1 as $row ){
				$fname = $row['first_name'];
				$lname = $row['last_name'];
				$house_number = $row['house_number'];
				$road_number = $row['road_number'];
				$email_id = $row['email_id'];
				$phone_number = $row['phone_number'];
				$area_name = $row['area_name'];

				echo '<form action="customer.php" >
						<h1>'.$fname.' '. $lname.'</h1><br><br>
						<p>
							<span class="other-info">House  :  '.$house_number.'</span><br>
							<span class="other-info">Road  :  '.$road_number.'</span><br>
							<span class="other-info">Location  :  '.$area_name.'</span><br>
							<span class="other-info">Contact  :  '.$phone_number.'</span><br>
							<span class="other-info">E-mail  :  '.$email_id.'</span><br>
							
						</p>
						<input class="btn" type="submit" name="booking" id="booking" value="home">
					</form>';

				}
				 
			}
			else{

				echo " 0 results found";

			}

		?>

		<ul>
			<li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
			<li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
			<li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
		</ul>
		</div>
</body>
</html>
