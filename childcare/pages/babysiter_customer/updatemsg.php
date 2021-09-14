<?php
    $body="";
    if (isset($_POST["content"])){
        $body = $_POST['content'];
    }
    try {        
        $conn = new PDO("mysql:host=localhost;dbname=project;","root","");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        session_start();
        $customerprofile_id = $_SESSION['receiver_customer_id'];
        $customeremail_id = $_SESSION['receiver_customer_email'];

        $babysiterprofile_id = $_SESSION['babysiter_profile_id'];
        $babysiteremail_id = $_SESSION['babysiter_email_id'];

        $sqlquery = "INSERT INTO message (date_and_time , body, sender_id, sender_email, receiver_id, receiver_email) VALUES ( NOW(), '$body', '$babysiterprofile_id', '$babysiteremail_id', '$customerprofile_id', '$customeremail_id')";

        $conn->exec($sqlquery);
    } catch (PDOException $ex) {
        
    }

?>

