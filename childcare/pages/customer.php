<!DOCTYPE html>
<html>
<head>
	<title>cutomer</title>
	<link rel="stylesheet" type="text/css" href="../css/resultStyle.css">
	<link href="https://fonts.googleapis.com/css?family=Flamenco&display=swap" rel="stylesheet">
</head>
<body>
	<?php 
	try{
		session_start();
		$conn = new PDO("mysql:host=localhost;dbname=project;","root","");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$customer_email_id = $_SESSION['customer_email_id'];

		$sqlquery1="SELECT * FROM customer WHERE email_id = '$customer_email_id'";
	    $object1=$conn->query($sqlquery1);

	    if($object1->rowCount()==1){
	        foreach( $object1 as $row ) {
	        	$_SESSION['customer_profile_id'] = $row['profile_id'];
	        }
	    }
	}
	catch(PDOException $err){
		echo "<script>window.alert('db connection error');</script>";
	} 
	?>
	<div class="results-box">
		<a href="myinfo.php">my info</a><br>
		<a href="babySignup.html">add child info</a><br>
		<a href="childinfo.php">child info</a><br>
		<a href="msgCustomerToBabysitter.php">messege</a><br>
		<a href="search.html"> go to search</a><br>
		<a href="../php/logout.php">log out</a>
		
	</div>
	

</body>
</html>