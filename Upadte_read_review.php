<?php

include "db_connection.php";
   $json = file_get_contents('php://input');
        $obj = json_decode($json, true);
        

           $review_id= $obj['review_id'];
        // $review_id='1';

$hide_review = mysqli_query($con,"UPDATE `review` SET `review_View`='1' WHERE `review_id`='$review_id';");
if(mysqli_affected_rows($con)){
    echo json_encode('updated');
}
else{
    echo json_encode('not updated');
}


?>