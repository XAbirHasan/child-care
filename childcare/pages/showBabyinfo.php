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
		  <img src="../img/profile2.jpg" alt="" class="box-img">
		  
		  <?php
				$profile_id ="";
				if( isset($_POST['profile_id']) ){
					$profile_id=$_POST['profile_id'];
				}
		  		
			try{
				$conn = new PDO("mysql:host=localhost;dbname=project;","root","");
			}
			catch(PDOException $err){
				echo "<script>window.alert('db connection error');</script>";
				echo "<script>location.assign('customer.php');</script>";
			}

			$sqlquery1="SELECT * FROM child WHERE profile_id='$profile_id'";
			$object1=$conn->query($sqlquery1);

			if($object1->rowCount()==1){

				foreach( $object1 as $row ){
					$fname = $row['first_name'];
					$lname = $row['last_name'];
					$gender = $row['gender'];
					$weight = $row['weight'];

				echo '<form action="customer.php" >
						<h1>'.$fname.' '. $lname.'</h1><br><br>
						<p>
							<span class="other-info">Gender  :  '.$gender.'</span><br>
							<span class="other-info">Weight  :  '.$weight.'</span><br>				
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
