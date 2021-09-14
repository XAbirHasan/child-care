<?php
    $body="";
    if (isset($_POST["content"])){
        $body = $_POST['content'];
    }
    try {        
        $conn = new PDO("mysql:host=localhost;dbname=project;","root","");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        session_start();
        $babysiterprofile_id = $_SESSION['receiver_babysitter_id'];
        $babysiteremail_id = $_SESSION['receiver_babysitter_email'];

        $customerprofile_id = $_SESSION['customer_profile_id'];
        $customeremail_id = $_SESSION['customer_email_id'];

        $sqlquery = "INSERT INTO message (date_and_time , body, sender_id, sender_email, receiver_id, receiver_email) VALUES ( NOW(), '$body', '$customerprofile_id', '$customeremail_id', '$babysiterprofile_id', '$babysiteremail_id')";

        $conn->exec($sqlquery);
    } catch (PDOException $ex) {
        
    }

?>

