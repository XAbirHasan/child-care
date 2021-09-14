<!DOCTYPE html>
<html>
<head>
	<title>babysitter</title>
	<link rel="stylesheet" type="text/css" href="../css/resultStyle.css">
	<link href="https://fonts.googleapis.com/css?family=Flamenco&display=swap" rel="stylesheet">
</head>
<body>
	<?php 
	try{
		session_start();
		$conn = new PDO("mysql:host=localhost;dbname=project;","root","");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$babysiter_email_id = $_SESSION['babysiter_email_id'];

		$sqlquery1="SELECT * FROM babysiter WHERE email_id = '$babysiter_email_id'";
	    $object1=$conn->query($sqlquery1);

	    if($object1->rowCount()==1){
	        foreach( $object1 as $row ) {
	        	$_SESSION['babysiter_profile_id'] = $row['profile_id'];
	        }
	    }
	}
	catch(PDOException $err){
		echo "<script>window.alert('db connection error');</script>";
	} 
	?>
	<div class="results-box">
		<a href="myinfobabysitter.php">my info</a><br>
		<a href="request.php">Request</a><br>
		<a href="msgBabysitterToCustomer.php">messege</a><br>
		<a href="../php/logout.php">log out</a>
		
	</div>
	

</body>
</html>