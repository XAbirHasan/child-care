<?php
    session_start();
    $customerprofile_id = $_SESSION['receiver_customer_id'];
    $customeremail_id = $_SESSION['receiver_customer_email'];

    $babysiterprofile_id = $_SESSION['babysiter_profile_id'];
    $babysiteremail_id = $_SESSION['babysiter_email_id'];
    // echo "$customerprofile_id  $customeremail_id $babysiterprofile_id $babysiteremail_id ";

    try {
        $conn = new PDO("mysql:host=localhost;dbname=project;","root","");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sqlquery = "SELECT * FROM message WHERE ((sender_id ='$babysiterprofile_id' AND sender_email ='$babysiteremail_id') AND (receiver_id = '$customerprofile_id' AND receiver_email = '$customeremail_id')) OR ((sender_id ='$customerprofile_id' AND sender_email ='$customeremail_id') AND (receiver_id = '$babysiterprofile_id' AND receiver_email = '$babysiteremail_id')) ORDER BY date_and_time ASC";
        $object=$conn->query($sqlquery);
        $row = $object->rowCount();
        $wholebody = "";
        if($object->rowCount()>0){
            foreach ($object as $row) {
                if ($row[3] == $babysiterprofile_id && $row[4] == $babysiteremail_id) {
                    $wholebody = $wholebody . "<div style='width:100%;background-color:#0078FF;text-align:right; margin-top: 5px; border-top-left-radius: 8px;border-bottom-left-radius: 8px;color:#fff;'>$row[2]</div>";
                }
                else{
                    $wholebody = $wholebody . "<div style='width:auto;background-color:#dee2e3;text-align:left;margin-top: 5px; border-top-right-radius: 8px;border-bottom-right-radius: 8px;'>$row[2]</div>"."  ";
                }
                
            }

        }
        echo $wholebody;
        
    } 
    catch (PDOException $ex) {
    
}
?>

