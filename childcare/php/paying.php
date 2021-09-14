<?php 
	session_start();
	$booking_id = $_SESSION['booking_id'];
	$customer_profile_id = $_SESSION['bookingcustomerprofile_id'];
	$babysiter_profile_id = $_SESSION['bookingbabysiterprofile_id'];

	try{
	    $conn = new PDO("mysql:host=localhost;dbname=project;","root","");
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    $sqlquery = "INSERT INTO payment ( payment_time, payment_date, bookingbooking_id, bookingcustomerprofile_id, bookingbabysiterprofile_id) VALUES (CURRENT_TIME(), CURRENT_DATE(), '$booking_id', '$customer_profile_id', '$babysiter_profile_id')";
	    $conn->exec($sqlquery);
	    echo "<script>location.assign('../pages/thankyou.html');</script>";

	}
	catch(PDOException $err){
    echo "<script>window.alert('db connection error');</script>";
    echo "<script>location.assign('../pages/profile_info.php');</script>";
  }
?>