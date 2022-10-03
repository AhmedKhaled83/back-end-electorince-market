<?php

include 'db_connection.php';

$json = file_get_contents('php://input');
$obj = json_decode($json, true);

$user_email=$obj['email'];
// $user_email = 'sara22@gmail.com';

$select_user = mysqli_query($con,"SELECT * FROM `users` WHERE `user_email`='$user_email';");

if($user = mysqli_fetch_object($select_user)){
   
    echo json_encode('user found');
}
else{
    echo json_encode('error');
}










?>