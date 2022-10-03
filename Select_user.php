<?php

include 'db_connection.php';

$json = file_get_contents('php://input');
$obj = json_decode($json, true);



   $user_id=$obj['user_id'];


// $user_id = 1;
$Select_user = mysqli_query($con,"SELECT `user_name`,`user_email`,`user_phone`,`user_image` FROM `users` WHERE `user_id`='$user_id'");
if($user = mysqli_fetch_object($Select_user)){
    echo json_encode($user);
}
else{
    echo json_encode("Not found");
}

?>