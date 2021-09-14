<?php

$username="";
$password="";


if( isset($_POST['userid']) ){
	$username=$_POST['userid'];
}

if( isset($_POST['password']) ){
	$password=$_POST['password'];
}
///database connection
try{
	$conn = new PDO("mysql:host=localhost;dbname=project;","root","");
}
catch(PDOException $err){
	echo "<script>window.alert('db connection error');</script>";
	echo "<script>location.assign('../pages/index.html');</script>";
}

session_start();

$sqlquery1="SELECT * FROM customer WHERE email_id='$username' AND password='$password'";

$object1=$conn->query($sqlquery1);
if($object1->rowCount()==1){
	$_SESSION['customer_email_id']=$username;
	echo "<script>window.alert('...successfully loged in...');</script>";
	echo "<script>location.assign('../pages/customer.php');</script>";
	
}
else{
	$sqlquery2="SELECT * FROM babysiter WHERE email_id='$username' AND password='$password'";
	$object2=$conn->query($sqlquery2);
	if($object2->rowCount()==1){
		$_SESSION['babysiter_email_id']=$username;
		echo "<script>window.alert('...successfully loged in...');</script>";
		echo "<script>location.assign('../pages/babysiter.php');</script>";
		
	}
	else{
		echo "<script>location.assign('../pages/login.html');</script>";
	}
}

?>