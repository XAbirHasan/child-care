<?php 
  session_start();
  $babysiter_email_id="";
  $babysiter_profile_id="";
  $customer_email_id="";
  if( isset($_POST['email_id']) ){
    $babysiter_email_id = $_POST['email_id'];
  }
  if( isset($_POST['profile_id']) ){
    $babysiter_profile_id = $_POST['profile_id'];
  }
  $customer_email_id = $_SESSION['customer_email_id'];

  try{
    $conn = new PDO("mysql:host=localhost;dbname=project;","root","");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sqlquery1="SELECT * FROM customer WHERE email_id = '$customer_email_id'";
    $object1=$conn->query($sqlquery1);

    if($object1->rowCount()==1){
        foreach( $object1 as $row ) {
         $customer_profile_id = $row['profile_id'];
        }
    }

    // for check that book or not
    $check_query ="SELECT * FROM booking WHERE customerprofile_id = '$customer_profile_id' AND customeremail_id ='$customer_email_id' AND babysiterprofile_id = '$babysiter_profile_id' AND babysiteremail_id ='$babysiter_email_id'";
    $object_check=$conn->query($check_query);

    if($object_check->rowCount()==1){
        echo "<script>location.assign('../pages/alreadyBooked.html');</script>";
    }else{
      // insertdata into booking
      $sqlquery = "INSERT INTO booking ( booking_time, booking_date,customerprofile_id, customeremail_id, babysiterprofile_id, babysiteremail_id) VALUES (CURRENT_TIME(), CURRENT_DATE(), '$customer_profile_id', '$customer_email_id', 
      '$babysiter_profile_id', '$babysiter_email_id')";
      $conn->exec($sqlquery);

      $sqlquery2="SELECT * FROM booking WHERE customerprofile_id = '$customer_profile_id' AND customeremail_id ='$customer_email_id' AND babysiterprofile_id = '$babysiter_profile_id' AND babysiteremail_id ='$babysiter_email_id'";
      $object2=$conn->query($sqlquery2);

      if($object2->rowCount()==1){
          foreach( $object2 as $row2 ) {
           $booking_id = $row2['booking_id'];
          }
      }
      $_SESSION['booking_id'] = $booking_id;
      $_SESSION['bookingcustomerprofile_id'] =$customer_profile_id;
      $_SESSION['bookingbabysiterprofile_id'] =$babysiter_profile_id;
      // $_SESSION['bookingbabysiteremail_id'] =$babysiter_email_id;

      echo "<script>location.assign('../pages/payment.php');</script>";
    }
  }
  catch(PDOException $err){
    echo "<script>window.alert('db connection error');</script>";
    echo "<script>location.assign('../pages/profile_info.php');</script>";
  }

?>