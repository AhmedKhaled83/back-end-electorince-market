<?php

include "db_connection.php";
   $json = file_get_contents('php://input');
        $obj = json_decode($json, true);
        

           $complaint_id= $obj['complaint_id'];
        // $complaint_id='1';

$hide_review = mysqli_query($con,"UPDATE `complaints` SET `Complaints_view`='1' WHERE `review_id`='$complaint_id';");
if(mysqli_affected_rows($con)){
    echo json_encode('updated');
}
else{
    echo json_encode('not updated');
}


?>