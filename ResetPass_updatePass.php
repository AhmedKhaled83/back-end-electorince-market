<?php

include 'db_connection.php';

$json = file_get_contents('php://input');
$obj = json_decode($json, true);

$user_emali =$obj['user_emali'];
 $newPass =$obj['new_pass'];
$user_id = $obj['id'];


// $user_emali ="ahmed@gmail.com";
//  $newPass ="00";
// $user_id = '1';

$user =  mysqli_query($con,"SELECT * FROM `users` WHERE `user_id` = $user_id  AND `user_email` = '$user_emali'");

if(mysqli_num_rows($user)>0){
    $user_newPass = mysqli_query($con,"UPDATE `users` SET `user_password`='$newPass' WHERE `user_id`='$user_id'; ");

 if(mysqli_affected_rows($con)){
        echo json_encode("updated");
    }else{
        echo json_encode(" error happen inUpdate");
    }

}else{
    echo json_encode("Not found");
}






?>