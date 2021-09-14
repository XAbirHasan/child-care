<?php

$first_name="";
$last_name="";
$email_id="";
$phone_number="";
$password="";
$number_of_child="";
$house_number="";
$road_number="";
$postal_code="";
$area_name="";

if( isset($_POST['fname']) ){
	$first_name = $_POST['fname'];
}
if( isset($_POST['lname']) ){
	$last_name = $_POST['lname'];
}
if( isset($_POST['house']) ){
	$house_number = $_POST['house'];
}
if( isset($_POST['road']) ){
	$road_number = $_POST['road'];
}
if( isset($_POST['post']) ){
	$postal_code = $_POST['post'];
}
if( isset($_POST['area']) ){
	$area_name = $_POST['area'];
}
if( isset($_POST['phnNumber']) ){
	$phone_number = $_POST['phnNumber'];
}
if( isset($_POST['child']) ){
	$number_of_child = $_POST['child'];
}
if( isset($_POST['userid']) ){
	$email_id = $_POST['userid'];
}
if( isset($_POST['password']) ){
	$password = $_POST['password'];
}

///database connection and customer sign up
try{
	$conn = new PDO("mysql:host=localhost;dbname=project;","root","");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sqlquery = "INSERT INTO customer (first_name , last_name, email_id, phone_number, password, number_of_child, house_number, road_number, postal_code, area_name) VALUES ('$first_name', '$last_name', '$email_id', '$phone_number', '$password', '$number_of_child', '$house_number', '$road_number', '$postal_code', '$area_name' )";

	$conn->exec($sqlquery);
	echo "<script>window.alert('...successfully signed up...');</script>";
	echo "<script>location.assign('../pages/index.html');</script>";
}
catch(PDOException $err){
	echo "<script>window.alert('db connection error');</script>";
	echo "<script>location.assign('../pages/customerSignup.html');</script>";
}
?>