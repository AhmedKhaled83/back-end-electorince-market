<?php

include "db_connection.php";

 

$Select_reviews=mysqli_query($con,"SELECT * FROM `review` WHERE `review_View`='0'");

if(mysqli_num_rows($Select_reviews)>0){
   while($review = mysqli_fetch_object($Select_reviews)){
    $reviews[]=$review;
   }
   echo json_encode($reviews);
}
else{
    echo json_encode('no reviews ');
}



?>