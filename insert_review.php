<?php

include "db_connection.php";
$json = file_get_contents('php://input');
$obj = json_decode($json, true);

$user_id =$obj['user_id'];
$review_body =$obj['review_body'];
// $review_date = $obj['review_date'];



// $user_id ='1';
// $review_body='proble';



if($user_id&&$review_body){

        $insert_review = mysqli_query($con,"INSERT INTO `review`(`review_body`, `user_id`,  `review_dat`)  VALUES ('$review_body','$user_id',DATE_ADD(now(),interval 2 hour))");
        if(mysqli_affected_rows($con)>0){
            echo json_encode ('inserted');
        }
        else{
            echo json_encode ('not inserted');
        }

}
else{
    echo json_encode('no data');
}


?>