<?php

$first_name="";
$last_name="";
$weight="";
$gender="";

if( isset($_POST['fname']) ){
	$first_name = $_POST['fname'];
}
if( isset($_POST['lname']) ){
	$last_name = $_POST['lname'];
}
if( isset($_POST['weight']) ){
	$weight = $_POST['weight'];
}
if( isset($_POST['gender']) ){
	$gender = $_POST['gender'];
}

///database connection and customer sign up

try{
	session_start();
	$conn = new PDO("mysql:host=localhost;dbname=project;","root","");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$customer_email_id = $_SESSION['customer_email_id'];

	$sqlquery1="SELECT * FROM customer WHERE email_id = '$customer_email_id'";
    $object1=$conn->query($sqlquery1);

    if($object1->rowCount()==1){
        foreach( $object1 as $row ) {
         $customer_profile_id = $row['profile_id'];
        }
    }


	$sqlquery = "INSERT INTO child (first_name, last_name, weight, gender, customerprofile_id, customeremail_id) VALUES ('$first_name', '$last_name', '$weight', '$gender','$customer_profile_id', '$customer_email_id')";

	$conn->exec($sqlquery);
	echo "<script>window.alert('...added...');</script>";
	echo "<script>location.assign('../pages/customer.php');</script>";
}
catch(PDOException $err){
	echo "<script>window.alert('db connection error');</script>";
	echo "<script>location.assign('../pages/babySignup.html');</script>";
}
?>